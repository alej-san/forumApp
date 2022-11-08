@extends('base')
@extends('nav')
@section('mainContent')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url({{url('assets/img/post-sample-image.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>{{$topic->name}}</h1>
                            <span class="subheading">{{$topic->description}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        @if(session()->has('poster'))
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="d-flex mb-4">
                        <form id="contactForm" method="get" action="{{url('post/create')}}">
                            <button  class="btn btn-primary text-uppercase" >Create New Post →</button>
                             <input name="id"type="hidden" value="{{$topic->id}}">
                        </form>
                    </div>
                    <!-- Post preview-->
                    @foreach ($topic->posts as $posts)
                    <div class="post-preview">
                        <a href="{{ url('post/' . $posts->id) }}">
                            <h2 class="post-title">{{ $posts->title }}</h2>
                            <h3 class="post-subtitle">{{ $posts->message }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            @if(is_null($posts->userid))
                                <p>deleted user</p>
                            @else
                                <a href="{{ url('poster/' . $posts->poster->id) }}">{{$posts->poster->username}}</a>
                                on {{$posts->created_at}}
                            @endif
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    <!-- Pager-->
                    <div class="d-flex  mb-4"><a class="btn btn-primary text-uppercase" href=".">Back</a></div>
                    <form id="contactForm" method="get" action="poster/logout">
                        <button type="submit"  class="btn  btn-primary text-uppercase" id="submitButton" >logout</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
     @endsection
     
     