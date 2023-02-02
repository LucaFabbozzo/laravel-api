<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
       $projects = Project::orderBy('id', 'desc')->paginate(10);

       $types = Type::all();
       $technologies = Technology::all();

       return response()->json(compact('projects', 'types', 'technologies'));
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

    public function search() {
        $tosearch = $_POST['tosearch'];

        $projects = Project::where('name', 'like', "%$tosearch%")->with(['type', 'technologies'])->paginate(10);

        return response()->json(compact('projects'));
    }

    public function getByType($id) {
        $projects = Project::where('type_id', $id)->with(['technologies', 'type'])->get();

        return response()->json($projects);
    }

    public function getByTechnology($id) {
        $list_projects = [];

        $technology = Technology::where('id', $id)->with(['projects'])->first();
        foreach($technology->projects as $project) {
            $list_projects[] = Project::where('id', $project->id)->with(['techologies', 'type'])->first();
        }
        return response()->json($list_projects);
    }
}
