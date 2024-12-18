@extends("front.layout.template")
@section('title', 'RensBlog')
@section('content')
<!-- Page content-->
<div class="container">
    <div class="mb-2">
        <form action="{{ url('/article/search') }}" method="post">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="Search Article" />
                <button class="btn btn-primary" id="button-search" type="submit">Cari</button>
            </div>
        </form>
    </div>

    @if ($keyword)
        <p>
            Showing Articles with keyword : <b>{{ $keyword }}</b> 
            <a href="{{ url('articles') }}" class="btn btn-sm btn-secondary mb-2">Reset</a>
        </p>
    @endif
    <div class="row">
        <!-- Blog entries-->
        @forelse ($articles as $item )
        <div class="col-4">
            <!-- Blog post-->
            <div class="card mb-4 shadow">
                <a href="{{ url('p/'.$item->slug) }}"><img class="card-img-top post-img" src="{{ asset('storage/back/'.$item->img) }}" alt="{{ $item->slug }}" /></a>
                <div class="card-body card-height ">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</div>
                    <h2 class="card-title h4">{{ $item->title }}</h2>
                    <a href="{{ url('category/'.$item->Category->slug) }}" class="text-secondary">{{ $item->Category->name }}</a>
                    <p class="card-text">{{ Str::limit(strip_tags($item->desc),150,'...') }}</p>
                    <a class="btn btn-primary" href="{{ url('p/'.$item->slug) }}">Read more →</a>
                </div>
            </div>
        </div>
        @empty
            <h3>Article Not Found</h3>
        @endforelse
    </div>
    {{ $articles->links() }}
</div>
@endsection