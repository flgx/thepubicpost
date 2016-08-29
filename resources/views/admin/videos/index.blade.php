@extends('layouts.admin')
@section('title','My VideoPosts')

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.videoposts.create')}}" class="btn btn-info"> Create New VideoPost</a>
            	{!!Form::open(['route'=>'admin.videoposts.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
            		<div class="input-group">
            			{!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Search VideoPost','aria-describedby'=>'search'])!!}
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
						@foreach($videoposts as $videopost)
							<tr>
								<td>{{$videopost->id}}</td>
								<td>{{$videopost->title}}</td>
								<td>{{$videopost->category->name}}</td>
								<td>{{$videopost->user->name}}</td>
								<td>
									@if($videopost->status == 'approved' && Auth::user()->type=='admin')
									<a href="#" onclick="return confirm('This posts is already approved.');" class="btn btn-success" disabled="disabled">Approve</a>
									@elseif(Auth::user()->type == 'admin')
										<a href="{{route('admin.videoposts.approve',$videopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-success">Approve</a>
									@endif
									@if($videopost->status == 'suspended' && Auth::user()->type=='admin')
									<a href="{{route('admin.videoposts.suspend',$videopost->id)}}" onclick="return confirm('This posts is already suspended.');" disabled="disabled" class="btn btn-primary">Suspend</a>
									@elseif(Auth::user()->type == 'admin')									
									<a href="{{route('admin.videoposts.suspend',$videopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-primary">Suspend</a>
									@endif
									<a href="{{route('admin.videoposts.edit',$videopost->id)}}" class="btn btn-warning">Edit</a>
								   <a href="{{route('admin.videoposts.destroy',$videopost->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $videoposts->render() !!}
				</div>
				
            </div>
        </div>
        <!-- /.row -->
@endsection
@section('js')
@endsection