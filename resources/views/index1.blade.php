@extends('layouts.main')

@section('content')


@foreach($categories as $category)

<div class="section-title">
    <h2>
    <span>{{ $category->name }} </span>
    <a class="d-block pull-right morefromcategory" href="/category/{{--$creativity->slug --}}">
        More &nbsp; <i class="fa fa-angle-right"></i>
    </a>
    <div class="clearfix"></div>
    </h2>
</div>

@if($loop->index%2 == 0)

    <section class="featured-posts">
        <div class="row listfeaturedtag margneg10">
            @foreach($category->latestposts->take(4) as $post)

                <div class="col-md-6 col-lg-6 col-sm-6 padlr10">
                    <div class="card" id="post-{{ encrypt($post->id) }}">
                        <div class="row">
                            <div class="col-md-5 wrapthumbnail">
                                <a href="/{{$post->slug}}">
                                   @foreach($post->medias as $media)
                                        @if($media->fileType=='featured')
<div class="thumbnail" style="background-image:url(asset('wp-content/uploads/'.$media->fileName))"></div>
                                  
                                        @endif
                                    @endforeach
                                </a>
                            </div>
                            <div class=" col-md-7 ">
                                <div class="card-block">
                                    <h2 class="card-title"><a href="/{{$post->slug}}">{{$post->title}}</a></h2>
                                    <span class="card-text d-block">
                                        {{ trucnateStringh($post->body) }}

                                        @php $bookmarkId = "" @endphp
                                        @foreach($post->bookmarks as $bookmark)
                                            @if($bookmark->user_id ==1 && $bookmark->post_id = $post->id)

                                             @php $bookmarkId = $bookmark->id @endphp

                                            @endif
                                        @endforeach



                                    </span>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
                                            <span class="meta-footer-thumb">
                        <a href="/author/{{unicodeSlug($post->user->name)}}">
                        <img alt='' src='{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image)  }}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                    </span>
                    <span class="author-meta">
                        <span class="post-name">
                        <a href="/author/{{unicodeSlug($post->user->name)}}">{{ $post->user->name}}</a></span><br>
                                            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                                            <span class="dot"></span>
                                            <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                                            </span>
                                            <span class="post-read-more">
                        <a href="" class="bookmark-class" title="" id="@php echo (!empty($bookmarkId)) ? \Crypt::encryptString($bookmark->id)  : \Crypt::encryptString($post->id) @endphp" data-id="@php echo (!empty($bookmarkId)) ? 1 : 0 @endphp" data-bookmarked='no' data-yes='no'>
                        <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                        @if(!empty($bookmarkId))

                         <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126c.205.183.52.17.708-.03a.5.5 0 0 0 .118-.285H19V6z" fill-rule="evenodd">
                         </path>

                         @else

                         <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z">

                         </path>


                         @endif
                        </svg>
                        </a>
                    </span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </section>

@else

    <div class="row listrecent">

                    @foreach($category->latestposts->take(5) as $post)
                             @php $bookmarkId = "" @endphp
                                            @foreach($post->bookmarks as $bookmark)
                                                @if($bookmark->user_id ==1 && $bookmark->post_id = $post->id)

                                                 @php $bookmarkId = $bookmark->id @endphp

                                                @endif
                                            @endforeach
                            @if ($loop->first)
                              
                    <div class="col-md-4 col-lg-4 col-sm-4 padr10" id="post-{{encrypt($post->id)}}">
                        <div class="card post highlighted">

                            <a class="thumbimage" href="{{$post->slug}}" style="@foreach($post->medias as $media)
                                            @if($media->fileType=='featured')
                                             background-image:url(wp-content/uploads/18/03/{{ $media->fileName }} )
                                            @endif
                                        @endforeach"></a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="{{$post->slug}}">{{$post->title}} &nbsp; {{$post->id}}</a></h2>
                                <span class="card-text d-block">{{trucnateStringh($post->body)}}</span>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                        <span class="meta-footer-thumb">
                            <a href="/author/{{unicodeSlug($post->user->name)}}">
                        <img alt='' src='{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image)  }}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                         </span>
                                        <span class="author-meta">
                        <span class="post-name"><a href="author/themesforwebcom/index.html">{{ $post->user->name }}</a></span><br>
                                        <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                                        <span class="dot"></span>
                                        <span class="readingtime">1 min read</span>
                                        </span>
                                        <span class="post-read-more">
                                          <a href="" class="bookmark-class" title="" id="@php echo (!empty($bookmarkId)) ? \Crypt::encryptString($bookmark->id)  : \Crypt::encryptString($post->id) @endphp" data-id="@php echo (!empty($bookmarkId)) ? 1 : 0 @endphp" data-bookmarked='no' data-yes='no'>
                            <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                            @if(!empty($bookmarkId))

                             <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126c.205.183.52.17.708-.03a.5.5 0 0 0 .118-.285H19V6z" fill-rule="evenodd">
                             </path>

                             @else

                             <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z">

                             </path>


                             @endif
                            </svg>
                            </a>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8">
                        <div class="row skipfirst">
                            @endif
                            <div class="col-md-6 col-lg-6 col-sm-6 grid-item" id="post-{{encrypt($post->id)}}">

                                <div class="card post height262">
                                    <a class="thumbimage" href="{{$post->slug}}" style="@foreach($post->medias as $media)
                                            @if($media->fileType=='featured')
                                             background-image:url(wp-content/uploads/18/03/{{ $media->fileName }} )
                                            @endif
                                        @endforeach"></a>
                                    <div class="card-block">
                                        <h2 class="card-title">
                                            <a href="{{$post->slug}}">{{trucnateStringh($post->title,40)}} &nbsp; {{$post->id}}</a>
                                        </h2>
                                        <div class="metafooter">
                                            <div class="wrapfooter">
                                                 <span class="meta-footer-thumb">
                            <a href="/author/{{unicodeSlug($post->user->name)}}">
                        <img alt='' src='{{is_null($post->user->image)  ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".$post->user->image)  }}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                         </span>
                                                <span class="author-meta">
                        <span class="post-name">
                        <a href="author/themesforwebcom/index.html">{{$post->user->name}}</a></span><br>
                                                <span class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                                <span class="dot"></span>
                                                <span class="readingtime">1 min read</span>
                                                </span>
                                   
                                    <span class="post-read-more">
                                                      <a href="" class="bookmark-class" title="" id="@php echo (!empty($bookmarkId)) ? \Crypt::encryptString($bookmark->id)  : \Crypt::encryptString($post->id) @endphp" data-id="@php echo (!empty($bookmarkId)) ? 1 : 0 @endphp" data-bookmarked='no' data-yes='no'>
                                                <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                                @if(!empty($bookmarkId))

                                                 <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126c.205.183.52.17.708-.03a.5.5 0 0 0 .118-.285H19V6z" fill-rule="evenodd">
                                                 </path>

                                                 @else

                                                 <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z">

                                                 </path>


                                                 @endif
                                                </svg>
                                                </a> 
                                    </span> 
                                    </div>
                                                            </div>
                                    </div>
                                </div>
                            </div>

                            @if($loop->last)

                        </div>
                    </div>
                            @endif
                    @endforeach

                 
                    <div class="clearfix"></div>

    </div>

@endif


@endforeach

@endsection



@section('footer')
<script>
jQuery(document).ready(function(){
    jQuery(".bookmark-class").click(function(e){
        e.preventDefault();
        var id =jQuery(this).attr("id");
        var post_id = id;
        var user_id = 1;
        var isBookmarked = jQuery(this).data("id");

        var notBookmarked = '<svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"> <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg>';

        var bookmarked = '<svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126c.205.183.52.17.708-.03a.5.5 0 0 0 .118-.285H19V6z" fill-rule="evenodd"></path></svg>';

        if(isBookmarked===0){
            jQuery(this).data("id",1);
           
            jQuery.ajax({
                  type: "POST",
                  url: '/add-bookmark.html',
                  data: {
                    '_token': jQuery('meta[name=csrf-token]').attr('content'),
                    id: id
                  },
                 context: this,
                  success: function(resp){
                    id = resp.last_insert_id;
                    jQuery(this).find("svg").remove();
                    jQuery(this).html(bookmarked);
                    jQuery(this).attr("id",resp.last_insert_id);
                  }
            });

        }else if(isBookmarked===1){

            jQuery(this).data("id",0);
            jQuery.ajax({
                  type: "POST",
                  url: '/remove-bookmark.html',
                  data: {
                    '_token': jQuery('meta[name=csrf-token]').attr('content'),
                    id: jQuery(this).attr("id")
                  },
                  context: this,
                  success:function(html){
                    jQuery(this).find("svg").remove();
                    jQuery(this).html(notBookmarked);
                    jQuery(this).attr("id",post_id);
                  }
            });
            
        }

    });
});
</script>
@endsection
