@extends('base')

@section('mainContent')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
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
                        <div class="my-5">
                             <form action="{{ url('poster') }}" method="post">
                                 
                                @csrf
                                @method('put')
                              
                                 <div class="form-floating">
                                     <input value="{{ $poster->email }}" required type="text" minlength="3" maxlength="100" class="form-control" id="email" name="email" placeholder="Email Address">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <!--<div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>-->
                                </div>
                                <div class="form-floating">
                                     <input value="{{ $poster->birthdate }}" required type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birthdate">
                                    <label for="birthdate">Date of birth</label>
                                    @error('birthdate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <!--<div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>-->
                                </div>
                               
                                <br />
                            
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                            </form>
                            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href=".">Back</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
     @endsection
     
     