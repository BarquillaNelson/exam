@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn-submit" href="{{ route('categories.create') }}"> Create New Category</a>
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

<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($category as $categories)
    <tr>
        <td>{{$categories->id}}</td>
        <td>{{ $categories->title }}</td>
        <td>
            <form action="{{ route('categories.destroy',$categories->id) }}" method="POST">

                <a class="btn-edit" href="{{ route('categories.edit',$categories->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $category->links() }}


@endsection