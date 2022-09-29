@extends('general.nav')

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center" style="padding-top: 10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #813D81;">Create new Media Type</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mediatypes.store') }}">
                        @csrf
                            <!-- Insert the name -->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="name">Name</label>
                                </div> 
                                <input id="name" name="name" type="text" placeholder="Insert name of media type" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-outline-custom text-white">Create</button>
                                </div>
                            </div>
                         </form>
                     </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class='alert alert-danger'>
                        <span> {{ $error }} </span>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
