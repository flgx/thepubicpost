@extends('layouts.admin')
@section('title')
    Edit Ebook
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['route' => ['admin.ebooks.update',$ebook->id],'method' => 'PUT','files'=>'true']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title', $ebook->title,['class'=> 'form-control','placeholder'=>'Type a title','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', $categories,$ebook->category->id,['class'=> 'form-control select-category','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content','Content') !!}
                        {!! Form::textarea('content', $ebook->content,['class' => 'textarea-content','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('featured','Mark as Featured') !!}
                        @if($ebook->featured == 'true')
                        {{ Form::checkbox('featured', 'true',true) }}
                        @else
                        {{ Form::checkbox('featured', 'true',false) }}
                        @endif      
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags','Tags') !!}
                        {!! Form::select('tags[]', $tags,$myTags,['class'=> 'form-control select-tag','multiple','required']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('images','Images') !!}
                        {!! Form::file('images',null,['class'=> 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Edit Ebook',['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            
            <!-- Ebook Images -->
            <div class="col-md-6">
                <h1>Images</h1>
                <hr>
                @if(count($ebook->images) > 0)  
                    <?php
                        $i=0;
                    ?>
                    @foreach($ebook->images as $image)
                    <div class="col-xs-12">
                        <img src="{{asset('img/ebooks/thumbs').'/thumb_'.$image->name, '$ebook->title'}}" alt="The Public Ebook {{$ebook->title}}">
                        <p class="col-xs-12" style="padding-left:0px; margin-top:10px;">
                            <a href="#" class="btn-delete btn btn-danger"  data-ebook="{{$image->id}}"><i class="fa fa-trash fa-2x"></i></a>
                        </p>
                    </div>
                    <hr>
                    @endforeach
                @else
                    <p>Not images found. Please add a new image.</p>  
                @endif      
            </div>
        </div>
        <!-- /.row -->
        </div>
        <!-- /.row -->


@endsection

@section('js')
    <script>
    $('.btn-delete').on('click', function(e) {
        var myThis = $(this).parent().parent();
        var dataId = $(this).data('ebook');

        $.ajax({
            url: '{{ url('/admin/images/destroyImage') }}' + '/' + dataId,
            type: 'DELETE',
            data:{_token:token,id:dataId},
            success: function(msg) {
                console.log(msg['msg']);
                
                $(myThis).fadeOut(150);
            }
        });
    });
    </script>
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
