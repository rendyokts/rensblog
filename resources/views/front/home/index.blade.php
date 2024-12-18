@extends("front.layout.template")
@section('title', 'RensBlog')
@section('content')
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="{{ url('p/'.$latest_post->slug) }}"><img class="card-img-top featured-img" src="{{ asset('storage/back/'.$latest_post->img) }}" alt="{{$latest_post->slug}}" width="200px" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ \Carbon\Carbon::parse($latest_post->created_at)->translatedFormat('d F Y') }}</div>
                    <h2 class="card-title">{{ $latest_post->title }}</h2>
                    <a href="{{ url('category/'.$latest_post->Category->slug) }}" class="text-secondary">{{ $latest_post->Category->name }}</a>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post->desc),150,'...') }}</p>
                    <a class="btn btn-primary btn-sm" href="{{ url('p/'.$latest_post->slug) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($article as $item )
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4 shadow">
                            <a href="{{ url('p/'.$item->slug) }}"><img class="card-img-top post-img" src="{{ asset('storage/back/'.$item->img) }}" alt="{{ $item->slug }}" /></a>
                            <div class="card-body card-height ">
                                <div class="small text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</div>
                                <h2 class="card-title h4">{{ $item->title }}</h2>
                                <a href="{{ url('category/'.$item->Category->slug) }}" class="text-secondary">{{ $item->Category->name }}</a>
                                <p class="card-text">{{ Str::limit(strip_tags($item->desc),150,'...') }}</p>
                                <a class="btn btn-primary btn-sm" href="{{ url('p/'.$item->slug) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination justify-content-center my-4">
                {{ $article->links() }}
            </div>
        </div>
        @include("front.layout.side-widget")
    </div>
</div>
@endsection