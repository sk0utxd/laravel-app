@extends('layout')
@section('content')
    @if(request()->session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
            {{request()->session()->get('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Created At</th>
            <th>Updated At</th>
        </thead>
        <tbody>
            @foreach($video as $video)
            @if($video->id == request()->route('video')->id)
                <tr>
                    <td>{{$video->id}}</td>
                    <td>{{$video->title}}</td>
                    <td>{{$video->duration}}</td>
                    <td>{{$video->created_at}}</td>
                    <td>{{$video->updated_at}}</td>
                    <td>
                        <a href="{{route('videos.edit', ['video' => $video])}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('videos.destroy', ['video' => $video])}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        <tfoot>
            <th>Id</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tfoot>
    </table>
@endsection

@push('scripts')
    <script>
        window.addEventListener("load", () => {
            const alert = bootstrap.Alert.getOrCreateInstance('#status-alert')
            setTimeout(() => alert.close(), 5000);
        });
    </script>
@endpush
