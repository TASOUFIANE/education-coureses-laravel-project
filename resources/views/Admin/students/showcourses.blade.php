@extends('Admin.layout')


@section('title')
  Edit Student
@endsection
@section('styles')
    <style>
     #btn{
            background: none;
            border: none;
            color:red;
            margin-left: 5px;
            margin-top: 0;
            float:right;
            position: absolute;
            top:3px;
            left:48px;

        }
    #btn:hover{
        color:white;
    }
    </style>
@endsection
@section('content')

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

    </div>
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-plus-circle"></i>
                <span class="text">Student's Courses / <a href="{{route('admin.students.index')}}" class="bg-transparent hover:no-underline hover:bg-green-500 text-black  hover:text-white px-4 border border-green-500 hover:border-transparent rounded ">Return</a></span>
                <span class="text"> / <a href="{{route('admin.students.addcourse',$student_id)}}" class="bg-transparent hover:no-underline hover:bg-blue-500 text-black  hover:text-white px-4 border border-blue-500 hover:border-transparent rounded ">Add to course</a></span>
            </div>
        </div>
        <div class="bf-container bf-p-t-1 bf-p-b-2">
            <div class="bf-table-responsive ">
                        <table class="bf-table ">
                        <thead>
                                <tr class="first">

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>status</th>
                                    <th>Control</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $c)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$c->small_description}}</td>
                                    <td>{{$c->pivot->status}}</td>
                                    <td style="position: relative">
                                        <form action="{{route('admin.students.rejectCourse',[$student_id,$c->id])}}" id="delete" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @if($c->pivot->status !== 'rejected')
                                            <button id="btn" type="submit" onclick="deleteForm()"><a class="bg-transparent hover:no-underline hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 ml-20 border border-red-500 hover:border-transparent rounded "> Reject</a></button>
                                        @endif
                                        @if($c->pivot->status !== 'approved')
                                            <a href="{{route('admin.students.approveCourse',[$student_id,$c->id])}}" class="bg-transparent hover:no-underline hover:bg-green-500 text-green-700 mr-4  font-semibold hover:text-white py-2 px-4  border border-green-500 hover:border-transparent rounded">Approuve</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                    <br>

            </div>

        </div>


    </div>
</section>

@endsection
