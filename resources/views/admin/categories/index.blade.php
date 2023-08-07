@extends('layouts.admin')

@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">Categories</h2>
    <div class="ml-auto">
        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
            + Create category</a>
    </div>
</header>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Products #</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>
                <a href="{{ $category->image_url }}">
                    <img src="{{ $category->image_url }}" width="60" alt="">
                </a>
            </td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->products_count }}</td>
            <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-dark">
                <i class="far fa-edit"></i> Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

@endsection