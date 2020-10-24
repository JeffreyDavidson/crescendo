<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <h1 class="text-white">Crescendo</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="ml-4 navbar-nav">
        @foreach ($categories as $category)
            <li class="nav-item active">
                <a class="nav-link" href="/{{ Str::slug($category->name) }}">{{ $category->name }} <span class="sr-only">(current)</span></a>
            </li>
        @endforeach
      </ul>
    </div>
  </nav>
