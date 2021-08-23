<?php
namespace Modules\Document\Repositories;
use Modules\Document\Entities\Document;
use Auth;
class DocumentRepo
{
    public function count()
    {
        return Document::count();
    }
    public function getAll()
    {
        return Document::orderBy('id','DESC')->paginate(5);
    }
    public function getMyItem()
    {
        return Document::where('user_id',Auth::user()->id)->paginate(5);
    }
    public function store($request)
    {
            $fileName = time().'_'.$request->document->getClientOriginalName();
            $filePath = $request->file('document')->storeAs('uploads', $fileName, 'public');
            $document = '/storage/' . $filePath;
            return Document::create([
                'user_id'           => Auth::user()->id,
                'document'              => $document,
            ]);
    }
    public function delete($id)
    {
        return Document::find($id)->delete();
    }
    public function findById($id)
    {
        return Document::find($id);
    }

    public function update($request)
    {
 
            $fileName = time().'_'.$request->document->getClientOriginalName();
            $filePath = $request->file('document')->storeAs('uploads', $fileName, 'public');
            $document = '/storage/' . $filePath;
            $college =  Document::find($request->document_id);
            $result = tap($college)->update([
                'user_id'           => Auth::user()->id,
                'document'              => $document,
            ]);
            return $result;
        
    
    }

}
