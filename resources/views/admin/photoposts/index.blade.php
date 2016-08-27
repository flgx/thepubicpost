@extends('layouts.admin')
@section('title','All Photo Posts')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.photoposts.create')}}" class="btn btn-info"> Create New Photo Post</a>
            	{!!Form::open(['route'=>'admin.photoposts.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search Photo Post','aria-describedby'=>'search'])!!}
            			<span class="input-group-addon" id="search">
            				<span class="glyphicon glyphicon-search" aria-hidden="true" ></span>
            			</span>
            		</div>
            	{!! Form::close() !!}
            	<hr>

				<table class="table">
					<thead>
						<th>ID</th>
						<th>Title</th>
						<th>Categories</th>
						<th>User</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($photoposts as $photopost)
							<tr>
								<td>{{$photopost->id}}</td>
								<td>{{$photopost->title}}</td>
								<td>{{$photopost->category->name}}</td>
								<td>{{$photopost->user->name}}</td>
								<td><a href="{{route('admin.photoposts.edit',$photopost->id)}}" class="btn btn-warning">Edit</a> <a href="{{route('admin.photoposts.destroy',$photopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $photoposts->render() !!}
            </div>
        </div>
        <!-- /.row -->
@endsection
@section('js')
<script>
$( document ).ready(function() {
    console.log( "ready!" );
});
</script>
@endsection