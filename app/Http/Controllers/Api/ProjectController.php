<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
       $projects = Project::with(['type', 'technologies'])->orderBy('id', 'desc')->paginate(6);

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
        $tosearch = $_GET['tosearch'];

        $projects = Project::where('name', 'like', "%$tosearch%")->with(['type', 'technologies'])->get();

        return response()->json($projects);
    }

    public function getByType($id) {
        $projects = Project::where('type_id', $id)->with(['type', 'technologies'])->get();

        return response()->json($projects);
    }

    public function getByTechnology($id) {

        $projects = Project::with(['type', 'technologies'])
            ->whereHas('technologies', function (Builder $query) use ($id) {
                $query->where('technology_id', $id);
            })
            ->get();


        return response()->json($projects);
    }
}
