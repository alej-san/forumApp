@extends('base')
@extends('nav')
@section('mainContent')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>New Post</h1>
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
                       
                        <p>Posting as {{$comment->poster->username}}</p>
                        <div class="my-5">
                          
                            <form id="contactForm" action="{{ url('comment/' . $comment->id) }}" method="post">
                                @csrf
                                @method('put')
                                
                               
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" maxlenght="255" required placeholder="Enter your message here..." style="height: 12rem" name="message">{{$comment->message}}</textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                </div>
                                <br />
                    
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                            </form>
                            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('topic') }}">Back</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
     @endsection
     
     