@extends('Admin.layout')


@section('title')
  Edit Course
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
                <span class="text">Edit Course / {{ $course->small_description }} /   <a href="{{route('admin.courses.index')}}" class="bg-transparent hover:no-underline hover:bg-green-500 text-black  hover:text-white px-4 border border-green-500 hover:border-transparent rounded ">Return</a></span>
            </div>
            @if($errors->any())

                @foreach($errors->all() as $error)
                <div class="bg-orange-100 border-l-4 mb-4 border-orange-500 text-orange-700 p-2" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ $error }}</p>
                </div>
                @endforeach

           @endif
            <form action="{{route('admin.courses.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <input class="form-control"  value="{{$course->price}}" type="number" name="price" placeholder="Price" ><br><br>
                 <input class="form-control"  value="{{$course->small_description}}" type="text" name="small_description" placeholder="Short Description"><br><br>
                 <textarea class="form-control"  cols="30" rows="6" name="description" placeholder="Description">{{$course->description}}</textarea><br><br>
                 <select class="form-control" name="trainer_id">
                    <option selected value="{{$course->trainer->id}}">{{$course->trainer->name}}</option>
                    @foreach($trainers as $t)
                     @if($t->id == $course->trainer->id)
                        @continue;
                     @endif
                     <option  value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                 </select><br><br>

                 <select class="form-control" name="category_id">
                    <option selected value="{{$course->category->id}}">{{$course->category->name}}</option>
                    @foreach($cats as $c)
                        @if($c->id == $course->category->id)
                            @continue;
                        @endif
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                 </select><br><br>

                 <input class="form-control"   type="file" name="img"><br>

                 <input type="hidden" name="id" value="{{$course->id}}">
                 <img src="{{ asset('uploads/courses/'.$course->img)}}"  style="height: 60px;" alt="picture"><br>
                 <button type="submit">
                   Submit
                  </button>
            </form>
        </div>


    </div>
</section>

@endsection
