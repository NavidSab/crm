<?php
namespace Modules\Menu\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Menu\Entities\Menus;
use Modules\Menu\Entities\MenuItems;
use Modules\Menu\Repositories\MenuRepo;
use Modules\Acl\Repositories\RoleRepo;
use Modules\Menu\Repositories\MenuItemsRepo;
class MenuController extends Controller
{
    public $menuitemRepo,$menuRepo,$roleRepo;
    public function __construct(MenuRepo $menuRepo,MenuItemsRepo $menuitemRepo,RoleRepo $roleRepo ){
        $this->title='Menu';
        $this->menuRepo=$menuRepo;
        $this->menuitemRepo=$menuitemRepo;
        $this->roleRepo=$roleRepo;
        $this->middleware('auth');
    }
    public function index()
    {
        $currentUrl = url()->current();
        $menulist = $this->menuRepo->getMenuList();
        $title=$this->title;
        $roles =$this->roleRepo->getRoles(); 
        if ((request()->has("action") && empty(request()->input("menu"))) || request()->input("menu") == '0') {
            return view('menu::index',compact('menulist','title','currentUrl'));
        } 
        else
        {        

            $menu =$this->menuRepo->getById(request()->input("menu"));
            $menuItem =$this->menuitemRepo->getByMenuId(request()->input("menu"));
            if( config('menu.use_roles')) {
              
                return view('menu::index', compact('currentUrl','title','menuItem','menu','menulist','roles'));
            }
            return view('menu::index', compact('currentUrl','title','menuItem','menu','menulist'));
        }
        return view('menu::index');
    }
    public function create(Request $request)
    {
      
        $menu=$this->menuitemRepo->store($request);
        return json_encode(array("data" => $menu->id));
    }
    public function deleteMenuItem(Request $request)
    {
        $this->menuitemRepo->delete($request->id);
    }
    public function deleteMenu(Request $request)
    {
        $getall =$this->menuitemRepo->getByMenuId($request->id);
        if (count($getall) == 0) {
            $menudelete = $this->menuRepo->delete($request->id);
            return json_encode(array("resp" => "you delete this item"));
        } 
        else
        {
            return json_encode(array("resp" => "You have to delete all items first", "error" => 1));
        }
    }
    public function updateMenuItem(Request $request)
    {
        $this->menuitemRepo->update($request);
    }
    public function addCustomMenuItem(Request $request)
    {
        $this->menuitemRepo->store($request);
        return json_encode(array("data" => $menu->id));

    }
    public function generateMenuControl(Request $request)
    {
        $this->menuRepo->generate($request);
        echo json_encode(array("resp" => 1));
    }
}
