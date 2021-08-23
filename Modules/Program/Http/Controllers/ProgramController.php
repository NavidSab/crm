<?php

namespace Modules\Program\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Program\Repositories\ProgramRepo;
use Modules\Program\Repositories\DegreeRepo;
use Modules\College\Repositories\CollegeRepo;
use Modules\Program\Http\Requests\ProgramRequest;
use Modules\Program\Http\Requests\UpdateProgramRequest;



class ProgramController extends Controller
{

    public $programRepo;
    public $degreeRepo;
    public $collegeRepo;
    public $title;
    public $description;
    public function __construct(ProgramRepo $programRepo,DegreeRepo $degreeRepo,CollegeRepo $collegeRepo  ){
        $this->programRepo=$programRepo;
        $this->degreeRepo=$degreeRepo;
        $this->collegeRepo=$collegeRepo;

        $this->title='Program';
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
        $programs=$this->programRepo->getAll();
        }
        else
        {
        $programs=$this->programRepo->getMyItem();
        }
        $title='Program List';
        $description= $this->description;
        return view('program::index',compact('title','description','programs'))->with( ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title='Create Program';
        $description= $this->description;
        $programs=$this->programRepo->getAll();
        $degree=$this->degreeRepo->getAll();
        $college=$this->collegeRepo->getAll();
        return view('program::create',compact('degree','college','title','description','programs'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProgramRequest $request)
    {
        $program = $this->programRepo->store($request);
        return redirect()->route('program')->with('success','Program created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $title='Show Program';
        $description= $this->description;
        $program= $this->programRepo->findById($id);
        return view('program::show',compact('title','program'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title='Edit Program';
        $description= $this->description;
        $program = $this->programRepo->findById($id);
        return view('program::edit',compact('program','description','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateProgramRequest $request)
    {
        $program=$this->programRepo->update($request);
        return redirect()->route('program')->with('success','Program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->programRepo->delete($id);
        return redirect()->route('program')->with('success','Program deleted successfully');
    }
}
