@extends("front.layout.template")
@section('title', $article->title . '- RensBlog')
@section('content')
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <div class="card mb-4 shadow">
                <a href="{{ url('p/'.$article->slug) }}"><img class="card-img-top single-img" src="{{ asset('storage/back/'.$article->img) }}" alt="{{ $article->title }}" width="200px" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}</span> |
                        <span>{{ $article->views }} views</span>
                    </div>
                    <h1 class="card-title">{{ $article->title }}</h1>
                    <a href="{{ url('category/'.$article->Category->slug) }}" class="text-secondary">{{ $article->Category->name }}</a>
                    <p class="card-text">{!! $article->desc !!}</p>
                </div>
            </div>
        </div>
        @include("front.layout.side-widget")
    </div>
</div>
@endsection