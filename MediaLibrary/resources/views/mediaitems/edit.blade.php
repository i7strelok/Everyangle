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
                <div class="card-header text-white" style="background-color: #813D81;">Edit MediaItem</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mediaitems.update', $mediaitem) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            <!-- Edit the name -->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="name">Name</label>
                                </div> 
                                <input id="name" name="name" type="text" placeholder="Insert name of media type" class="form-control" value="{{ old('name', $mediaitem->name) }}" required>
                            </div>
                            <!-- Select different categories-->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="categories">Categories</label>
                                </div>
                                <select class="custom-select" name="categories[]" id="categories" multiple>
                                @foreach($categories as $category)  
                                    <option value="{{ $category->id }}" {{ (in_array($category->id, $categoriesSelected)) ? 'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <!-- Edit the description-->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="description">Description</label>
                                </div> 
                                <input id="description" name="description" type="text" placeholder="Enter the media item description" class="form-control" value="{{ old('description', $mediaitem->description) }}">
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-outline-custom text-white">Save</button>
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