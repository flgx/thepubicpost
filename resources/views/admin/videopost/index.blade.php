@extends('layouts.admin')
@section('title','All Videos')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.videoposts.create')}}" class="btn btn-info"> Create New Video</a>
            	{!!Form::open(['route'=>'admin.videoposts.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search Video','aria-describedby'=>'search'])!!}
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
						@foreach($videoposts as $videopost)
							<tr>
								<td>{{$videopost->id}}</td>
								<td>{{$videopost->title}}</td>
								<td>{{$videopost->category->name}}</td>
								<td>{{$videopost->user->name}}</td>
								<td><a href="{{route('admin.videoposts.edit',$videopost->id)}}" class="btn btn-warning">Edit</a> <a href="{{route('admin.videoposts.destroy',$videopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $videoposts->render() !!}
            </div>
        </div>
        <!-- /.row -->
@endsection