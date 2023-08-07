@extends('layouts.admin')

@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">Trashed Products</h2>
    <div class="ml-auto">
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
            Products List</a>
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
            <th>Deleted At</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                <a href="{{ $product->image_url }}">
                    <img src="{{ $product->image_url }}" width="60" alt="">
                </a>
            </td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->deleted_at }}</td>
            <td>
                <form action="{{ route('products.restore', $product->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i> Restore</button>
                </form>
            </td>
            <td>
                <form action="{{ route('products.force-delete', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Force Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}

@endsection