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

<main class="container-fluid">
    <div class="card-columns">
    @forelse ($mediaItems as $mediaItem)
        <a href="route("productos.index")" style="color: black;">
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

