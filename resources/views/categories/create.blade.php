@extends('layouts.main')



@section('css')

	<style>
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
	
	<div class="card text-center">
		  <div class="card-header">
		    Create Category
		  </div>
		  <div class="card-body">
		  	<div class="container">

				  <form method = "POST" action="{{ action('CategoryController@store') }}" enctype="multipart/form-data">
				  	{{ csrf_field() }}
				    <div class="form-group row">
				      <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
				      <div class="col-sm-10">
				        <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Category Name">
				      </div>
				    </div>

				    <div class="form-group row">
				      <label for="inputPassword3" class="col-sm-2 col-form-label">Published</label>
				      <div class="col-sm-10">
				       <select name = "published" class="form-control">
				       		<option value="1">Pubished</option>
				       		<option value="0">Not Published</option>
				       </select>
				      </div>
				    </div>

					
				    <div class="form-group row">

    		      	<label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
				    	<div id="image-preview" class="col-md-10">
						  <label for="image-upload" id="image-label">Choose File</label>
						  <input type="file" name="image" id="image-upload" />
						</div>
				    </div>

				    <div class="form-group row">
				      <div class="offset-sm-2 col-sm-9">
				        <button type="submit" class="btn btn-primary btn-lg">Create Category</button>
				      </div>
				    </div>
				  </form>
			</div>
		  </div>
		
	</div>

@endsection


@section("footer")
	<script type="text/javascript" src="http://opoloo.github.io/jquery_upload_preview/assets/js/jquery.uploadPreview.js"></script>
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