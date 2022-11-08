@extends('base')
@extends('nav')
@section('mainContent')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url({{url('assets/img/contact-bg.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Log In</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Who art thou</p>
                        @error('user')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="my-5">
                            <form id="contactForm" method="get" action="poster/login">
                                <div class="form-floating">
                                    <input class="form-control" id="name" maxlenght="20" type="text" placeholder="Enter your name..." name="username" required/>
                                    <label for="name">Username</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <br />
                                <button type="submit"  class="btn  btn-primary text-uppercase" id="submitButton" >login</button>
                                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('poster/create') }}">Sign Up</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
     @endsection
     
     