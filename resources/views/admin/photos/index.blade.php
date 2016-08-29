@extends('layouts.admin')
@section('title','My PhotoPosts')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.photos.create')}}" class="btn btn-info"> Create New Photopost</a>
            	{!!Form::open(['route'=>'admin.photos.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search Photopost','aria-describedby'=>'search'])!!}
            			<span class="input-group-addon" id="search">
            				<span class="glyphicon glyphicon-search" aria-hidden="true" ></span>
            			</span>
            		</div>
            	{!! Form::close() !!}
            	<hr>

				<table class="tablesorter table" id="myTable">
					<thead>
						<th>ID <span class="pull-right fa fa-sort"></span></th>
						<th>Title <span class="pull-right fa fa-sort"></span> </th>
						<th>Categories <span class="pull-right fa fa-sort"></span></th>
						<th>User <span class="pull-right fa fa-sort"></span></th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($photos as $photo)
							<tr>
								<td>{{$photo->id}}</td>
								<td>{{$photo->title}}</td>
								<td>{{$photo->category->name}}</td>
								<td>{{$photo->user->name}}</td>
								<td>
									@if($photo->status == 'approved' && Auth::user()->type=='admin')
									<a href="#" onclick="return confirm('This posts is already approved.');" class="btn btn-success" disabled="disabled">Approve</a>
									@elseif(Auth::user()->type == 'admin')
										<a href="{{route('admin.photos.approve',$photo->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-success">Approve</a>
									@endif
									@if($photo->status == 'suspended' && Auth::user()->type=='admin')
									<a href="{{route('admin.photos.suspend',$photo->id)}}" onclick="return confirm('This posts is already suspended.');" disabled="disabled" class="btn btn-primary">Suspend</a>
									@elseif(Auth::user()->type == 'admin')									
									<a href="{{route('admin.photos.suspend',$photo->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-primary">Suspend</a>
									@endif
									<a href="{{route('admin.photos.edit',$photo->id)}}" class="btn btn-warning">Edit</a>
								   <a href="{{route('admin.photos.destroy',$photo->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $photos->render() !!}
				</div>
				
            </div>
        </div>
        <!-- /.row -->
@endsection
@section('js')
@endsection