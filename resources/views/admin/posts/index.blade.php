@extends('layouts.admin')
@section('title','All Posts')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.posts.create')}}" class="btn btn-info"> Create New Post</a>
            	{!!Form::open(['route'=>'admin.posts.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search Post','aria-describedby'=>'search'])!!}
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
						@foreach($posts as $post)
							<tr>
								<td>{{$post->id}}</td>
								<td>{{$post->title}}</td>
								<td>{{$post->category->name}}</td>
								<td>{{$post->user->name}}</td>
								<td><a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-warning">Edit</a> <a href="{{route('admin.posts.destroy',$post->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $posts->render() !!}
            </div>
        </div>
        <!-- /.row -->
@endsection