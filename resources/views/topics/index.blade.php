@extends('base')
@extends('nav')
@section('mainContent')
    
       <!-- Page Header-->
        <header class="masthead" style="background-image: url({{url('assets/img/home-bg.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Topics</h1>
                            <span class="subheading">Here be topics</span>
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
                    <!-- Post preview-->
                       @foreach ($topics as $topic)
                    <div class="post-preview">
                        <a href="{{url('topic/' . $topic->id)}}">
                            <h2 class="post-title">{{ $topic->name }}</h2>
                            <h3 class="post-subtitle">{{ $topic->description }}</h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    <form id="contactForm" method="get" action="poster/logout">
                        <button type="submit"  class="btn  btn-primary text-uppercase" id="submitButton" >Logout</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
     @endsection
     
     