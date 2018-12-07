@extends('layouts.main')


@section('css')

    <style>

.help-block > strong{ color:red; text-align:left; }
        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }


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
    </style>

@endsection




@section('content')

<div class="col-md-12">
  
</div>
<div class="card text-center">
          <div class="card-header">
            Create Post
          </div>
          <div class="card-body">
            <div class="container">

              @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
              @endif
           <form class="form-horizontal" method="POST" action="{{ action('PostController@store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                       <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                      
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                      </div>
                        
                </div>




                 <div class="form-group row">

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-md-10">
                        <div id="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />

                        </div>

                         @if ($errors->has('image'))
                            <span class="help-block text-center">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif

                    </div>


                      

                    </div>
                
                  <div class="form-group row">

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                        <div  class="{{(auth()->user()->isAdmin==1) ? 'col-md-8' : 'col-md-10' }}">
                          <select name="category" class="form-control">
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>

                          @if ($errors->has('category'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                          @endif
                        
                        </div>
                        @if(auth()->user()->isAdmin==1)
                        <div class="col-md-2">
                          <a href="/create-category" id="create_cat" class="btn btn-primary" >Create Category</a>
                        </div>
                        @endif

                    </div>


                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Body</label>

                            <div class="col-md-10">
                                <textarea name="body" id="body" style="height:600px;">{!! old('body') !!}</textarea>

                              @if ($errors->has('body'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('body') }}</strong>
                                  </span>
                              @endif
                              
                            </div>
                        </div>

                       

                   <div class="form-group row">
                      <div class="offset-sm-2 col-sm-9">
                        <button type="submit" class="btn btn-primary ">Create Post</button>
                      </div>
                    </div>
                    </form>
            </div>
          </div>
        
    </div>

@endsection


@section('footer')
<script type="text/javascript" src="{{asset('js/image-preview.js')}}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
jQuery(document).ready(function() {

// $("#addCategory").click(function(){
//   var categoryName = $("#catName").val();
//   var isPublished = $("#isPublished").val();
//   var _token = '{{csrf_token()}}';

//     $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//   });

//    $.ajax({
//              type:'POST',
//              url:'/post-category',
//              dataType: 'JSON', 
//              data:"{'_token':'" + _token+ "', 'name':'" + categoryName+ "', 'published':'" + isPublished+ "'}",
//              success:function(data){
//                 $("#msg").html(data.msg);
//              }
//           });

// })
  
 
 CKEDITOR.replace('body', {
      customConfig : 'config.js' ,  
      filebrowserUploadUrl: '{{ route('upload-image',['_token' => csrf_token() ]) }}',
      height: 700 
});


  jQuery.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

</script>


@endsection
