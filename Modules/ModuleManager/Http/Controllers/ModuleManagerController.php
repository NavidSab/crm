<?php

namespace Modules\ModuleManager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ModuleManager\Repositories\ModuleRepo;
class ModuleManagerController extends Controller
{



    public $title;
    public $description;
    public $moduleRepo;

    public function __construct(ModuleRepo $moduleRepo){
        $this->moduleRepo=$moduleRepo;
        $this->title='Modules';
        $this->description='description';
        $this->middleware('auth');
    
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $title=$this->title='Modules';
        $description=$this->description='In the list below you can manage your desired modules';
        $module=$this->moduleRepo->getModule();
        return view('modulemanager::index',compact('title','description','module'));
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $this->moduleRepo->update($request->all());
        return redirect()->route('module')->with('success','Module Updated !');

    }


}
