@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
            <a class="btn-submit" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="success">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Success!</strong>
    <br>
    <p>{{ $message }}</p>
</div>
@endif

<table class="table">
    <tr>
        <th>No.</th>
        <th>Image</th>
        <th>Title</th>
        <th>Content</th>
        <th>Category</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td><img src="{{Storage::url($product->image)}}" alt="" width="200"></td>
        <td>{{ $product->title }}</td>
        <td>{!! $product->content !!}</td>
        <td>{{ $product->category->first()->title ?? "N/A" }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <!-- <a class="btn-submit" href="{{ route('products.show',$product->id) }}">Show</a> -->

                <a class="btn-edit" href="{{ route('products.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $products->links() }}



@endsection