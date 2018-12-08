<div style="display:none !important">
@foreach($categories as $category)

<div class="section-title">
    <h2>
    <span>{{ $category->name }} </span>
    <a class="d-block pull-right morefromcategory" href="/category/{{$category->slug}}">
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
                                <a href="{{$post->link}}">
                                    <div class="thumbnail" style="background-image:url({{$post->featuredMedia('medium')}})"></div>
                                </a>
                            </div>
                            <div class=" col-md-7 ">
                                <div class="card-block">
                                    <h2 class="card-title"> <a href="{{$post->link}}">{{trucnateStringh($post->title,40)}}</a></h2>
                                    <span class="card-text d-block">
                                        {{ trucnateStringh($post->body,100) }}
                                    </span>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
                                            <span class="meta-footer-thumb">
                        <a href="{{$post->user->link}}">
                        <img alt='' src='{{$post->user->dp}}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                    </span>
                    <span class="author-meta">
                        <span class="post-name">
                        <a href="{{$post->user->link}}">{{ $post->user->name}}</a></span><br>
                                            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span><span class="dot"></span>
                                            <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                                            </span>
                                         </div>
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
                           
                            @if ($loop->first)
                              
                    <div class="col-md-4 col-lg-4 col-sm-4 padr10" id="post-{{encrypt($post->id)}}">
                        <div class="card post highlighted">

                            <a class="thumbimage" href="{{$post->link}}" style="background-image:url({{$post->featuredMedia('medium')}})">
                                
                            </a>
                            <div class="card-block">
                                <h2 class="card-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                                <span class="card-text d-block">{{trucnateStringh($post->body,100)}}</span>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                        <span class="meta-footer-thumb">
                            <a href="{{$post->user->link}}">
                        <img alt='' src='{{$post->user->dp}}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                         </span>
                        <span class="author-meta">
                        <span class="post-name">
                            <a href="{{$post->user->link}}">{{ $post->user->name }}</a>
                        </span>
                        <br>
                        <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                        <span class="dot"></span>
                           <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                                    
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
                                    <a class="thumbimage" href="{{$post->link}}" style="background-image:url({{$post->featuredMedia('medium')}}"></a>
                                    <div class="card-block">
                                        <h2 class="card-title">
                                            <a href="{{$post->link}}">{{trucnateStringh($post->title,40)}}</a>
                                        </h2>
                                        <div class="metafooter">
                                            <div class="wrapfooter">
                                                 <span class="meta-footer-thumb">
                            <a href="{{$post->user->link}}">
                        <img alt='' src='{{$post->user->dp}}' srcset='' class='avatar avatar-40 photo author-thumb' height='40' width='40' /> 
                         </a>
                         </span>
                                                <span class="author-meta">
                        <span class="post-name">
                        <a href="{{$post->user->link}}">{{$post->user->name}}</a></span><br>
                                                <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                                                <span class="dot"></span>
                                                <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
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
</span>
</div>