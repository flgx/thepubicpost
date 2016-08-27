@extends('layouts.admin')
@section('title')
    All Users
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12 col-md-6">
            	<a href="{{ route('admin.users.create')}}" class="btn btn-info"> Create New User</a>
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>E-mail</th>
						<th>Type</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{$user->id}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									@if($user->type == "admin")

										<span class="label label-danger">Administrator</span>
									@else
										<span class="label label-primary">Member</span>								
									@endif
								</td>
								<td><a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning">Edit</a> <a href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a> </td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $users->render() !!}
            </div>
        </div>
        <!-- /.row -->
@endsection