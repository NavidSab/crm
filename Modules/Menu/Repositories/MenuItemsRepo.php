<?php
namespace Modules\Menu\Repositories;
use Modules\Menu\Entities\MenuItems;
use Modules\Menu\Entities\Menu;
use Illuminate\Support\Facades\Hash;
class MenuItemsRepo
{
    public function delete($id)
    {
        return MenuItems::find($id)->delete();
    }
    public function getByMenuId($id)
    {
        return MenuItems::where("menu_id", $id)->orderBy("sort", "asc")->get();
    }
    public function getParentByMenuId($id)
    {
        return MenuItems::where(['menu_id'=>$id,'parent'=>0])->get();
    }
    public function update($request){
        $arraydata = $request->arraydata;
        if (is_array($arraydata)) {
            foreach ($arraydata as $value) {
                $menuitem = MenuItems::find($value['id']);
                $menuitem->label = $value['label'];
                $menuitem->link = $value['link'];
                $menuitem->class = $value['class'];
                if (config('menu.use_roles')) {
                    $menuitem->role_id = $value['role_id'] ? $value['role_id'] : 0 ;
                }
                $menuitem->save();
            }
        } 
        else
        {
            $menuitem = MenuItems::find($request->id);
            $menuitem->label = $request->label;
            $menuitem->class = $request->clases;
            if (config('menu.use_roles')) {
                $menuitem->role_id = $request->role_id ? $request->role_id : 0 ;
            }
            $menuitem->save();
        }
    }
    public function store($request){
        die(print_r($request->imagemenu));
        if(!empty($request->imagemenu)){
            $imageName = time().'.'.$request->imagemenu->extension();  
            $request->imagemenu->move(public_path('images'), $imageName);
        }
        $menuitem = new MenuItems();
        $menuitem->label =$request->labelmenu;
        $menuitem->link = $request->linkmenu;
        if($request->megamenu == 'on'){
            $request->megamenu=1;
        }
        $menuitem->mega_menu = $request->megamenu;
        if (config('menu.use_roles')) {
            $menuitem->role_id = $request->rolemenu ? $request->rolemenu  : 0 ;
        }
        $menuitem->menu_id = $request->idmenu;
        $menuitem->sort = $this->getNextSortRoot($request->idmenu);
        $menuitem->save();
    }
    public static function getNextSortRoot($menu)
    {
        return MenuItems::where('menu', $menu)->max('sort') + 1;
    }
    public function parent_menu()
    {
        return MenuItems::belongsTo(Menu::class, 'menu');
    }
    public function getsons($id)
    {
        return MenuItems::where("parent", $id)->get();
    }
    public function child()
    {
        return MenuItems::hasMany(MenuItems::class, 'parent')->orderBy('sort', 'ASC');
    }
}
