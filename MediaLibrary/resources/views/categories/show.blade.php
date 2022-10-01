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

<div class="container">
    <div class="row justify-content-center" style="padding-top: 10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #813D81;">
                Viewing a Category
                <div class="float-right">
                        <a href="{{ route('categories.index', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Go back"><i class="material-icons mic">reply</i></a> &nbsp 
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons mic">edit</i></a> &nbsp
                        <span data-toggle="modal" data-target="#confirmDeletion">
                            <button class="btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="material-icons mic">delete</i></button>
                        </span>
                </div>
                </div>    
                <div class="card-body">
                    <!-- Showing the name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" autofocus disabled="true">
                        </div>
                    </div>
                    <!-- Showing the media type -->
                    <div class="row mb-3">
                        <label for="media_type" class="col-md-4 col-form-label text-md-end">Media Type</label>
                        <div class="col-md-6">
                            <input id="media_type" type="text" class="form-control" name="media_type" value="{{ $category->media_type->value }}" autofocus disabled="true">
                        </div>
                    </div>
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

