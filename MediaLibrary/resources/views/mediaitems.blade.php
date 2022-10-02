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

<div class="row my-4">
    <div class="col-md-10 offset-md-1 col-sm-12 bg-dark p-3">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-white text-center">
                Viewing the Media Items of the category <b>{{ $category->name }}</b> - <a href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>
        </div>
    </div> 
    </div>
</div>
<main class="container-fluid">
    <div class="card-columns">
    @forelse ($category->mediaitems as $mediaItem)
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

