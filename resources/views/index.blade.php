@extends('layouts.main')
@section('title', 'Transform your learning and achieve your goals with Blogprotalk')
@section('description','Blogprotalk is a learning environment that allows everyone to  discover and share learning resources.')

@section('css')

<style type="text/css">
    a{
        text-decoration: none !important;
    }
    h2.post-title > a{
        color: rgba(0,0,0,.8);
        font-size:16px;
    }
    h2.post-title >a:hover{
    color: rgba(0,0,0,.6);
    text-decoration: none;
    }
    .mb25{
        margin-bottom:25px;
    }
    .sidebar-text{
        color: rgba(0,0,0,.8);
        margin-bottom:25px;
        font-size:15px;
    }
    .sidebar-text:hover{
        color: rgba(0,0,0,.6);
        text-decoration: none;
    }

    .sticky-offset {
        top: 150px;
    }
    .mb10{
        margin-bottom:10px;
    }
    .mt5{
        margin-top:5px;
    }
    
    .amazon .amzn-ad-primary-btn {
    background: #f8e6b8;
    padding: 3px;
    background: -moz-linear-gradient(top,#f8e6b8 0,#f3d686 6%,#ebb62c 100%);
    background: -webkit-gradient(linear,left top,left bottom,color-stop(0,#f8e6b8),color-stop(6%,#f3d686),color-stop(100%,#ebb62c));
    background: -webkit-linear-gradient(top,#f8e6b8 0,#f3d686 6%,#ebb62c 100%);
    background: -o-linear-gradient(top,#f8e6b8 0,#f3d686 6%,#ebb62c 100%);
    background: -ms-linear-gradient(top,#f8e6b8 0,#f3d686 6%,#ebb62c 100%);
    background: linear-gradient(to bottom,#f8e6b8 0,#f3d686 6%,#ebb62c 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f8e6b8',endColorstr='#ebb62c',GradientType=0);
}
.amzn-ad-primary-btn {
    width: 100%;
    display: block;
    padding: 6px 0;
    margin-bottom: 3px;
    border-width: 1px 0;
}
    
.bg-img-3 {
    background: url({{asset('wp-content/uploads/32.jpg')}});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}
.pr-40px, .px-40px {
    padding-right: 40px!important;
}
.pl-40px, .px-40px {
    padding-left: 40px!important;
}
.pb-60px, .py-60px {
    padding-bottom: 60px!important;
}
.pt-60px, .py-60px {
    padding-top: 60px!important;
}

.mb60{
    margin-bottom:60px;
}

.alert-primary {
    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
}

.ff-text{
    color: rgba(0,0,0,.8);
    font-size:17px;
}
.list-box{
    border-bottom: 5px solid #f4b350;
    box-shadow: rgba(0, 0, 0, 0.75) -1px 2px 18px -4px;
    padding-top: 10px;
    padding-bottom: 10px;
    position: relative;
    float: left;
    background: #564d50;
    border-radius: 5px;
}
.ribbon {
   position: absolute;
   right: -5px; top: -5px;
   z-index: 1;
   overflow: hidden;
   width: 75px; height: 75px; 
   text-align: right;
}
.ribbon span {
   font-size: 10px;
   color: #fff; 
   text-transform: uppercase; 
   text-align: center;
   font-weight: bold; line-height: 20px;
   transform: rotate(45deg);
   width: 100px; display: block;
   background: #f4b350;
   box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
   position: absolute;
   top: 19px; right: -21px;
}
.ribbon span::before {
   content: '';
   position: absolute; 
   left: 0px; top: 100%;
   z-index: -1;
   border-left: 3px solid #f4b350;
   border-right: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #f4b350;
}
.ribbon span::after {
   content: '';
   position: absolute; 
   right: 0%; top: 100%;
   z-index: -1;
   border-right: 3px solid #f4b350;
   border-left: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #f4b350;
}
.color-yellow{
    color:#f4b350!important;
}
.heading-p{
    font-size:18px;
    font-weight: 700;
}

ol.list-10{
    list-style: none;
    counter-reset: my-awesome-counter;
    padding-left: 25px;
    padding-right: 25px;
}
ol.list-10 > li {
  counter-increment: my-awesome-counter;
  padding-bottom:15px;
  font-weight: 600;
  color:#fff;

}
ol.list-10 >li::before {
  content: counter(my-awesome-counter) ". ";
  color: #f4b350;
  font-weight: bold;
}
ol.list-10 a{
    color:#f4b350;
}

.btn-yellowish{
    color: #564d50;
    font-weight: 600;
    background-color: #f4b350;
    border-color: #f4b350;
}


body {
  font-family: Montserrat, sans-serif;
}
</style>

@endsection

@section('content')


<div class="row mb-3">
    <div class="mx-auto d-block">
        <img src="https://via.placeholder.com/968x100?text=Shop%20at%20amazon">
    </div>
</div>
<div class="row mb25">
    <div class="col-lg-2">
        <div class="list-box">
            @foreach($popularLists as $key=>$popular)

            @if($loop->first)
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
                
            @endif
                 @php $popularLists->forget($key); break; @endphp
            @endforeach
        </div>
    </div>
    <div class="col-lg-2 col-xs-12 mb10">

        @foreach($popularPost as $key=>$post)    
            @if($loop->first)
        
                <div class="row">
                    <div class="col-12">
                        <a href="{{$post->link}}">
                            <img src="{{$post->featuredMedia('large')}}" class="img-fluid" style="height:100px !important; width:450px; !important; object-fit:cover;">
                        </a>
                    </div>
                    <div class="col-lg-10 ml-2">
                       <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                       <p  class="text-lead">{{ trucnateStringh($post->body,100) }}</p>
                        <div class="wrapfooter">
                            <span class="author-meta">
                                <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                                <br>
                                <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                                <span class="dot"></span>
                                <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                            </span>
                        </div>

                    </div>
                </div>
                      
                @php $popularPost->forget($key); break; @endphp

            @endif
        @endforeach

        <img src="https://via.placeholder.com/468x440?text=Shop%20at%20amazon" class="img-fluid mt-2">
    </div>
    <div class="col-lg-4 col-xs-12 mb10">
        @foreach($popularPost as $key=>$post)
            <div class="row mb10">
                <a class="col-3" style="background:url({{$post->featuredMedia('medium')}}); background-size:cover; background-repeat:no-repeat;">
                    
                </a>
                <div class="col-9">
                    <h2 class="post-title ff-text"><a href="{{$post->link}}" style="font-size:16px;">{{$post->title}}</a></h2>

                    <div class="wrapfooter">
                        <span class="author-meta">
                            <span class="post-name"><a href="{{$post->user->link}}" style="font-size:13px;">{{$post->user->name}}</a> </span> </a> 
                            <br>
                            <span class="post-date" style="font-size:13px;">{{$post->created_at->diffForHumans()}}</span>
                            <span class="dot"></span>
                            <span class="readingtime" style="font-size:13px;">{{ wordToMinutes($post->body) }} min read</span>
                        </span>
                    </div>

                </div>
            </div>
            @php $popularPost->forget($key); if($loop->iteration ==7) {break;} @endphp
        @endforeach
    </div>
    <div class="col-lg-2 col-xs-12 mb10">

        @foreach($popularPost as $key=>$post)    
            @if($loop->last)
        
                <div class="row">
                    <div class="col-12">
                        <img src="{{$post->featuredMedia('large')}}" class="img-fluid" style="height:100px !important; width:450px; !important; object-fit:cover;">
                    </div>
                    <div class="col-lg-12 ml-1">
                       <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                       <p  class="text-lead">{{ trucnateStringh($post->body,100) }}</p>
                        <div class="wrapfooter">
                            <span class="author-meta">
                                <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                                <br>
                                <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                                <span class="dot"></span>
                                <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                            </span>
                        </div>

                    </div>
                </div>
                      
                @php $popularPost->forget($key); break; @endphp

            @endif
        @endforeach


        <img src="https://via.placeholder.com/468x440?text=Shop%20at%20amazon" class="img-fluid mt-2">
    </div>
    <div class="col-lg-2">
        <div class="list-box">
            @foreach($popularLists as $key=>$popular)

            @if($loop->first)
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
                
            @endif
                 @php $popularLists->forget($key); break; @endphp
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <div class="row bg-img-3 px-40px py-60px mb60">
        <div class="col-md-6">
            <h3 class="mb-10px">Subscribe and Stay Informed</h3>
            <p>Subscribe to our newsletter and stay informed of what latest happening </p>
            <div class="form-group form-row mb-0">

                <div class="input-group mb-3">
                    <input class="form-control" type="email" id="subEmail" placeholder="Your email">
                    <div class="input-group-append">
                        <button class="btn box-shadow-none" id="subcribe-btn" type="button">Subscribe</button>
                    </div>
                </div>

                <div id="subscribe-msg"></div>

            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-lg-2">
        <div class="list-box" style="margin-bottom:25px;">
            @foreach($popularLists as $key=>$popular)

            @if($loop->first)
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
                
            @endif
                 @php $popularLists->forget($key); break; @endphp
            @endforeach
        </div>

        <div class="list-box">
            @foreach($popularLists as $key=>$popular)

            @if($loop->first)
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
                
            @endif
                 @php $popularLists->forget($key); break; @endphp
            @endforeach
        </div>

         
    </div>

    <div class="col-lg-6 col-xs-12">
        @foreach($categories as $category)

        <div class="section-title">
            <h2> <span>{{$category->name}}</span> 
                <a class="d-block pull-right morefromcategory" href="{{$category->link}}">More &nbsp; 
                    <i class="fa fa-angle-right"></i>
                </a>
            </h2>
        </div>

            {{-- Printing Posts per category --}}
            @foreach($category->latestposts->take(4) as $post)

                <div class="row mb25">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-8">
                        <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                        <p class="text-lead">{{ trucnateStringh($post->body,120) }}</p>
                        <div class="wrapfooter">
                            <span class="author-meta">
                                <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                                <br>
                                <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                                <span class="dot"></span>
                                <span class="readingtime">{{ wordToMinutes($post->body) }} min read</span>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-3 col-4">
                        <a href="{{$post->link}}" class="img-fluid" style="background:url({{$post->featuredMedia('medium')}}); background-size:cover; background-repeat:no-repeat; display:block; width:100%; height:100%;">
                        </a> 
                    </div>
                </div>

            @endforeach
            {{-- End of Printing posts per category --}}


        @endforeach
    </div>

    <div class="col-4  align-items-center d-none d-sm-block d-lg-block">
       
        <div class="section-title">
            <h2> <span>Popular on Blogprotalk</span> 
               
            </h2>
        </div>
        @foreach($popularPost as $post)
            <div class="row">
                <div class="col-2">
                    <h2 class="text-center sidebar-text" style="padding-top:5px; color: #1c9963!important;     fill: rgba(0,0,0,.15)!important;">0{{$loop->iteration}}</h2>
                </div>
                <div class="col-10 mb10">
                        <a href="{{$post->link}}" class="sidebar-text"><b>{{$post->title}}</b></a>
                        <div class="wrapfooter">
                        <span class="author-meta mt5">
                            <a href="{{$post->user->link}}" style="padding-top:10px; font-size:15px; ">{{$post->user->name}}</a> 
                            <span class="dot"></span> {{$post->created_at->diffForHumans()}}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
         <div class="sticky-top sticky-offset">
             
            <iframe class="mx-auto d-block" style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=snblog-20&marketplace=amazon&region=US&placement=B06Y3KYN11&asins=B06Y3KYN11&linkId=d82b5a56b34f970222acc30c55ec183d&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066C0&bg_color=FFFFFF"></iframe>
            <iframe class="mx-auto d-block mt-3" style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=snblog-20&marketplace=amazon&region=US&placement=B0792K2BK6&asins=B0792K2BK6&linkId=c6cba09d9d153ea08a99328834ea9db4&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff"></iframe>
           
         {{--<a href="mailto:allassignmentassistance@gmail.com">
        <img class="img-fluid mt-1 mx-auto d-block" src="{{url('/wp-content/uploads/banner-5.png')}}">
        </a>--}}
    </div>
    </div>
</div>

@endsection

@section("footer")

<script type="text/javascript">
    $(function(){

      $('ol')
  .find('li:gt(3)')
  .hide()
  .end()
  .append(
    $('  <div class="text-center"><button class="load-more btn btn-yellowish">Load More</button></div>').click( function(){
        $(this).siblings(':hidden').show().end().remove();
    })
);

       
        $("#subcribe-btn").click(function(){

            var subEmail = $("#subEmail").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'{{action('NewsLetterController@store')}}',
                data:{ email: subEmail },
                context: this,
                success:function(data){
                     $('#subscribe-msg').html('');
                     $('#subscribe-msg').append('<div class="alert alert-success mb10 mt5">You are successfully subscribed to our newsletter</div')
                },
                error: function (xhr) {
                $('#subscribe-msg').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#subscribe-msg').append('<div class="alert alert-danger mb10 mt5">'+value+'</div');
                    }); 
                },
            });
        });

        $(".upvote").click(function(){
            var id = $(this).data('id');
            $(this).find('i').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up');

            $.ajax({
                type:'GET',
                url:'/voteup',
                data:{ id: id },
                context: this,
                success:function(data){
                    console.log(data.upVoteCount);
                    $("#child-up-"+id).html(data.upVoteCount);
                },
                error: function (xhr) {
                
                },
            });

        });

        $(".downvote").click(function(){
            var id = $(this).data('id');
            $(this).find('i').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-down');

            $.ajax({
                type:'GET',
                url:'/votedown',
                data:{ id: id },
                context: this,
                success:function(data){
                    console.log(data.upVoteCount);
                    $("#child-down-"+id).html(data.upVoteCount);
                },
                error: function (xhr) {
                
                },
            });
        });
    });
</script>
@endsection


