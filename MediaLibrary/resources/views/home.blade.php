@extends('general.nav')

@section('message')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-10">
        </div>
    </div>
</div>              
@endsection
