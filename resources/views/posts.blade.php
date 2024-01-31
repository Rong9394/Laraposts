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

                    @if (session('post_deleted'))
                        <div class="alert alert-success" role="alert" style="text-align: center; margin-top:15px">
                            {{ session('post_deleted') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <ul style="background-color:rgb(241 245 249)">
                            <span class="block hover:bg-gray-50 p-0.5 rounded inline-block">Created by {{$post->user->name}}</span>
                            <a href="{{route('view_post', ['post'=>$post->id])}}" style="display:block; font-size:30px; font-weight:bold; color:black">{{$post->title}}</a>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection