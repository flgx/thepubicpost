@extends('layouts.admin')
@section('title','All Ebooks')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.ebooks.create')}}" class="btn btn-info"> Create New Ebook</a>
            	{!!Form::open(['route'=>'admin.ebooks.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search Ebook','aria-describedby'=>'search'])!!}
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
						@foreach($ebooks as $ebook)
							<tr>
								<td>{{$ebook->id}}</td>
								<td>{{$ebook->title}}</td>
								<td>{{$ebook->category->name}}</td>
								<td>{{$ebook->user->name}}</td>
								<td><a href="{{route('admin.ebooks.edit',$ebook->id)}}" class="btn btn-warning">Edit</a> <a href="{{route('admin.ebooks.destroy',$ebook->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $ebooks->render() !!}
            </div>
        </div>
        <!-- /.row -->
@endsection