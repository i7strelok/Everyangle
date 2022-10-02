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
                Playing a game - <a href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>
        </div>
    </div> 
    </div>
</div>

@endsection