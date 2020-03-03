@extends('welcome');
@section('Most Popular Articles')
@section('content')

<div class="news">
    @foreach ($news as $article)
        <div class="card m-2">
            <div class="card-header">
                <h4>{{$article->title}}</h4>
                <div class="row">
                    <div class="col">
                    <p>Created at: {{ date('d M Y - H:i:s', $article->created_at->timestamp) }}</p>
                    </div>
                    <div class="col">
                        <p>Upvotes: {{$article->num_upvotes}}</p>
                    </div>
                    <div class="col">
                        <a href="{{route('news.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>{{$article->description}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection