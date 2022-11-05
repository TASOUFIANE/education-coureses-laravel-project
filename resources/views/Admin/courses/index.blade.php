@extends('Admin.layout')


@section('title')
Courses
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

        <div class="search-box">


        </div>
    </div>
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-book-reader"></i>
                <span class="text"> Courses</span>
            </div>
        </div>
        <div class="bf-container bf-p-t-1 bf-p-b-2">
            <div class="bf-table-responsive ">
                        <table class="bf-table ">
                        <thead>
                                <tr class="first">

                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Control</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{ asset('uploads/courses/'.$course->img)}}" style="height: 60px;" alt="trainer"> </td>
                                    <td>{{$course->small_description}}</td>
                                    <td>  {{$course->price}} $</td>
                                    <td style="position:relative">
                                        <a href="{{route('admin.courses.edit',$course->id)}}" class="bg-transparent hover:no-underline hover:bg-blue-500 text-blue-700 mr-4  font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
                                        <form action="{{route('admin.courses.destroy',$course->id)}}" id="deleteForm" method="POST">

                                            @csrf
                                        </form>

                                        <button id="btn" type="submit" onclick="deleteForm()"><a class="bg-transparent hover:no-underline hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "> Delete</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                    <br>
                    <button class="bg-violet-500 hover:bg-violet-600 focus:ring-violet-300 ">
                       <a href="{{route('admin.courses.create')}}" style="text-decoration:none;color:black"><i class="uil uil-plus-circle"></i> Add New Course</a>
                    </button>
            </div>

        </div>
    </div>
</section>
@endsection
