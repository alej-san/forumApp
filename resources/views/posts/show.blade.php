@extends('base')
@extends('nav')


@section('modalContent')
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span id="deletePost">XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete item"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('mainContent')

        <!-- Page Header-->
        <header class="masthead" >
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                          
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href=".">Back</a></div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @if(!is_null($post->userid))
                        @if($post->poster->username ==  session()->get('poster')->username)
                            @if (\Carbon\Carbon::parse($post->created_at)->addMinutes(5)>now())
                                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('post/' . $post->id . '/edit') }}">Edit post</a></div>
                                <form id="contactForm" method="post" action="{{url('post/' . $post->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button  class="btn btn-primary text-uppercase" >delete →</button>
                                    <input name="postid"type="hidden" value="{{$post->id}}">
                                </form>
                            @endif
                        @endif
                    @endif
                    <!--<a href="javascript: void(0);" -->
                    <!--    data-name="{{ $post->title }}"-->
                    <!--    data-url="{{ url('post/' . $post->id) }}"-->
                    <!--    data-toggle="modal"-->
                    <!--    data-target="#modalDelete">delete</a>-->
                    <div class="post-preview">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <p class="post-meta">
                            Posted by
                            @if(is_null($post->userid))
                                <p>deleted user</p>
                            @else
                                <a href="{{ url('poster/' . $post->poster->id) }}">{{$post->poster->username}}</a>
                                on {{$post->created_at}}
                            @endif
                        </p>
                        <p class="post-subtitle">{{ $post->message }}</p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                   @foreach ($post->comments as $comment)
                    <div class="post-preview">
                        <p class="post-title">{{ $comment->message }}</p>
                        <p class="post-meta">
                            Posted by
                            <a>{{$comment->poster->username}}</a>
                            on {{$comment->created_at}}
                        </p>
                         @if($comment->poster->username ==  session()->get('poster')->username)
                            @if (\Carbon\Carbon::parse($comment->created_at)->addMinutes(5)>now())
                                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('comment/' . $comment->id . '/edit') }}">Edit comment</a></div>
                                <form id="contactForm" method="post" action="{{url('post/' . $post->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button  class="btn btn-primary text-uppercase" >delete →</button>
                                    <input name="postid"type="hidden" value="{{$post->id}}">
                                </form>
                            @endif
                        @endif
                    </div>
                    @endforeach
                </div>
                <form id="contactForm" method="get" action="{{url('comment/create')}}">
                    <button  class="btn btn-primary text-uppercase" >New Comment →</button>
                    <input name="postid"type="hidden" value="{{$post->id}}">
                </form>
            </div>
        </div>
     @endsection
     
@section('scripts')
<script src="{{ url('assets/js/product-modal-delete.js') }}"></script>
@endsection