@extends('layout')

@section('content')
    <div class="card">
        <video src="{{$video->path}}" controls class="card-img-top" alt="..."></video>
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
            <p class="card-text">{{$video->description}}</p>
        </div>
        <div class="card-footer text-muted">
            {{$video->created_at->diffForHumans()}}
        </div>
    </div>

    <form action="{{route('videos.comments.store', $video)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="body">Comment</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @foreach($video->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
            <div class="card-footer text-muted">
                {{$comment->user->name}}
                {{$comment->created_at->diffForHumans()}}
            </div>
        </div>
    @endforeach
@endsection
