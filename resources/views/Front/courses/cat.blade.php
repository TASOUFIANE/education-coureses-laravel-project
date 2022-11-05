@extends('Front.layout')


 @section('title')
 Category
 @endsection

 @section('content')
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                        <p>Home<span>/</span>Courses<span>/</span>Category<span>/</span>{{$cat->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
          @foreach($courses as $course)
          <div class="col-sm-6 col-lg-4">
            <div class="single_special_cource">
                <img src="{{asset('Front/img/special_cource_1.png')}}" class="special_img" alt="">
                <div class="special_cource_text">
                    <a href="{{route('front.courseCat',$course->category->id)}}" class="btn_4">{{$course->category->name}}</a>
                    <h4>{{$course->price}}$</h4>
                    <a href="{{route('front.showCourse',[$course->category->id,$course->id])}}"><h3>{{$course->small_description}}</h3></a>
                    <p>{{$course->description}}</p>
                    <div class="author_info">
                        <div class="author_img">
                            <img src="{{asset('Front/img/author/author_1.png')}}" alt="">
                            <div class="author_info_text">
                                <p>Conduct by:</p>
                                <h5>{{$course->trainer->name}}</h5>
                            </div>
                        </div>
                      
                    </div>
                </div>

            </div>
        </div>
          @endforeach
          <div class="d-flex justify-content-center mb-4 w-100">
              <div>
                 {{ $courses->links() }}
              </div>
          </div>
        </div>
    </div>
</section>
<!--::blog_part end::-->
 @endsection