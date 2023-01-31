<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,
        [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'object' => 'required|min:2|max:255',
            'message' => 'required|min:5',
        ]
    );

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        return response()->json($data);
    }
}
