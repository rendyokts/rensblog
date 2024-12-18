<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Rens Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/articles') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="https://rendyokts.vercel.app/" target="_blank">Portfolio</a></li>
                @if(auth()->user())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}" target="_blank">Dashboard</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->