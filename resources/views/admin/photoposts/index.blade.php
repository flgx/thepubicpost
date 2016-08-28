@extends('layouts.admin')
@section('title','All Photoposts')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.photoposts.create')}}" class="btn btn-info"> Create New Photopost</a>
            	{!!Form::open(['route'=>'admin.photoposts.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
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
						@foreach($photoposts as $photopost)
							<tr>
								<td>{{$photopost->id}}</td>
								<td>{{$photopost->title}}</td>
								<td>{{$photopost->category->name}}</td>
								<td>{{$photopost->user->name}}</td>
								<td>
									@if($photopost->status == 'approved')
									<a href="#" onclick="return confirm('This posts is already approved.');" class="btn btn-success" disabled="disabled">Approve</a>
									@else
										<a href="{{route('admin.photoposts.approve',$photopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-success">Approve</a>	
									@endif
									@if($photopost->status == 'suspended')
									<a href="{{route('admin.photoposts.suspend',$photopost->id)}}" onclick="return confirm('This posts is already suspended.');" disabled="disabled" class="btn btn-primary">Suspend</a>
									@else									
									<a href="{{route('admin.photoposts.suspend',$photopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-primary">Suspend</a>
									@endif
									<a href="{{route('admin.photoposts.edit',$photopost->id)}}" class="btn btn-warning">Edit</a>
								   <a href="{{route('admin.photoposts.destroy',$photopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $photoposts->render() !!}
				</div>
				
            </div>
        </div>
        <!-- /.row -->
@endsection
@section('js')
@endsection