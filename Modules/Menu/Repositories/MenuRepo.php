<?php
namespace Modules\Menu\Repositories;
use Modules\Menu\Entities\Menu;
use Illuminate\Support\Facades\Hash;
class MenuRepo
{

    public function getAll()
    {
        return Menu::orderBy('id','DESC')->paginate(5);
    }
    public function find($id)
    {
        return Menu::find($id);
    }
    public function delete($id)
    {
        return Menu::find($id)->delete();
    }
    public function store($request)
    {
        return Menu::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
