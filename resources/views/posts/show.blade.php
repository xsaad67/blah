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
        <div class="col-lg-2 col-md-3 col-xs-12">
            <div style="margin-top:45px;">
                @foreach($popularLists as $key=>$popular)
                    <div class="list-box" style="margin-bottom:25px;">
                        <div class="ribbon"><span>Popular</span></div>

                        <p class="color-yellow heading-p text-center" style="padding-top:25px;">{{ucwords($popular->heading)}}</p>

                        <ol class="list-10">
                            @foreach($popular->childs as $child)
                                <li>
                                    {{$child->content}}

                                    <div class="d-flex mt-1">

                                        <div class="justify-content-start">
                                            <a href="javascript: void(0)" class="upvote" style="padding-left:15px;" data-id = "{{$child->id}}">
                                                @php 
                                                $className = "fa-thumbs-o-up";
                                                if($child->checkIfGuestUpVote(request()->ip)){
                                                    $className="fa-thumbs-up";
                                                }
                                                @endphp
                                                <i class="fa {{$className}}" aria-hidden="true"></i>
                                              
                                                
                                            </a>
                                            <span style="padding-left:5px;" id="child-up-{{$child->id}}">{{$child->countUpVotes()}}</span>
                                        </div>

                                        <div class="justify-content-center">
                                            <a href="javascript: void(0)"  class="downvote" style="padding-left:15px;"  data-id = "{{$child->id}}">
                                                @php 
                                                $className = "fa-thumbs-o-down";
                                                if($child->checkIfGuestDownVote(request()->ip)){
                                                    $className="fa-thumbs-down";
                                                }
                                                @endphp
                                                <i class="fa {{$className}}" aria-hidden="true" ></i>
                                            </a>
                                            <span style="padding-left:5px;" id="child-down-{{$child->id}}">{{$child->countDownVotes()}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
                 <div class="sticky-top">

                    <iframe class="mx-auto d-block" style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=snblog-20&marketplace=amazon&region=US&placement=B06Y3KYN11&asins=B06Y3KYN11&linkId=d82b5a56b34f970222acc30c55ec183d&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066C0&bg_color=FFFFFF"></iframe>
                    <iframe class="mx-auto d-block mt-3" style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=snblog-20&marketplace=amazon&region=US&placement=B0792K2BK6&asins=B0792K2BK6&linkId=c6cba09d9d153ea08a99328834ea9db4&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff"></iframe>
                   
                </div>
                {{-- <img class="img-fluid" src="https://www.essaymaster.co.uk/images/banner-3.jpg" style="margin-bottom:5px;"> --}}
            </div>
        </div>

        <div class="col-lg-8 col-md-8 col-xs-12 post-161 post type-post status-publish format-standard has-post-thumbnail hentry category-social" id="post-161">

            <div class="mainheading">
                <!-- Begin Author box -->
                <div class="row post-top-meta hidden-md-down">
                    <div class="col-md-1 col-xs-12">
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
            <img src="{{ asset('wp-content/uploads/'.$post->featuredImage)  }}" width="1000" height="200" class="featured-image img-fluid wp-post-image" alt="{{$post->title}}"  > 
                

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
                                        <span class="post-name"><a href="{{$row->user->link}}">{{$row->user->name}}</a></span>
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