<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\Test;
use App\Models\SiteContent;
class HomeController extends Controller
{
    //
    public function index()
    {
        $data['banner']=SiteContent::select('contnet')->where('name','banner')->first();
        $data['course_title']=SiteContent::select('contnet')->where('name','co_section')->first();
        $data['courses']=Course::select('id','small_description','category_id','trainer_id','img','price','description')->orderBy('id','desc')->take(3)->get();
        $data['courses_count']=Course::count();
        $data['trainers_count']=Trainer::count();
        $data['students_count']=Student::count();
        $data['tests']=Test::select('id','speciality','name','img','description')->get();
        return view('front.index')->with($data);
    }
}
