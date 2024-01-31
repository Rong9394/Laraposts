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

                    @if (session('post_updated'))
                        <div class="alert alert-success" role="alert" style="text-align: center; margin-top:15px">
                            {{ session('post_updated') }}
                        </div>
                    @endif

                    <div>
                        <div style="margin-top:15px; width:50%; margin-left:auto; margin-right:auto">
                            <label for="title">Title</label>
                            <div id="title" name="title" style="border:solid black 1px">{{$post->title}}</div>
                        </div>

                        <div style="margin-top:15px; width:50%; margin-left:auto; margin-right:auto">
                            <label for="body">Body</label>
                            <div id="body" name="body" style="border:solid black 1px">{{$post->body}}</div>
                        </div>
                        
                        <div style="margin-top:15px; width:50%; margin-left:auto; margin-right:auto">
                            <span>Created by {{$post->user->name}}</span><br>
                            <span>Created at {{$post->created_at}}</span><br>
                            <span>Updated at {{$post->updated_at}}</span><br>
                        </div>
                    </div>

                    <div style="text-align:center; margin-top:15px">
                        @auth
                            @if($post->user_id == Auth::user()->id)
                                <button onclick="window.location='{{route('edit_post', ['post'=>$post->id])}}'" type="button">Edit</button>
                                <form style="display:inline-block; margin-left:20px" action="{{route('delete_post', ['post'=>$post->id])}}" method="GET">
                                    @csrf
                                    <button type="submit">Delete</button> 
                                </form>
                            @endif
                        @endauth
                        <button type="button" style="margin-left:20px" onclick="window.location='{{route('posts')}}'">Return</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        