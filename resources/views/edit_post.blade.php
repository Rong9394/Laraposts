@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('post_saved'))
                        <div class="alert alert-success" role="alert" style="text-align: center; margin-top:15px">
                            {{ session('post_saved') }}
                        </div>
                    @endif

                    <form action="{{route('edit_post', ['post'=>$post->id])}}" method="POST">
                        @csrf
                        <div style="margin-top:15px; display:flex; width:50%; margin-left:auto; margin-right:auto">
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" style="margin-left:10px; flex-grow:1" value="{{$post->title}}">
                        </div>

                        <div style="margin-top:15px; display:flex; width:50%; margin-left:auto; margin-right:auto">
                            <label for="body">Body</label>
                            <input id="body" name="body" type="text" style="margin-left:10px; flex-grow:1" value="{{$post->body}}">
                        </div>
                        <div style="text-align:center; margin-top:15px">
                            @auth
                                @if($post->user_id == Auth::user()->id)
                                    <button type="submit">Update</button>
                                @endif
                            @endauth
                            <button style="margin-left:20px" type="button" onclick="window.location='{{route('posts')}}'">Return</button>
                        </div>
                        </div>  
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        