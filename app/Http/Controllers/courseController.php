<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class courseController extends Controller
{
    public function index()
    {
        $data['course'] = DB::table('course')->get();
        return view('course', compact('data'));
    }

    public function courseInsert()
    {
        return view('courseInsert');
    }

    public function courseInsertPost(Request $request)
    {
        $request->validate(['course_title' => 'required', 'course_content' => 'required', 'course_must' => 'required']);

        $db = DB::table('course')->insert(
            [
                'course_title' => $request->course_title,
                'course_content' => $request->course_content,
                'course_must' => $request->course_must
            ]
        );
        if ($db) {
            return back()->with('status', 'Add successful');
        }
    }

    public function courseUpdate($id)
    {
        $course = DB::table('course')->find($id);
        return view('courseUpdate', compact('course'));
    }

    public function courseUpdatePost(Request $request, $id)
    {
        $request->validate(['course_title' => 'required', 'course_content' => 'required', 'course_must' => 'required']);

        $db = DB::table('course')->where('id', $id)
            ->update(
                [
                    'course_title' => $request->course_title,
                    'course_content' => $request->course_content,
                    'course_must' => $request->course_must
                ]
            );
        if ($db) {
            return back()->with('status', 'Update successful');
        }
    }

    public function courseDelete($id){
        $db=DB::table('course')->where('id',$id)
            ->delete();

        if ($db){
            return back();
        }
    }

    public function mlogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
