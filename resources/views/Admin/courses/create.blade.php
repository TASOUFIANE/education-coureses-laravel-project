@extends('Admin.layout')


@section('title')
  Add Trainer
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
                <span class="text">Add Course /   <a href="{{route('admin.courses.index')}}" class="bg-transparent hover:no-underline hover:bg-green-500 text-black  hover:text-white px-4 border border-green-500 hover:border-transparent rounded ">Return</a></span>
            </div>
            @if($errors->any())

                @foreach($errors->all() as $error)
                <div class="bg-orange-100 border-l-4 mb-4 border-orange-500 text-orange-700 p-2" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ $error }}</p>
                </div>
                @endforeach

            @endif
            <form action="{{route('admin.courses.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <input class="form-control"   type="text" name="name" placeholder="Course's Name"><br><br>
                 <input class="form-control"   type="number" name="price" placeholder="Price"><br><br>

                 <input class="form-control"   type="text" name="small_description"  placeholder="Small Description"><br><br>
                 <textarea class="form-control"  cols="40" rows="10"  name="description" placeholder="Write Description"></textarea><br><br>
                 <select class="form-control" name="tariner_id">
                    @foreach($trainers as $trainer)
                    <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                    @endforeach
                 </select><br><br>
                 <select class="form-control" name="category_id">
                    @foreach($cats as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                 </select><br><br>
                 <input class="form-control" type="file" name="img"><br><br>
                 <button type="submit">
                   Submit
                  </button>
           </form>
        </div>


    </div>
</section>

@endsection
