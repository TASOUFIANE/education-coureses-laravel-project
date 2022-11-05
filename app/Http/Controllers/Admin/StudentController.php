<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['students'] = Student::all();
        return view('admin.students.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate( [
            'name' => 'nullable|string|max:50',
            'email'=>'required|email|max:100|unique:students',
            'specialty'=>'nullable|string|max:100',

        ]);

        Student::create($data);

        return redirect()->route('admin.students.index')->with(['success'=>'Student added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCourses($id)
    {
        $data['courses'] = Student::findOrFail($id)->courses;
        $data['student_id'] = $id;
        return view('admin.students.showcourses')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['student'] = Student::findOrFail($id);

        return view('admin.students.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data=$request->validate([

            'name' => 'nullable|string|max:50',
            'email'=>'required|email|max:191|unique:students',
            'specialty'=>'nullable|string|max:50',

        ]);

        Student::findOrfail($request->id)->update($data);

        return redirect()->route('admin.students.index')->with(['success'=>'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student::findOrFail($id)->delete();
        return redirect()->route('admin.students.index')->with(['success'=>'Student deleted successfully']);
    }

    public function rejectCourse($id,$c_id)
    {
        DB::table('course_student')->where('course_id',$c_id)->where('student_id',$id)->update(['status' => 'rejeted']);
        return redirect()->route('admin.students.showcourses',$id)->with('success','Course rejected successfully ');

    }
    public function approveCourse($id,$c_id)
    {
        DB::table('course_student')->where('course_id',$c_id)->where('student_id',$id)->update(['status' => 'approved']);
        return redirect()->route('admin.students.showcourses',$id)->with('success','Course approuved successfully');
    }

    public function addCourse($id){

          $courses=Course::all();
         $st_courses=Student::findOrFail($id)->courses;
        foreach($courses as $c){
            if(!in_array($c->id,$st_courses)){
                array_push($dat['crs'],$c);
            }
    }
        $data['student_id']=$id;

        return view('admin.students.addcourse')->with($data);
    }

    public function assignCourse(Request $request){

            $data=$request->validate([
                'course_id'=>'required|exists:courses,id',
                'id'=>'required|exists:students,id'
            ]);

            DB::table('course_student')->insert([
                'course_id'=>$data['course_id'],
                'student_id'=>$data['id'],
                'status'=>'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.students.showcourses',$data['id'])->with('success','Course assigned successfully');
    }
}
