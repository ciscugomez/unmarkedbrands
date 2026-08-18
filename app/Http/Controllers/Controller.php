<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function record($id)
    {
        $publication = Publication::find($id);
        return view('publications.record',compact('publication'));
    }
}
