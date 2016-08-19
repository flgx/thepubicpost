h@extends('layouts.admin')
@section('title')
    New Photo Post
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-md-6">
            	{!! Form::open(['route' => 'admin.photoposts.store','method' => 'POST','files'=>'true']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title', null,['class'=> 'form-control','placeholder'=>'Type a title','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', $categories,null,['class'=> 'form-control select-category','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content','Content') !!}
                        {!! Form::textarea('content', null,['class' => 'textarea-content form-control','required']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('featured','Featured') !!}
                        {!! Form::checkbox('featured',null,false,['class' => 'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('tags','Tags') !!}
                        {!! Form::select('tags[]', $tags,null,['class'=> 'form-control select-tag','multiple','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image','Image') !!}
                        {!! Form::file('image',null,['class'=> 'form-control','required']) !!}
                    </div>

            		<div class="form-group">
            			{!! Form::submit('Add Photo Post',['class'=>'btn btn-primary']) !!}
            		</div>

            	{!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->


@endsection

@section('js')
    <script>
        $(".select-tag").chosen({
            placeholder_text_multiple: "Select your tags"
        });
        $(".select-category").chosen({
            placeholder_text_single: "Select a category"
        });

        $('.textarea-content').trumbowyg({
            
        });
    </script>
@endsection
