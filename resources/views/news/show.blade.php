@extends('welcome')
@section('View Article')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{$article->title}}</h3>
    </div>
    <div class="card-body">
    <p>{{$article->description}}</p>
    </div>
    <div class="card-footer">
        @if(count($comments)==0)
            <p>No comments</p>
        @else
        <div>
            @foreach ($comments as $comments)
                <div class="media">
                    <div class="m-3">
                        <p>{{$comments->username}}</p>
                    </div>
                    <div class="meadia-body">
                      <p>  {{$comments->text}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @endif 
    </div>
</div>
@endsection