@extends('layout')

@section('content')
<div class="row">
    <div>
        <div>
            <h2>Edit Category</h2>
        </div>
        <div>
            <a class="btn-back" href="{{ route('categories.index') }}"> Back</a>
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

<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row padding-top">
        <div class="col-25">
            <label for="title">Title</label>
        </div>
        <div class="col-75">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $category->title }}">
        </div>
    </div>
    <div class="row padding-top">
        <button type="submit" class="btn-submit" style="float: right; width: 200px;">Submit</button>
    </div>

</form>
@endsection