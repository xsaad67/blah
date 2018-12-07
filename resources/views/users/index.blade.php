@extends('layouts.main')

@section('css')
<style>
  .listfeaturedtag h4.card-text, .listrecent h4.card-text {
    color: rgba(0,0,0,.44);
    font-size: 0.95rem;
    line-height: 1.4;
    font-weight: 400;
}
</style>
@endsection


@section('content')
        
<div class="mainheading  homecover "  style="background-image:url({{ is_null($user->image) ? ("wp-content/uploads/categories/".$user->image) : asset("wp-content/uploads/categories/default.jpg")}});" >
			<div class="row post-top-meta authorpage">
  				<div class="col-md-10 col-xs-12">
              <h1 class="text-center">{{$user->name}}</h1>
  				</div>
  			
			</div>
</div>


<section class="recent-posts">
	<div class="section-title">
		<h2><span class="title">{{$user->name}}'s Stories</span> 

 <div class="clearfix"></div>                                                                                                         
</div>
	<div class="masonrygrid row listrecent">

@foreach($user->posts as $post)
<div class="col-md-4 grid-item">
      <div class="card post tag-getting-started">
      <a href="/">
        <span class="wrapmaxheight">
            <img class="img-fluid img-thumb" src="">
        </span>
      
      </a>
      <div class="card-block">
        <h2 class="card-title"><a href="">{{$post->title}}</a></h2>
        <h4 class="card-text">{{trucnateStringh($post->body)}}</h4>
        <div class="metafooter">
          <div class="wrapfooter">
            <span class="meta-footer-thumb">
                  <img class="author-thumb" src="{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image)  }}" alt="{{$post->user->name}}}" />
            </span>
            <span class="author-meta">
            <span class="post-name">
              <a href=""><a href="index.html">{{$post->user->name}}</a></a></span><br/>
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

@endsection


