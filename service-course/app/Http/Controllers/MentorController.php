<?php

namespace App\Http\Controllers;

use App\Mentor;
use Illuminate\Http\Request;
use App\Http\Requests\MentorRequest;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();

        return response()->json([
            'status' => 'success',
            'data' => $mentors
        ]);
    }

    public function show($id)
    {
        $mentor = Mentor::find($id);
        if(!$mentor){
            return response()->json([
                'status' => 'error',
                'message' => 'mentor not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $mentor
        ]);
    }

    public function create(MentorRequest $request)
    {
        $data = $request->all();
        $mentor = Mentor::create($data);

        return response()->json([
            'status' => 'success', 
            'data' => $mentor
        ]);
    }

    public function update(MentorRequest $request, $id)
    {
        $data = $request->all();
        $mentor = Mentor::find($id);

        if(!$mentor) {
            return response()->json([
                'status' => 'error', 
                'message' => 'mentor not found'
            ],404);
        }

        $mentor->update($data);

        return response()->json([
            'status' => 'success',
            'data' => $mentor
        ]);
    }

    public function destroy($id)
    {
        $mentor = Mentor::find($id);

        if(!$mentor) {
            return response()->json([
                'status' => 'error', 
                'message' => 'mentor not found'
            ],404);
        }

        $mentor->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'success delete mentor'
        ]);
    }
}
