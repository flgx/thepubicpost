@extends('layouts.admin')
@section('title')
    Edit Post
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['route' => ['admin.posts.update',$post->id],'method' => 'PUT','files'=>'true']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title', $post->title,['class'=> 'form-control','placeholder'=>'Type a title','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', $categories,$post->category->id,['class'=> 'form-control select-category','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content','Content') !!}
                        {!! Form::textarea('content', $post->content,['class' => 'textarea-content','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('featured_text','Featured Text') !!}
                        {!! Form::textarea('featured_text', $post->featured_text,['class' => 'textarea-content form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags','Tags') !!}
                        {!! Form::select('tags[]', $tags,$myTags,['class'=> 'form-control select-tag','multiple','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
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
