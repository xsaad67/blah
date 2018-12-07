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

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

@endsection

@section('content')
	
	<div class="card text-center">
		  <div class="card-header">
				All Categories
		  </div>
		  <div class="card-body">
		  	<div class="container">

				  <table id="table_id" class="display">
				    <thead>
				        <tr>
				            <th>Category # Id</th>
				            <th>Name</th>
				            <th>Status</th>
				            <th>Created</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($categories as $category)
				        <tr>
				            <td>{{$category->id}}</td>
				            <td>{{title_case($category->name)}}</td>
			             	<td>{{($category->published==0) ? "Not Published" : "Published" }}</td>
			             	<td>{{$category->created_at->diffForHumans()}}</td>
			                <td>
			                	<a href="/edit-category/{{$category->id}}">
			                		<button type="button" class="btn btn-primary">Edit</button>
			                	</a>
			                	<a href="/delete-category/{{$category->id}}">
			                		<button type="button" class="btn btn-danger">Delete</button>
			                	</a>
			                </td>
				        </tr>
				        @endforeach
				       
				    </tbody>
				</table>

			</div>
		  </div>
		
	</div>

@endsection


@section("footer")
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
jQuery(document).ready( function () {
    jQuery('#table_id').DataTable();
} );
</script>

@endsection