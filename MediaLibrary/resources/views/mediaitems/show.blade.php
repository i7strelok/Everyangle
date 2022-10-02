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
                Viewing a Media Item
                <!-- Buttons -->
                <div class="float-right">
                    <a href="{{ route('mediaitems.index', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Go back"><i class="material-icons mic">reply</i></a> &nbsp 
                    <a href="{{ route('play', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Play"><i class="material-icons mic">play_circle</i></a> &nbsp
                    @if(Auth::user()->id === $mediaitem->user_id)
                    <a href="{{ route('mediaitems.edit', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons mic">edit</i></a> &nbsp
                    @endif
                </div>
                </div>    
                <div class="card-body">
                    <!-- Showing the name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $mediaitem->name }}" autofocus disabled="true">
                        </div>
                    </div>
                    <!-- Showing the media type -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Media Type</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $mediaitem->media_type }}" autofocus disabled="true">
                        </div>
                    </div>
                    <!-- A select to show categories-->
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end" for="categories">Categories</label>
                        <div class="col-md-6">
                            <select class="custom-select" name="categories" id="categories" disabled="true">
                            @foreach($categories as $category)   
                                <option>{{ $category }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>                     
                    <!-- Showing the description -->       
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control z-depth-1" id="description" rows="3" placeholder="{{ $mediaitem->description }}" disabled="true"></textarea>
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

