@extends('layouts.main')
@section('title', (is_null($post->metaTitle) || empty($post->metaTitle)) ? $post->title : $post->metaTitle)
@section('description',(is_null($post->metaDescription) || empty($post->metaDescription)) ? trucnateStringh(dom_content($post->body),180,null) : $post->metaDescription)

@section('css')
{{--   <link rel='stylesheet' id='claps-applause-css' href='../wp-content/plugins/wp-claps-applause/css/claps-applause6959.css?ver=4.9.3' type='text/css' media='all' /> --}}
@if(!empty($post->metaKeywords))
    <meta name="keywords" content="$post->metaKeywords">
@endif
<style>
.article-post{
    font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important;
}
</style>
@endsection

@section('content')

	          <div class="row">
                    <div class="col-lg-2 col-md-2 col-xs-12">
                            <div class="share hidden-xs-down">
                               {{--  <div class="sidebarapplause">
                                    <div id="pt-claps-applause-161" class="pt-claps-applause">
                                        <a class="claps-button" id="clap-button" href="" ></a>
                                        <span id="claps-count-161" class="claps-count">{{$clapCount}}
                                        </span>
                                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="1f8e56a693" />
                                        <input type="hidden" name="_wp_http_referer" value="/demo-mediumish/10-steps-to-help-older-adults-prevent-slips-trips-and-falls/"
                                    />
                                </div>
                                </div> --}}
                                <p class="sharecolour">
                                Share </p>
                                <ul class="shareitnow">
                                    <li>
                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Great Read From {{env('APP_NAME')}} {{$post->title}}&amp;url={{env('APP_URL')}}/{{$post->slug }}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?{{env('APP_URL')}}/{{$post->slug }}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://plus.google.com/share?url={{env('APP_URL')}}/{{$post->slug }}">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="sep"></div>
                                <div class="hidden-xs-down">
                                  
                                    <ul>
                                        <li>
                                            <a href="#disqus_thread">
                                            <svg class="svgIcon-use" width="29" height="29" viewBox="0 0 29 29"><path d="M21.27 20.058c1.89-1.826 2.754-4.17 2.754-6.674C24.024 8.21 19.67 4 14.1 4 8.53 4 4 8.21 4 13.384c0 5.175 4.53 9.385 10.1 9.385 1.007 0 2-.14 2.95-.41.285.25.592.49.918.7 1.306.87 2.716 1.31 4.19 1.31.276-.01.494-.14.6-.36a.625.625 0 0 0-.052-.65c-.61-.84-1.042-1.71-1.282-2.58a5.417 5.417 0 0 1-.154-.75zm-3.85 1.324l-.083-.28-.388.12a9.72 9.72 0 0 1-2.85.424c-4.96 0-8.99-3.706-8.99-8.262 0-4.556 4.03-8.263 8.99-8.263 4.95 0 8.77 3.71 8.77 8.27 0 2.25-.75 4.35-2.5 5.92l-.24.21v.32c0 .07 0 .19.02.37.03.29.1.6.19.92.19.7.49 1.4.89 2.08-.93-.14-1.83-.49-2.67-1.06-.34-.22-.88-.48-1.16-.74z"></path></svg>
                                        </a>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2 col-md-10 col-xs-12 post-161 post type-post status-publish format-standard has-post-thumbnail hentry category-social" id="post-161">
                        <div class="mainheading">
                            <!-- Begin Author box -->
                            <div class="row post-top-meta hidden-md-down">
                                <div class="col-md-2 col-xs-12">
                                    <a href="">
                                        <img alt='' src='' srcset='{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image) }}' class='avatar avatar-72 photo imgavt' height='72' width='72' /> 
                                    </a>       
                                </div>
                                <div class="col-md-10 col-xs-12">
                                    <a class="text-capitalize link-dark" href="../author/sununderthesky/index.html">
                                        {{ $post->user->name }}
                                   
                                    </a>
                                        <span class="author-description d-block">
                                           {{trucnateStringh($post->user->bio,120)}}
                                        </span>
                                    </div>
                                </div>
                                <h1 class="posttitle">{{ ucfirst($post->title) }}</h1>
                                <p>
                                    <span class="post-date">
                                        <time class="post-date">{{ $post->created_at->diffForHumans() }}</time>
                                    </span>
                                    <span class="dot"></span>
                                    <span class="readingtime">{{$wordToRead}} {{str_plural('minute',$wordToRead)}} to read</span>
                                    <span class="dot"></span>
                                    <a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a>
                                </p>
                            </div>
                            @foreach($medias as $media)
                            @if($media->fileType == 'featured')
                                <img src="{{ asset('wp-content/uploads/'.$media->fileName)  }}" width="1400" height="700" class="featured-image img-fluid wp-post-image" alt="{{$post->title}}"  > 
                            
                            @endif
                            @endforeach

                            <article class="article-post">
                              {!! clean($post->body) !!}
                            </article>
                            <div class="hidden-lg-up">
                                <div id="pt-claps-applause-161" class="pt-claps-applause">
                                    <a class="claps-button" href="index.html" data-id="161"></a>
                                    <span id="claps-count-161" class="claps-count">6</span><input type="hidden" id="_wpnonce" name="_wpnonce" value="1f8e56a693" /><input type="hidden" name="_wp_http_referer" value="/demo-mediumish/10-steps-to-help-older-adults-prevent-slips-trips-and-falls/"
                                /></div>
                            </div>
                            <div class="hidden-lg-up share-horizontal">
                                <p>
                                Share </p>
                                <ul class="shareitnow">
                                    <li>
                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=10%20Steps%20to%20Help%20Older%20Adults%20Prevent%20Slips,%20Trips%20and%20Falls&amp;url=http%3A%2F%2Fwww.themepush.com%2Fdemo-mediumish%2F10-steps-to-help-older-adults-prevent-slips-trips-and-falls%2F">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.themepush.com%2Fdemo-mediumish%2F10-steps-to-help-older-adults-prevent-slips-trips-and-falls%2F">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://plus.google.com/share?url=http%3A%2F%2Fwww.themepush.com%2Fdemo-mediumish%2F10-steps-to-help-older-adults-prevent-slips-trips-and-falls%2F">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <!-- Begin Author box -->
                            <div class="row post-top-meta hidden-lg-up">
                                <div class="col-md-2 col-xs-4">
                                    <img alt='' src='http://0.gravatar.com/avatar/90408213f8c17bc123fe0dc82f171579?s=72&amp;d=Sun%20Sky&amp;r=g' srcset='http://0.gravatar.com/avatar/90408213f8c17bc123fe0dc82f171579?s=144&#038;d=Sun%20Sky&#038;r=g 2x' class='avatar avatar-72 photo' height='72'
                                width='72' /> </div>
                                <div class="col-md-10 col-xs-8">
                                    <a class="text-capitalize link-dark" href="../author/sununderthesky/index.html">
                                        Sun Sky <span class="btn follow">Follow</span></a>
                                        <span class="author-description d-block">I am Sun Sky, a fake author at this website which is actually a preview for Mediumish theme. Mediumish is a very nice and modern Medium styled theme, hope you like it!</span>
                                    </div>
                                </div>
                                <div class="after-post-tags">
                                  
                                </div>
                          
                            </div>




  
@endsection

@section('postcontent')


<div class="graybg">
    <div class="container">
        <div class="row justify-content-center listrecent listrelated">

            @foreach($lastRows as $row)

            <div class="col-lg-4 col-md-4 col-sm-4">

                <div class="card post height262">
                    @foreach($row->medias as $media)
                        @if($media->fileType == 'featured')
                            @php $lastRowImage = asset('wp-content/uploads/'.$media->fileName); @endphp 
                        @endif
                    @endforeach
                    <a class="thumbimage" href="/{{$row->category->slug}}/{{$row->slug}}" style="background-image:url({{$lastRowImage}});">
                        
                    </a>
                    <div class="card-block">
                        <h2 class="card-title">
                            <a href="/{{$row->category->slug}}/{{$row->slug}}">{{$row->title}}</a>
                        </h2>
                        <div class="metafooter">
                            <div class="wrapfooter">
                                <span class="meta-footer-thumb"> 
                                <a href="https://www.themepush.com/demo-mediumish/author/nickname/">
                                 <img alt="" src="{{is_null($row->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/row/".$row->user->image)  }}" height="40" width="40"></a>
                                </span>
                                <span class="author-meta"> 
                    <span class="post-name">
                    <a href="/author/{{$row->user->slug}}">{{$row->user->name}}</a></span>
                                <br>
                                <span class="post-date">{{$row->created_at->diffForHumans()}}</span>
                                </span>
                                <span class="post-read-more">
                    <a href="/{{$row->category->slug}}/{{$row->slug}}" title="">
                   
                    </a>
                </span> </div>
                        </div>
                    </div>
                </div>

            </div>

            @endforeach
            
            
            
        </div>
        <div class="clearfix"></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="comments" class="comments-area">

                      <div id="disqus_thread"></div>

                </div>
                <!-- #comments -->
            </div>
        </div>
    </div>
</div>
	
       

                                    
                                           
@endsection

@section('footer')

<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://redbirdsources-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script>
jQuery(document).ready(function(){
jQuery('#clap-button').click(function(e) {
     e.preventDefault();
    // post_id = {{ $post->id }};
    // user_id= 1;

    jQuery.ajax({
          type: "POST",
          url: '/clap.html',
          data: {
            '_token': jQuery('meta[name=csrf-token]').attr('content'),
            post_id: {{ $post->id }},
            data2:  1,
          },
          success: function(html){
            console.log(html);
          }
    });
    
});

});
</script>


@endsection