@extends('base')
@extends('nav')
@section('mainContent')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url({{url('assets/img/about-bg.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>{{$poster->username}}</h1>
                            <span class="subheading">Your Posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                 @if($poster->username ==  session()->get('poster')->username)
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('poster/' . $poster->id . '/edit') }}">Edit user</a></div>
                 <form id="contactForm" method="post" action="{{url('poster/' . $poster->id)}}">
                     @method('delete')
                        @csrf
                            <button  class="btn btn-primary text-uppercase" >delete →</button>
                              <input name="postid"type="hidden" value="{{$poster->id}}">
                            </form>
                @endif
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                     @foreach ($poster->posts as $posts)
                    
                
                    <div class="post-preview">
                        <a href="{{ url('post/' . $posts->id) }}">
                            <h2 class="post-title">{{ $posts->title }}</h2>
                            <h3 class="post-subtitle">{{ $posts->message }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{$posts->poster->username}}</a>
                            on {{$posts->created_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                  
                </div>
            </div>
        </div>
     @endsection
     
     