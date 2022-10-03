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

<style type="text/css">
    .bootstrap-select>.dropdown-toggle.bs-placeholder{
        color: #495057 !important;
    }

    .bootstrap-select .dropdown-menu li a.dropdown-item:focus, .bootstrap-select .dropdown-menu li a.dropdown-item:active, .bootstrap-select .dropdown-menu li a.dropdown-item:hover{
        border-left: 3px solid #679A07 !important;
        background-color: white !important;
    }

    span.bs-ok-default.check-mark{
        color: #679A07 !important;
    }

    li:focus{
        outline-color: #679A07 !important;
    }

    #app > div > div > div > div > form > fieldset > div:nth-child(6) > div > button{
        outline: none !important;
    }

</style>
<div class="container">
    <div class="row justify-content-center" style="padding-top: 10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #813D81;">Add new Media Item</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mediaitems.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                            <!-- Insert the name-->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="name">Name</label>
                                </div> 
                                <input id="name" name="name" type="text" placeholder="Insert name of media item" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <!-- Select a media type-->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="media_type">Select a media type</label>
                                </div>
                                <select class="custom-select" name="media_type" id="media_type">
                                @foreach($mediatypes as $mediatype)  
                                    <option value="{{ $mediatype }}" {{ ($mediatype == old('media_type'))? 'selected':'' }}>{{ $mediatype }}</option>
                                @endforeach
                                </select>
                            </div>
                            <!-- File input -->
                            <div class="input-group mb-4">
                                <div class="float-left">
                                    <label class="input-group-prepend btn trc btn-sm text-white">Upload a media item
                                    <input type="file" name="file" style="display: none;"></label>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload your media item" class="form-control">
                                </div>
                            </div>

                            <!-- Categories -->
                            <div class="input-group mb-4">
                                <select class="custom-select" data-width="100%" title="Choose Categories" name="categories[]" id="categories" data-old="{{ old('categories') }}" multiple> <!--data-live-search="true" -->
                                </select>
                            </div>

                            <!-- Insert a description-->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="description">Description</label>
                                </div> 
                                <input id="description" name="description" type="text" placeholder="Enter the media item description" class="form-control" value="{{ old('description') }}">
                            </div>
                            <!-- Upload button-->
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-outline-custom text-white">Upload</button>
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

@section('script')
<script type="text/javascript">

    window.onload = function(){
        setup();
        loadCategories();
    };

    function setup() {
        this.document.getElementById('media_type').setAttribute("onchange", "loadCategories()");
    }

    function loadCategories(){
        setTimeout(function(){
        id = document.getElementById('media_type').value;
        xhttp = new XMLHttpRequest();    
        xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                        selectTag           = document.getElementById("categories");
                        selectTag.innerHTML = "";
                        optionTags          = "";
                        response   = JSON.parse(JSON.parse(JSON.stringify(this.responseText)));
                        console.log(response)
                        if (response.data.length > 0) {
                            response.data.forEach(function(value, index, array){
                                optionTags +=   `<option value="${response.data[index].id}">
                                                    ${response.data[index].name}
                                                </option>
                                                `;
                            });
                        }else{
                            optionTags +=   `<option disabled>
                                                There are no categories for that Media Type
                                            </option>
                                            `;
                        }
                        selectTag.insertAdjacentHTML("beforeend", optionTags);


                };
            };

            xhttp.open("GET", "{{ route('getcategories') }}" + "?media_type=" + id, true); 
            xhttp.send();
        }, 400);
    }

    function updateCategories() {
        options = document.querySelectorAll("#categories > option");
    }

</script>
@endsection
@endsection
