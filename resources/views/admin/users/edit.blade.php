@extends('admin.layout.main')
@section('title','Edit User: '. $user->name)

@section('content')
        <div class="row">
            <div class="col-lg-3 col-md-6">
            	{!! Form::open(['route' => ['admin.users.update',$user->id],'method' => 'PUT']) !!}

            		<div class="form-group">
            			{!! Form::label('name','Name') !!}
            			{!! Form::text('name', $user->name,['class'=> 'form-control','placeholder'=>'Type a name','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('email','E-mail') !!}
            			{!! Form::email('email', $user->email,['class'=> 'form-control','placeholder'=>'youremail@gmail.com','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('password','Password') !!}
            			{!! Form::password('password',['class'=> 'form-control','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('type','User Type') !!}
            			{!! Form::select('type',[''=>'Select type of user','member'=> 'Member','admin' => 'Administrator'],$user->type,['class'=> 'form-control','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::submit('Edit User',['class'=>'btn btn-primary']) !!}
            		</div>

            	{!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->


@endsection