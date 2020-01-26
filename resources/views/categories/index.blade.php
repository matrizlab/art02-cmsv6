@extends('layouts.app')

@section('content')

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  <h1 class="h2">Categories</h1>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                      <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-secondary">Create</a>
                      {{-- <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
                    </div>
                    {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                      <span data-feather="calendar"></span>
                      This week
                    </button> --}}
                  </div>
                </div>
                @if($categories->count() > 0)
                <div class="table-responsive ">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts Count</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                          <tr>
                            <td>
                              {{ $category->name }}
                            </td>
                            <td>
                              {{ $category->posts->count() }}
                            </td>
                            <td>
                              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                                Edit
                              </a>
                              <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="" method="POST" id="deleteCategoryForm">
                              @csrf
                              @method('DELETE')
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p class="text-center text-bold">
                                    Are you sure you want to delete this category ?
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                              </div>
                          </form>
                        </div>
                      </div>
                      @else
                      <h3 class="text-center">No categories yet.</h3>
                      @endif
@endsection
@section('scripts')
  <script>
    function handleDelete(id) {
        //console.log('deleting');
      var form = document.getElementById('deleteCategoryForm')
      form.action = '/categories/' + id
      $('#deleteModal').modal('show')
    }
  </script>
@endsection
