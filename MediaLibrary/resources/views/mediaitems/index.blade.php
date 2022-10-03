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
                    <legend class="mb4 h3">List of Media Items</legend>
                </div>
                <div class="col">
                    <a href="{{ route('mediaitems.create') }}" class="btn btn-outline-custom text-white float-right" title="Create a new media item" style="padding-bottom:10px">Create new</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr class ="trc text-white">
                        <th>Name</th>
                        <th>Media Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($mediaitems as $mediaitem) 
                <tr>
                    <td scope="row"> {{ $mediaitem->name }} </td>
                    <td scope="row"> {{ $mediaitem->media_type }} </td>
                    <td class="p-1 align-middle">
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('play', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Play the media item"><i class="material-icons mic">play_circle</i></a> &nbsp 
                        <a href="{{ route('mediaitems.show', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Show the media item"><i class="material-icons mic">visibility</i></a> &nbsp 
                        @if(Auth::user()->id === $mediaitem->user_id)
                        <a href="{{ route('mediaitems.edit', $mediaitem) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit the media item"><i class="material-icons mic">edit</i></a> &nbsp    
                        <form method="post" action="{{route('mediaitems.destroy',$mediaitem)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure that you want to delete this media item?')"
                            class="btn btn-danger btn-sm"><i class="material-icons mic">delete</i></button>
                        </form>
                        </div>
                    </div>
                    </td>                  
                </tr>
                @empty
                <tr class="text-black">
                    <td style="display: inline-block;">There are no media items to display.</td>
                </tr>  
              @endforelse  
              </tbody>
           </table>
           {{ $mediaitems->links('general.pagination')}}
        </div>
    </div>
 


    <!-- Modal -->
    @if(@isset($mediaitem))
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="showModalLabel">Do you want to delete this media item?</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   This action can not be undone.
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <a href="{{ route('mediaitems.destroy', $mediaitem) }}" class="btn btn-danger text-white" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</a>
               </div>
            </div>
         </div>
    </div>
    <!-- Delete form -->
    <form method="POST" id="delete-form" action="{{ route('mediaitems.destroy', $mediaitem) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>

@endif

@endsection