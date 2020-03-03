@extends('welcome');
@section('View News Articles')
@section('content')
<div class="row">
        <div class="col-6 d-flex justify-content-center">
                <a href="{{route('news.create')}}" class=" btn btn-primary">Create Article</a>
        </div>
        <div class="col-6 d-flex justify-content-center">
                <a href="{{route('news.mostpopular')}}" class=" btn btn-primary">Most Popular Articles</a>
        </div>
</div>


@if(session()->get('success'))
<p class="alert alert-success">{{session()->get('success')}}</p>
@endif
<div class="news">
    @foreach ($news as $article)
        <div class="card m-2">
            <div class="card-header">
                <a href="{{route('news.show',$article->link)}}"><h4>{{$article->title}}</h4></a>
                <div class="row">
                    <div class="col">
                    <p>Created at: {{ date('d M Y - H:i:s', $article->created_at->timestamp) }}</p>
                    </div>
                    <div class="col">
                        <p>Upvotes: {{$article->num_upvotes}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>{{$article->description}}</p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                            <a href="{{route('news.edit',$article->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-2">
                        <form method="POST"action="{{route('news.destroy',$article->id)}}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class ="btn btn-danger">
                        </form>
                    </div>
                    <div class="col-2">
                            <a href="{{route('comments.index',$article->id)}}" class="btn btn-success">Comments</a>
                    </div>
                    <div class="col-2">
                        <form method="POST" action="{{ route('news.upvote',$article->id) }}">
                            @method('PATCH')
                            @csrf
                            
                            <input type="submit" value="Upvote" class ="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-2">
                            <form method="POST" action="{{ route('news.downvote',$article->id) }}">
                                @method('PATCH')
                                @csrf
                                
                                <input type="submit" value="Downvote" class ="btn btn-danger">
                            </form>
                        </div>
                        <div class="col-1"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection