@extends("back.layout.template")
@section('title', 'Detail Article - Admin')

@section("content")
<!-- content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Articles</h1>
    </div>
    <div class="mt-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th width="250px">Title</th>
                <td>{{ $article->title }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $article->Category->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{!! $article->desc !!}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <a href="{{ asset('storage/back/'.$article->img) }}" target="_blank">
                        <img src="{{ asset('storage/back/'.$article->img) }}" alt="" widt="50%">
                    </a>
                </td>
            </tr>
            <tr>
                <th>Views</th>
                <td>{{ $article->views }}x</td>
            </tr>
            <tr>
                <th>Status</th>
                @if ($article->status == 1)
                    <td><span class="badge bg-success">Public</span></td>
                @else
                    <td><span class="badge bg-danger">Private</span></td>
                @endif
            </tr>
            <tr>
                <th>Publish Date</th>
                <td>{{ \Carbon\Carbon::parse($article->publish_date)->translatedFormat('d F Y') }}</td>
            </tr>
        </table>
        <div class="float-end">
            <a href="{{ url('article/'.$article->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ url('article') }}" class="btn btn-danger btn-sm">Edit</a>
        </div>
    </div>
</main>
@endsection