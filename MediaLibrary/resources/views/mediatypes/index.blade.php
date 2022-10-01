@extends('general.nav')
@section('head')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
        <div class="table-responsive-sm justify-content-center mt-5 table-borderless">
            <div class="row mb-5">
                <div class="col-auto" style="padding-top: 10px">
                    <legend class="mb4 h3">List of Media Types</legend>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr class ="trc text-white">
                        <th>Name</th>
                        <th>MimeTypes</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($mediatypes as $mediatype) 
                <tr>
                    <td scope="row"> {{ $mediatype['name'] }} </td>
                    <td scope="row"> {{ $mediatype['mimetypes'] }} </td>
                    <td class="p-1 align-middle">
                    </td>                  
                </tr>
                @empty
                <tr class="text-black">
                    <td style="display: inline-block;">There are no media types to display.</td>
                </tr>  
              @endforelse  
              </tbody>
           </table>
        </div>
    </div>

@endsection