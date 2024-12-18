@extends("back.layout.template")
@section('title','Dashboard - Admin')
@section("content")
<!-- content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <a class="col-6 text-decoration-none" href="{{ url('article') }}">
            <div class="card text-white bg-primary mb-3" style="max-width: 100%;">
                <div class="card-header">Total Articles</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $total_articles }} Article</h5>
                </div>
            </div>
        </a>
        <a class="col-6 text-decoration-none"  href="{{ url('categories') }}">
            <div class="card text-white bg-secondary mb-3" style="max-width: 100%;">
                <div class="card-header">Total Categories</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $total_categories }} Categories</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-6">
            <h4>Latest Articles</h4>
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latest_article as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->Category->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ url('article/'.$item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h4>Popular Articles</h4>
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Views</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($popular_article as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->Category->name }}</td>
                            <td>{{ $item->views }}x</td>
                            <td class="text-center">
                                <a href="{{ url('article/'.$item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection