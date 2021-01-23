<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mentor;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index(Request $request) 
    {
        $courses = Course::query();

        $q = $request->query('q');
        $status = $request->query('status');

        $courses->when($q, function($query) use ($q) {
            return $query->whereRaw("name LIKE '%".strtolower($q)."%'");
        });

        $courses->when($status, function($query) use ($status) {
            return $query->where('status', '=' , $status);
        });

        return response()->json([
            'status' => 'success',
            'data' => $courses->paginate(10)
        ]);
    }
    public function create(CourseRequest $request)
    {
        $data = $request->all();

        $mentorId = $request->mentor_id;
        $mentor = Mentor::find($mentorId);

        if(!$mentor) {
            return response()->json([
                'status' => 'error',
                'message' => 'mentor not found'
            ], 404);
        }

        $course = Course::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $course
        ]);
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->all();

        $course = Course::find($id);

        if(!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'course not found'
            ], 404);
        }

        $mentorId = $request->mentor_id;
        if($mentorId) {
            $mentor = Mentor::find($mentorId);
            if(!$mentor) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'mentor not found'
                ], 404);
            }
        }

        $course->update($data);
        return response()->json([
            'status' => 'success',
            'data' => $course
        ]);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if(!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'course not found'
            ], 404);
        }

        $course->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'course success deleted'
        ]);
    }
}
