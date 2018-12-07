@extends('layouts.main')

@section('content')

@section('css')
<style>
        #image-preview {
          width: 100%;
          height: 200px;
          position: relative;
          overflow: hidden;
          background-color: #dadada;
          color: #ecf0f1;
        }
        #image-preview input {
          line-height: 200px;
          font-size: 200px;
          position: absolute;
          opacity: 0;
          z-index: 10;
        }
        #image-preview label {
          position: absolute;
          z-index: 5;
          opacity: 0.8;
          cursor: pointer;
          background-color: #bdc3c7;
          width: 200px;
          height: 50px;
          font-size: 20px;
          line-height: 50px;
          text-transform: uppercase;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          margin: auto;
          text-align: center;
        }

        .yes-image{
            background:url({{asset("wp-content/uploads/".$post->featuredImage)}});
            background-size: cover;
            background-position: center center;
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #dadada;
            color: #ecf0f1;
        }
    </style>
@endsection
<div class="container">


   <div class="card text-center">
          <div class="card-header">
           Edit Post
          </div>
         <div class="card-body">
            <div class="container">
                <br>
                  @if(auth()->user()->isAdmin==1)
                  <p class="text-center">This post is posted by <b>{{$post->user->name}}</b> at {{$post->created_at->diffForHumans()}}</p>
                @endif
                    @include('messages.message')

                    <form class="form-horizontal" method="POST" action="{{ action('PostController@update',['post' => $post->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="inputEmail3" value="{{ $post->title }}"  placeholder="Post Title">
                      </div>
                </div>

               <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="category">
                            <option value="">Please select a category</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}" {{ ($category->id == $post->category_id) ? "selected" : ""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>


                 <div class="form-group row">

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image </label>
                        <div id="image-preview" class='col-md-10 {{is_null($post->featuredImage) ? "" : "yes-image" }} '>
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="featured" id="image-upload" />
                        </div>

                    </div>
                    
                    
                     @if(auth()->user()->isAdmin==1)

                    <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="metaTitle" id="inputEmail3" value="{{ $post->metaTitle }}"  placeholder="Meta Title (If not provided post title will be selected)">
                          </div>
                    </div>


                    <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="metaDescription" id="inputEmail3" value="{{ $post->metaDescription }}"  placeholder="Meta Description(If not provided the first paragraph of Description will be selected)">
                          </div>
                    </div>


                    <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Keywords</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="metaKeywords" id="inputEmail3" value="{{ $post->metaKeywords }}"  placeholder="Meta Keywords comma seprated values(If not provided no meta keyword tag will be included)">
                          </div>
                    </div>

                  @endif
            

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Body </label>

                    <div class="col-md-10">
                        <textarea name="body" id="body">{!! $post->body !!}</textarea>
                    </div>
                    </div>

                       

                        <div class="form-group row">
                            <div class="col-md-6 offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection


@section('footer')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{asset('js/image-preview.js')}}"></script>
<script>
     
 CKEDITOR.replace('body', {
      customConfig : 'config.js' ,  
      filebrowserUploadUrl: '{{ route('upload-image',['_token' => csrf_token() ]) }}',
      height: 700 
});
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
  
  jQuery.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});
</script>

@endsection
