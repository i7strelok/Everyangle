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
                        <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('home.categories', $category->id) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Explore the category"><i class="material-icons mic">travel_explore</i></a> &nbsp 
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Show the category"><i class="material-icons mic">visibility</i></a> &nbsp 
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-custom text-white" data-toggle="tooltip" data-placement="bottom" title="Edit the category"><i class="material-icons mic">edit</i></a> &nbsp    
                        <form method="post" action="{{route('categories.destroy',$category)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure that you want to delete this category?')"
                            class="btn btn-danger btn-sm"><i class="material-icons mic">delete</i></button>
                        </form>
                        </div>
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
 




@if(@isset($category))
    <!-- Modal -->
    <div class="modal fade" id="confirmDeletion" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
          <div class="modal-header bg-dark">
            <h4 class="modal-title verde-t" id="exampleModalCenterTitle">@lang('Warning!')</h4>
          </div>
          <div class="modal-body text-white">
            <h5>
                @lang('You are about to delete an area. This operation can not be undone.') <br><br> 
                @lang('Are you sure you wish to proceed?')
            </h5>
          </div>
          <div class="modal-footer bg-dark">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
            <a id="delete-link" href="{{ route('categories.destroy', $category) }}" class="btn verde-b text-white" onclick="
                                            event.preventDefault();
                                            document.getElementById('delete-form').submit();">@lang('Confirm')</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete form -->
    <form method="POST" id="delete-form" action="">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
@endif

@endsection