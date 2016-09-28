@extends('layouts.admin')
@section('title')
    New Ebook
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-md-6">           
                
                @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>                               
                    @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open(['route' => 'admin.ebooks.store','method' => 'POST','files'=>'true']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title', null,['class'=> 'form-control','placeholder'=>'Type a title','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', $categories,null,['class'=> 'form-control select-category','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title','Wich type of Ebook you want to upload?') !!}
                        <br>
                        <div class="btn btn-danger pdf">URL PDF</div>
                        <div class="btn btn-success normal">Normal PDF</div>
                    </div>

                    <div class="form-group ebooklink">
                        {!! Form::label('ebook_link','Copy and Paste Your Ebook Url') !!}

                        
                        {!! Form::text('ebook_link', null,['class'=> 'form-control','placeholder'=>'Copy and Paste Your Ebook Url']) !!}
                    </div>
                    <div class="form-group ebooknormal">
                        {!! Form::label('images','Upload your PDF FILE') !!}

                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                        <br>
                    </div>

                    <div class="form-group">
                        {!! Form::label('content','Content') !!}
                        {!! Form::textarea('content', null,['class' => 'textarea-content form-control','required']) !!}
                    </div>
                    
                    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'editor')
                    <div class="form-group">
                        {!! Form::label('featured','Mark as Featured') !!}                        
                        {{ Form::checkbox('featured', 'true') }}                         
                    </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('tags','Tags') !!}
                        {!! Form::select('tags[]', $tags,null,['class'=> 'form-control select-tag','multiple','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Add Ebook',['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->


@endsection

@section('js')
    <script>
        $('.ebooknormal').hide();
        $('.ebooklink').hide();

        $('.pdf').on('click',function(e){
            $('.ebooklink').fadeIn();
            $('.ebooknormal').hide();
        });
        $('.normal').on('click',function(e){
            $('.ebooknormal').fadeIn();
            $('.ebooklink').hide();
        });
        $('.textarea-content').trumbowyg({
            
        });
        $(".select-tag").chosen({
            placeholder_text_multiple: "Select your tags"
        });
        $(".select-category").chosen({
            placeholder_text_single: "Select a category"
        });
    </script>
@endsection
