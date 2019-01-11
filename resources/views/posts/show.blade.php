@extends('layouts.main')
@section('title', (is_null($post->metaTitle) || empty($post->metaTitle)) ? $post->title : $post->metaTitle)
@section('description',(is_null($post->metaDescription) || empty($post->metaDescription)) ? trucnateStringh(dom_content($post->body),180,null) : $post->metaDescription)

@section('css')
{{--   <link rel='stylesheet' id='claps-applause-css' href='../wp-content/plugins/wp-claps-applause/css/claps-applause6959.css?ver=4.9.3' type='text/css' media='all' /> --}}
@if(!empty($post->metaKeywords))
    <meta name="keywords" content="$post->metaKeywords">
@endif

<meta property="og:title" content="{{$post->title}}" />
<meta property="og:url" content="{{env('APP_URL')}}/{{$post->slug }}" />
<meta property="og:image" content="{{ asset('wp-content/uploads/'.$post->featuredImage)  }}" />
<style>
.article-post{
    font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important;
}
.article-post >p > img{
    max-width: 100% !important;
    height: auto !important;
}
</style>
@endsection

@section('content')

	          <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                   
                            <div class="share hidden-xs-down">
                             
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
                                <a href="https://www.essaymaster.co.uk">
                                    <img src="https://www.essaymaster.co.uk/images/banner-3.jpg" class="img-fluid" style="width: 60%;">
                                </a>
                                
                                 {{--<a target="_blank"  href="https://www.amazon.com/Premium-Leather-Garments-Guardians-Galaxy/dp/B06Y3KYN11/ref=as_sl_pc_tf_til?tag=snblog-20&linkCode=w00&linkId=d82b5a56b34f970222acc30c55ec183d&creativeASIN=B06Y3KYN11">
                                    <img border="0" src="https://images-na.ssl-images-amazon.com/images/I/91ARuci152L._UX679_.jpg" class="mx-auto d-block img-fluid" style="max-width:20%;" >
                                    <img src="https://static1.squarespace.com/static/56441280e4b0c680c29dabff/t/5ada5d15352f53e7464346d2/1524260127623/Buy+Now+on+Amazon+Button.png" class="mx-auto d-block img-fluid" style="max-width:60%;">
                                </a>--}}
                        </div>
                             
                    </div>
                    <div class="col-lg-9  col-md-9 col-xs-12 post-161 post type-post status-publish format-standard has-post-thumbnail hentry category-social" id="post-161">
                        <div class="mainheading">
                            <!-- Begin Author box -->
                            <div class="row post-top-meta hidden-md-down">
                                <div class="col-md-2 col-xs-12">
                                    <a href="">
                                        <img alt='' src='' srcset='{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image) }}' class='avatar avatar-72 photo imgavt' height='72' width='72' /> 
                                    </a>       
                                </div>
                                <div class="col-md-10 col-xs-12">
                                    <a class="text-capitalize link-dark" href="{{$post->user->link}}">
                                        {{ $post->user->name }}
                                   
                                    </a>
                                        <span class="author-description d-block">
                                           {{trucnateStringh($post->user->bio,120)}}
                                        </span>
                                    </div>
                                </div>
                                
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                
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
                                <img src="{{ asset('wp-content/uploads/'.$post->featuredImage)  }}" width="1400" height="400" class="featured-image img-fluid wp-post-image" alt="{{$post->title}}"  > 
                            

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
                           
                               
                          
                            </div>




  
@endsection

@section('postcontent')


<div class="graybg">
    <div class="container">
        <div class="row justify-content-center listrecent listrelated">

            @foreach($lastRows as $row)

            <div class="col-lg-4 col-md-4 col-sm-4">

                <div class="card post height262">
                   
                    <a class="thumbimage" href="{{$row->link}}" style="background-image:url({{$row->featuredMedia('medium')}});">
                        
                    </a>
                    <div class="card-block">
                        <h2 class="card-title">
                            <a href="{{$row->link}}">{{$row->title}}</a>
                        </h2>
                        <div class="metafooter">
                            <div class="wrapfooter">
                                <span class="meta-footer-thumb"> 
                                <a href="{{$row->user->link}}">
                                 <img alt="" src="{{is_null($row->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$row->user->image) }}" height="40" width="40"></a>
                                </span>
                                <span class="author-meta"> 
                    <span class="post-name">
                    <a href="{{$row->user->link}}">{{$row->user->name}}</a></span>
                                <br>
                                <span class="post-date">{{$row->created_at->diffForHumans()}}</span>
                                </span>
                                <span class="post-read-more">
                    <a href="{{$row->link}}" title="">
                   
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