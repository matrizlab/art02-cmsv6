@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-secondary">Create</a>
        {{-- <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
      </div>
      {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button> --}}
    </div>
  </div>
    @if($posts->count() > 0)
    <div class="table-responsive ">
      <table class="table">
        <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
              <td>
                <img src="{{ asset($post->image) }}" width="120px" height="60px" alt="">
              </td>
              <td>
                {{ $post->title }}
              </td>
              <td>
                <a href="{{ route('categories.edit', $post->category->id) }}">
                    {{ $post->category->name }}
                </a>
              </td>
              @if($post->trashed())
                <td>
                  <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <button type="submit" class="btn btn-info btn-sm">Restore</button>
                  </form>
                </td>
              @else
                <td>
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                </td>
              @endif
              <td>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  {{ $post->trashed() ? 'Delete': 'Trash' }}
                </button>
              </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <h3 class="text-center">No Posts Yet</h3>
    @endif

@endsection
