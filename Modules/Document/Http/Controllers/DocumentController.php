<?php

namespace Modules\Document\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Document\Repositories\DocumentRepo;
use Modules\Document\Http\Requests\DocumentRequest;
use Modules\Document\Http\Requests\UpdateDocumentRequest;



class DocumentController extends Controller
{

    public $documentgeRepo;
    public $title;
    public $description;
    public function __construct(DocumentRepo $documentgeRepo ){
        $this->documentgeRepo=$documentgeRepo;
        $this->title='Document';
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
        $documents=$this->documentgeRepo->getAll();
        }
        else
        {
        $documents=$this->documentgeRepo->getMyItem();
        }
        $title='Document List';
        $description= $this->description;
        return view('document::index',compact('title','description','documents'))->with( ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $documents=$this->documentgeRepo->getAll();
        $title='Create Document';
        $description= $this->description;
        return view('document::create',compact('title','description','documents'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DocumentRequest $request)
    {
        $document = $this->documentgeRepo->store($request);
        return redirect()->route('document')->with('success','Leave created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $title='Show Document';
        $description= $this->description;
        $document= $this->documentgeRepo->findById($id);
        return view('document::show',compact('title','document'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title='Edit Document';
        $description= $this->description;
        $document = $this->documentgeRepo->findById($id);
        return view('document::edit',compact('document','description','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateDocumentRequest $request)
    {
        $document=$this->documentgeRepo->update($request);
        return redirect()->route('document')->with('success','Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->documentgeRepo->delete($id);
        return redirect()->route('document')->with('success','Document deleted successfully');
    }
}
