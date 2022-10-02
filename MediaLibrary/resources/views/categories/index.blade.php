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
                    <legend class="mb4 h3">List of Categories</legend>
                </div>
                <div class="col">
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-custom text-white float-right" title="Create a new category" style="padding-bottom:10px">Create new</a>
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
                @forelse($categories as $category) 
                <tr>
                    <td scope="row"> {{ $category->name }} </td>
                    <td scope="row"> {{ $category->media_type }} </td>
                    <td class="p-1 align-middle">
                    <div class="float-right">
                        <a href="{{ route('home.categories', $category->id) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Explore the category"><i class="material-icons mic">travel_explore</i></a> &nbsp 
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Show the category"><i class="material-icons mic">visibility</i></a> &nbsp 
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit the category"><i class="material-icons mic">edit</i></a> &nbsp    
                        <span data-toggle="modal" data-target="#confirmDeletion">
                            <button id="{{ 'delete-button-'.$loop->index }}" class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#showModal" data-placement="bottom" title="Delete the category" onclick=""><i class="material-icons mic">delete</i></button>
                        </span>
                        <script type="text/javascript">
                            var path = {!! json_encode(route('categories.destroy', $category), JSON_HEX_TAG) !!};
                            document.getElementById("{{ 'delete-button-'.$loop->index }}").setAttribute("onclick", "actionSwitch('" + String(path) + "');");
                        </script>
                    </div>
                    </td>                  
                </tr>
                @empty
                <tr class="text-black">
                    <td style="display: inline-block;">There are no categories to display.</td>
                </tr>  
              @endforelse  
              </tbody>
           </table>
           {{ $categories->links('general.pagination')}}
        </div>
    </div>
 


    <!-- Modal -->
    @if(@isset($category))
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="showModalLabel">Do you want to delete this category?</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   This action can not be undone.
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <a href="{{ route('categories.destroy', $category) }}" class="btn btn-danger text-white" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete</a>
               </div>
            </div>
         </div>
    </div>
    <!-- Delete form -->
    <form method="POST" id="delete-form" action="{{ route('categories.destroy', $category) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>

@endif

@endsection