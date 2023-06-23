<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class studentscontroller extends Controller
{
    public function index() {
        $students = students::all();
       if($students->count()>0) {
        return response()->json([
            'status' =>200,
            'students' => $students
        ],200);
       }
       else {
        return response()->json([
            'status' =>404,
            'students' => 'no records found',
        ],404);
       }
    }

    public function store(Request $request){
        $students = students::create([
            'title'=> $request->title,
            'description' => $request->description,
            'duedates' => $request->duedates,
            'completionstatus' => $request->completionstatus,
        ]);

        if ($students) {
            return response()->json([
                'status' => 200,
                'message'=>"student created succesfully"
            ],200);
        }
        else {
            return response()->json([
                'status' =>500,
                'message' => 'student not sucess'
            ],500);
        }
    }

    public function show($id) {
        $students = students::find($id);
        if($students) {
            return response()->json([
                'status'=>200,
                'message' => $students
            ],200);
        }
        else {
            return response()->json([
                'status'=>404,
                'message'=>"no such student"
            ],404);
        }
    }

    public function edit($id) {
        $students = students::find($id);
        if($students) {
            return response()->json([
                'status'=>200,
                'message' => $students
            ],200);
        }
        else {
            return response()->json([
                'status'=>404,
                'message'=>"no such student"
            ],404);
        }
    }

    public function update(Request $request,$id) {
        $students = students::find($id);


        if($students) {

            $students->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'duedates'=>$request->duedates,
                'completionstatus'=>$request->completionstatus,
            ]);

            return response()->json([
                'status'=>200,
                'message' =>"student updated sucessfully"
            ],200);
        }
        else {
            return response()->json([
                'status' =>404,
                'message' => "no such students"
            ],404);
        }
        

    }

    public function delete($id) {
        $students = students::find($id);

        if($students) {
            $students->delete();
            return response()->json([
                'status'=>200,
                'message'=>"deleted"
            ],200);
        }
        else {
            return response()->json([
                'status'=>404,
                'message'=>"no record to delete"
            ],404);
        }
    }
    
    function search($key) {
        return students::where('completionstatus','Like',"%$key%")->get();
    }
}
