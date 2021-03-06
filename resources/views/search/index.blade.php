@extends('layouts.main')

@section('title',$count." results found for ". $query. ' | '. env('APP_NAME') )
@section('description',$count." results found for ". $query)
@section('css')
<style>
  .listfeaturedtag h4.card-text, .listrecent h4.card-text {
    color: rgba(0,0,0,.44);
    font-size: 0.95rem;
    line-height: 1.4;
    font-weight: 400;
}
.alert-primary {
    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
}
.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style>
@endsection


@section('content')

<div class="section-title">
	<h2><span class="title">{{$count." results found for ". $query}}</span> </h2>
</div>

<div class="row listrecent">

@foreach($result as $post)
<div class="col-md-4 grid-item d-flex align-items-stretch">
      <div class="card post tag-getting-started" >
      <a href="{{$post->link}}">
        <span class="wrapmaxheight">
            <img class="img-fluid img-thumb" src="{{$post->featuredMedia('medium')}}" style="height:250px; object-fit:cover; width:100%;">
        </span>
      
      </a>
      <div class="card-block card-body d-flex flex-column">
        <h2 class="card-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
        <h4 class="card-text">{{trucnateStringh($post->body)}}</h4>
        <div class="metafooter mt-auto">
          <div class="wrapfooter">
            <a class="meta-footer-thumb" href="{{$post->user->link}}">
                  <img class="author-thumb" src="{{$post->user->dp}}" alt="{{$post->user->name}}}" />
            </a>
            <span class="author-meta">
            <span class="post-name">
              <a href=""><a href="{{$post->user->link}}">{{$post->user->name}}</a></a></span><br/>
            <span class="post-date">
              <time class="post-date" datetime="{{$post->created_at}}"> {{$post->created_at->diffForHumans()}}  </time> 
            </span>
            <span class="dot">
              
            </span>
              <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>

            </span>
         
          </div>
        </div>
      </div>
    </div>
</div>

@endforeach

			
</div>

<div class="clearfix"></div>
@if($result->isEmpty())
<div class="row">
	
<div class="alert alert-primary mx-auto">
		Sorry we can't find result of your desired query instead you can look into our popular posts
</div>

</div>
<div class="row listrecent">
	
	@foreach(\App\Post::popular(9)->get() as $post)


		<div class="col-md-4 grid-item d-flex align-items-stretch">
	      	<div class="card post tag-getting-started" >
		      <a href="{{$post->link}}">
		        <span class="wrapmaxheight">
		            <img class="img-fluid img-thumb" src="{{$post->featuredMedia('medium')}}" style="height:250px; object-fit:cover; width:100%;">
		        </span>
		      
		      </a>
		      <div class="card-block card-body d-flex flex-column">
		        <h2 class="card-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
		        <h4 class="card-text">{{trucnateStringh($post->body)}}</h4>
		        <div class="metafooter mt-auto">
		          <div class="wrapfooter">
		            <a class="meta-footer-thumb" href="{{$post->user->link}}">
		                  <img class="author-thumb" src="{{$post->user->dp}}" alt="{{$post->user->name}}}" />
		            </a>
		            <span class="author-meta">
		            <span class="post-name">
		              <a href=""><a href="{{$post->user->link}}">{{$post->user->name}}</a></a></span><br/>
		            <span class="post-date">
		              <time class="post-date" datetime="{{$post->created_at}}"> {{$post->created_at->diffForHumans()}}  </time> 
		            </span>
		            <span class="dot">
		              
		            </span>
		              <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>

		            </span>
		         
		          </div>
		        </div>
		      </div>
	    	</div>
		</div>



	@endforeach
</div>

@endif




	



@endsection

