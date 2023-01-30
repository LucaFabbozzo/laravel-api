<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
       $projects = Project::orderBy('id', 'desc')->paginate(10);

       return response()->json(compact('projects'));
    }

    public function show($slug) {

        $projects = Project::where('slug', $slug)->with(['type', 'technologies'])->first();

        if($projects->cover_image) {
            $projects->cover_image = url("storage/" . $projects->cover_image);
        }else {
            $projects->cover_image = url("storage/uploads/image-placeholder.png");
        }

        return response()->json($projects);
    }
}
