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
                            <h2>Course Details</h2>
                            <p>Home<span>/</span>Course Details<span>/</span>{{$course->category->name}}<span>/</span>{{$course->small_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{asset('Front/img/single_cource.png')}}" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Description</h4>
                         {!! $course->description !!}
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top ">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{$course->trainer->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>${{$course->price}}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div>
                        @include('front.inc.errors')
                        <form class="form-contact contact_form pt-4" action="{{route('front.message.enroll')}}" method="post" id="contactForm" >
                        @csrf
                        <div class="row">
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="name"  type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="email"  type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="spec"  type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your speciality'" placeholder = 'Enter your speciality'>
                            </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">Enroll</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
 @endsection