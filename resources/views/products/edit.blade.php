@extends('layout')

@section('content')
<div class="row">
    <div>
        <div>
            <h2>Edit Product</h2>
        </div>
        <div>
            <a class="btn-back" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Danger!</strong>
    <br>
    There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row padding-top">
        <div class="col-25">
            <label for="title">Title</label>
        </div>
        <div class="col-75">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}">
        </div>
    </div>
    <div class="row padding-top">
        <div class="col-25">
            <label for="content">Content</label>
        </div>
        <div class="col-75">
            <input id="x" type="hidden" name="content" value="{{ $product->content }}" />
            <trix-editor input="x" class="trix-content"></trix-editor>
        </div>
    </div>
    <div class="row padding-top">
        <div class="col-25">
            <label for="category">Category</label>
        </div>
        <div class="col-75">
            <select name="category">
                <option selected hidden>--Select Category--</option>

                @foreach($categories as $category)
                <option selected value="{{ $product->category->first()->id }}">
                    {{$product->category->first()->title}}</option>
                @foreach($categories as $category)
                @if($product->category->first()->id != $category->id)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
                @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="row padding-top">
        <div class="col-25">
            <label for="mage">Image</label>
        </div>
        <div class="col-75">
            <input type="file" name="image" placeholder="Choose image" id="image">
        </div>
    </div>

    <div class="row padding-top">
        <button type="submit" class="btn-submit" style="float: right; width: 200px;">Submit</button>
    </div>

</form>
@endsection