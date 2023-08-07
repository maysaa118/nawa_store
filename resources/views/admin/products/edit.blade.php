@extends('layouts.admin')

@section('content')
<h2 class="mb-4 fs-3">Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- Comment: Form Method Spoofing --}}
    <input type="hidden" name="_method" value="put">
    @method('put')

    @include('admin.products._form', [
        'submit_label' => 'Update',
    ])
</form>
@endsection