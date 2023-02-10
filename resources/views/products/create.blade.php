@extends('layout')

@section('content')
<div class="row">
    <div>
        <div>
            <h2>Add New Product</h2>
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

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row padding-top">
        <div class="col-25">
            <label for="title">Title</label>
        </div>
        <div class="col-75">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="row padding-top">
        <div class="col-25">
            <label for="content">Content</label>
        </div>
        <div class="col-75">
            <input id="x" type="hidden" name="content" value="" />
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
                <option value="{{ $category->id }}">{{ $category->title }}</option>
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