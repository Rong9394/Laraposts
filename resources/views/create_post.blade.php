
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

                    <form action="{{basename(route('create_post'))}}" method="POST">
                        @csrf
                        <div style="margin-top:15px; display:flex; width:50%; margin-left:auto; margin-right:auto">
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" style="margin-left:10px; flex-grow:1">
                        </div>

                        <div style="margin-top:15px; display:flex; width:50%; margin-left:auto; margin-right:auto">
                            <label for="body">Body</label>
                            <input id="body" name="body" type="text" style="margin-left:10px; flex-grow:1">
                        </div>

                        <div style="text-align: center; margin-top:15px">
                            <button type="submit">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        