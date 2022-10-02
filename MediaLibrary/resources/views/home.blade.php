@extends('general.nav')

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<main class="container-fluid">
    <!-- Categories -->
    <div class="card-columns">
    @forelse ($categories as $category)
        <a href="{{ route('home.categories', $category->id) }}" style="color: black;">
            <div class="card text-center">
                <img src="{{ url($images[$category->media_type]) }}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">{{ $category->name }}</h1>
                    <p class="card-text">{{ $category->media_type }}</p>
                </div>
            </div>
        </a>
    @empty
        <p>There are no categories to display.</p>
    @endforelse
    </div>

    <div class="card-columns">
    @forelse ($mediaItems as $mediaItem)
        <a href="{{ route('play', $mediaItem) }}" style="color: black;">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title">{{ $mediaItem->name }}</h1>
                    <p class="card-text">{{ $mediaItem->media_type }}</p>
                </div>
            </div>
        </a>
    @empty
        <p>There are no media items to display.</p>
    @endforelse
    </div>    
</main>
          
@endsection

