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
				All Posts
		  </div>
		  <div class="card-body">
		  	<div class="container">
		  		<div class="col-md-2 col-xs-12 offset-md-10 hidden-md">
		  		
                    <a class="btn btn-primary" style="margin-bottom:10px; color:#fff !important;" href="{{url('/create-post')}}">Create A Post</a>
		  		</div>
				  <table id="table_id" class="display">
				    <thead>
				        <tr>
				            <th>Title</th>
				            <th>Category</th>
				            <th>Approved</th>
				            <th>Status</th>
				            <th>Date</th>
				            <th>Edit</th>
				            <th>Trash</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@foreach($posts as $post)
				        <tr>

                            <td><a href="{{$post->link}}">{{trucnateStringh(title_case($post->title),40)}}</a></td>
				            <td>{{isset($post->category->id) ? $post->category->name : "Uncategorized"}}</td>
				        	<td>{{($post->confirmed==1) ? "Yes" : "No"}}</td>
			             	<td>{{$post->status}}</td>
			             	<td>{{$post->created_at->diffForHumans()}}</td>
			                <td>
			                	<a href="/edit-post/{{$post->id}}">
			                		<button type="button" class="btn btn-primary">Edit</button>
			                	</a>
		                	</td>
			                <td>	
			                	<a href="/delete-post/{{$post->id}}">
			                		<button type="button" class="btn btn-danger">Trash</button>
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
    jQuery('#table_id').DataTable({
        "order": [[ 3, "desc" ]]
    });
} );
</script>

@endsection