<?php
namespace Modules\ModuleManager\Repositories;
use Illuminate\Support\Facades\Hash;
class ModuleRepo
{

    public function getModule()
    {
        return  json_decode(file_get_contents(base_path().'/modules_statuses.json'), true); 
        
    }
    public function update($request)
    {

        $module=json_decode(file_get_contents(base_path().'/modules_statuses.json'), true); 
        foreach($module as $key  => &$value){
            if($key == $request['name']){
                $value = json_decode($request['status']);
            }
        }

        $new_module = json_encode($module, JSON_PRETTY_PRINT);

        file_put_contents(base_path().'/modules_statuses.json', stripslashes($new_module));
    

        
    }

}


