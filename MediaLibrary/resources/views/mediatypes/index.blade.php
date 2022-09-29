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
                    <legend class="verde-t mb4 h3">List of Media Types</legend>
                </div>
                <div class="col">
                    <a href="{{ route('mediatypes.create') }}" class="btn btn-outline-custom text-white float-right" title="Create a new media type" style="padding-bottom:10px">Create new</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr class ="trc text-white">
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($mediatypes as $mediatype) 
                <tr>
                    <td scope="row"> {{ $mediatype->name }} </td>
                    <td class="p-1 align-middle">
                    <div class="float-right">
                        <a href="{{ route('mediatypes.show', $mediatype) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Show the media type"><i class="material-icons mic">visibility</i></a> &nbsp 
                        <a href="{{ route('mediatypes.edit', $mediatype) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit the media type"><i class="material-icons mic">edit</i></a> &nbsp    
                        <span data-toggle="modal" data-target="#confirmDeletion">
                            <button id="{{ 'delete-button-'.$loop->index }}" class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#showModal" data-placement="bottom" title="Delete the media type" onclick=""><i class="material-icons mic">delete</i></button>
                        </span>
                        <script type="text/javascript">
                            var path = {!! json_encode(route('mediatypes.destroy', $mediatype), JSON_HEX_TAG) !!};
                            document.getElementById("{{ 'delete-button-'.$loop->index }}").setAttribute("onclick", "actionSwitch('" + String(path) + "');");
                        </script>
                    </div>
                    </td>                  
                </tr>
                @empty
                <tr class="text-black">
                    <td style="display: inline-block;">There are no media types to display.</td>
                </tr>  
              @endforelse  
              </tbody>
           </table>
           {{ $mediatypes->links('general.pagination')}}
        </div>
    </div>
 


    <!-- Modal -->
    @if(@isset($mediatype))
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="showModalLabel">Do you want to delete this media type?</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   This action can not be undone.
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <a href="{{ route('mediatypes.destroy', $mediatype) }}" class="btn btn-danger text-white" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</a>
               </div>
            </div>
         </div>
    </div>
    <!-- Delete form -->
    <form method="POST" id="delete-form" action="{{ route('mediatypes.destroy', $mediatype) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>

@endif

@endsection