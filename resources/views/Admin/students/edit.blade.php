@extends('Admin.layout')


@section('title')
  Edit Student
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
                <span class="text">Edit Student / {{ $student->name }} /   <a href="{{route('admin.students.index')}}" class="bg-transparent hover:no-underline hover:bg-green-500 text-black  hover:text-white px-4 border border-green-500 hover:border-transparent rounded ">Return</a></span>
            </div>
            @if($errors->any())

                @foreach($errors->all() as $error)
                <div class="bg-orange-100 border-l-4 mb-4 border-orange-500 text-orange-700 p-2" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ $error }}</p>
                </div>
                @endforeach

           @endif
            <form action="{{route('admin.students.update')}}" method="POST" enctype="multipart/form-data">
                @csrf

                 <input class="form-control"  value="{{$student->name}}" type="text" name="name" placeholder="Student Name" ><br><br>
                 <input class="form-control"  value="{{$student->email}}" type="email" name="email" placeholder="Email" ><br><br>
                 <input class="form-control"  value="{{$student->specialty}}" type="text" name="specialty" placeholder="Speciality"><br><br>
                 <input class="form-control"   type="file" name="img"><br>
                 <input type="hidden" name="id" value="{{$student->id}}">

                 <button type="submit">
                   Submit
                  </button>
            </form>
        </div>


    </div>
</section>

@endsection
