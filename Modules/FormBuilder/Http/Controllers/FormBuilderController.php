<?php

namespace Modules\FormBuilder\Http\Controllers;
use Modules\FormBuilder\Repositories\FormRepo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FormBuilderController extends Controller
{

    public $formRepo;
    public $title;
    public $description;
    public function __construct(FormRepo $formRepo){
        $this->formRepo=$formRepo;
        $this->title='Form';
        $this->description='description';
        $this->middleware('auth');
    
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $title='Form List';
        $description= $this->description;
        $forms =$this->formRepo->getWithPaginate();
        return view('formbuilder::index',compact('title','description','forms'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function createItem(Request $request)
    {
        $title='Form Item List';
        $description= $this->description;
        $formItems =$this->formRepo->getItem($request->id);
        return view('formbuilder::indexItem',compact('title','description','formItems'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        $title='Form Create';
        $description= $this->description;
        return view('formbuilder::create',compact('title','description'));


    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function formItem()
    {
        
        $title='Form Item Create';
        $description= $this->description;
        return view('formbuilder::createItem',compact('title','description'));


    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $user = $this->formRepo->store($request);
        return redirect()->route('form')->with('success','Form created successfully');
    }

       /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeItem(Request $request)
    {
        $user = $this->formRepo->storeItem($request);
        return redirect()->route('form.createItem',$request->form_id)->with('success','Form Item created successfully');
    }



    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('formbuilder::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('formbuilder::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->formRepo->delete($id);
        return redirect()->route('form')->with('success','Form deleted successfully');
    }

    public function destroyItem($id)
    {
        $this->formRepo->deleteItem($id);
        return redirect()->route('form')->with('success','Form Item deleted successfully');
    }

}
