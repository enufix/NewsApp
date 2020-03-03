@extends('welcome')
@section('View Article')
@section('content')
<div class="card">
    <div class="card-header">
            <a href="{{route('news.show',$article->link)}}"><h4>{{$article->title}}</h4></a>
        <div class="row">
                <div class="col">
                <p>Created at: {{$article->created_at}}</p>
                </div>
                <div class="col">
                <p>Upvotes{{$article->num_upvotes}}</p>
                </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('news.upvote',$article->id) }}">
                    @method('PATCH')
                    @csrf
                    
                    <input type="submit" value="Upvote" class ="btn btn-primary">
                </form>
            </div>
            <div class="col">
                    <form method="POST" action="{{ route('news.downvote',$article->id) }}">
                        @method('PATCH')
                        @csrf
                        
                        <input type="submit" value="Downvote" class ="btn btn-danger">
                    </form>
                </div>
                <div class="col">
                    <a href="{{route('comments.create',$article->id)}}" class="btn btn-primary">Create Comment</a>
                </div>
        </div>
    </div>
    
    <div class="card-footer">
        @if(count($comments)==0)
            <p>No comments</p>
        @else
        <div>
            @foreach ($comments as $comment)
            <div class="comment">
                <div class="media">
                    <div class="m-3">
                        <p>{{$comment->username}}</p>
                    </div>
                    <div class="meadia-body">
                      <p>  {{$comment->text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-contnet-center">
                <a href="{{route('comments.edit',[$article->id , $comment->id])}}" class="btn btn-primary">Edit Comment</a>
                </div>
                <div class="col d-flex justify-content-center">
                <form method="POST" action="{{route('comments.destroy',[$article->id,$comment->id])}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete Comment" class="btn btn-danger">
                </form>
                </div>
            </div>
            @endforeach
        </div>
        @endif 

        <div class="row">
            
        </div>
    </div>
</div>
@endsection