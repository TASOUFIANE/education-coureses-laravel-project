<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Trainer;
use Image;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['courses'] = Course::all();
        return view('admin.courses.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cats']=Category::all();
        $data['trainers']=Trainer::select('id','name')->get();
        return view('admin.courses.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate( [
            'name' => 'required|string|max:50',
            'price'=>'nullable|integer',
            'small_description'=>'required|string|max:191',
            'description'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'trainer_id'=>'required|exists:categories,id',
            'img'=>'required|image|mimes:jpeg,jpg,png',

        ]);
         $new_name=$data['img']->hashName();

         Image::make($data['img'])->resize(970,920)->save(public_path('uploads/courses/'.$new_name));

         $data['img']=$new_name;

         Course::create($data);

        return redirect()->route('admin.courses.index')->with(['success'=>'Course added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data['cats']=Category::all();
        $data['trainers']=Trainer::all();
        $data['course'] = Course::findOrFail($id);
        return view('admin.courses.edit')->with($data);
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
        $data=$request->validate( [
            'name' => 'required|string|max:50',
            'price'=>'nullable|integer',
            'small_description'=>'required|string|max:191',
            'description'=>'required|string',
            'category_id'=>'required|exists:categories,id',
            'trainer_id'=>'required|exists:trainers,id',
            'img'=>'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $old_name=Course::findOrFail($request->id)->img;

        if($request->hasFile('img')){
            Storage::disk('uploads')->delete('courses/'.$old_name);
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(970,920)->save(public_path('uploads/courses/'.$new_name));
            $data['img']=$new_name;
        }else{
            $data['img']=$old_name;
        }
        Course::findOrFail($request->id)->update($data);

        return redirect()->route('admin.courses.index')->with(['success'=>'Course updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_name=Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('courses/'.$old_name);
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.courses.index')->with(['success'=>'Course deleted successfully']);

    }
}
