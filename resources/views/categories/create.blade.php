@extends('layouts.app')

@section('content')

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  <h1 class="h2">{{ isset($category)  ? 'Edit Category' : 'Create category' }}</h1>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                      {{--<a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-secondary">Create</a>
                       <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
                    </div>
                    {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                      <span data-feather="calendar"></span>
                      This week
                    </button> --}}
                  </div>
                </div>
                @include('partials.errors')
                <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update Category': 'Add Category' }}</button>
                  </form>
@endsection
