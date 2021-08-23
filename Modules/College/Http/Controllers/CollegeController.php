<?php

namespace Modules\College\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\College\Repositories\CollegeRepo;
use Modules\College\Http\Requests\CollegeRequest;
use Modules\College\Http\Requests\UpdateCollegeRequest;



class CollegeController extends Controller
{

    public $collegeRepo;
    public $title;
    public $description;
    public function __construct(CollegeRepo $collegeRepo ){
        $this->collegeRepo=$collegeRepo;
        $this->title='College';
        $this->description='description';
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        if(auth()->user()->hasRole('admin'))
        {
        $colleges=$this->collegeRepo->getWithPaginate();
        }
        else
        {
        $colleges=$this->collegeRepo->getMyItem();
        }
        $title='College List';
        $description= $this->description;
        return view('college::index',compact('title','description','colleges'))->with( ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $colleges=$this->collegeRepo->getAll();
        $title='Create College';
        $description= $this->description;
        return view('college::create',compact('title','description','colleges'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CollegeRequest $request)
    {
        $leave = $this->collegeRepo->store($request);
        return redirect()->route('college')->with('success','Leave created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $title='Show College';
        $description= $this->description;
        $college = $this->collegeRepo->findById($id);
        return view('college::show',compact('title','college'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title='Edit College';
        $description= $this->description;
        $college = $this->collegeRepo->findById($id);
        return view('college::edit',compact('college','description','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCollegeRequest $request)
    {
        $leave=$this->collegeRepo->update($request);
        return redirect()->route('college')->with('success','College updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->collegeRepo->delete($id);
        return redirect()->route('college')->with('success','College deleted successfully');
    }
}
