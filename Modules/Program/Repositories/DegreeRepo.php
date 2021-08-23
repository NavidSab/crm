<?php
namespace Modules\Program\Repositories;
use Modules\Program\Entities\Degree;
use Auth;
class DegreeRepo
{
    public function getWithPaginate()
    {
        return Degree::orderBy('id','DESC')->paginate(5);
    }

    public function getAll()
    {
        return Degree::orderBy('id','DESC')->get();
    }

}
