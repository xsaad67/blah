@extends('layouts.main')

@section('css')

<style type="text/css">
    h2.post-title > a{
        color: rgba(0,0,0,.8);
        font-size:20px;
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
</style>

@endsection

@section('content')



<div class="row mb25">

    <div class="col-lg-4 col-xs-12 mb10">

    @foreach($popularPost as $key=>$post)    
        @if($loop->first)
    
            <div class="row">
                <div class="col-12">
                    <img src="{{$post->featuredMedia('large')}}" class="img-fluid" style="height:100px !important; width:450px; !important; object-fit:cover;">
                </div>
                <div class="col-lg-10 offset-lg-2">
                   <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                   <p>{{ trucnateStringh($post->body,60) }}</p>
                    <div class="wrapfooter">
                        <span class="author-meta">
                            <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                            <br>
                            <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                            <span class="dot"></span>
                            <span class="readingtime">4 min read</span>
                        </span>
                    </div>

                </div>
            </div>
                  
            @php $popularPost->forget($key); break; @endphp

        @endif
    @endforeach

    </div>

    <div class="col-lg-4 col-xs-12 mb10">
        @foreach($popularPost as $key=>$post)
            <div class="row mb10">
                <div class="col-3">
                    <a href="{{$post->link}}">
                        <img class="img-fluid" src="{{$post->featuredMedia('medium')}}">
                    </a> 
                </div>
                <div class="col-9">
                    <h2 class="post-title sidebar-text"><a href="{{$post->link}}" style="font-size:13px;">{{$post->title}}</a></h2>

                    <div class="wrapfooter">
                        <span class="author-meta">
                            <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span> </a> 
                            <br>
                            <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                            <span class="dot"></span>
                            <span class="readingtime">4 min read</span>
                        </span>
                    </div>

                </div>
            </div>
            @php $popularPost->forget($key); if($loop->iteration ==3) {break;} @endphp
        @endforeach
    </div>

    <div class="col-lg-4 col-xs-12 mb10">

    @foreach($popularPost as $key=>$post)    
        @if($loop->last)
    
            <div class="row">
                <div class="col-12">
                    <img src="{{$post->featuredMedia('large')}}" class="img-fluid" style="height:100px !important; width:450px; !important; object-fit:cover;">
                </div>
                <div class="col-lg-10 offset-lg-2">
                   <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                   <p>{{ trucnateStringh($post->body,60) }}</p>
                    <div class="wrapfooter">
                        <span class="author-meta">
                            <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                            <br>
                            <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                            <span class="dot"></span>
                            <span class="readingtime">4 min read</span>
                        </span>
                    </div>

                </div>
            </div>
                  
            @php $popularPost->forget($key); break; @endphp

        @endif
    @endforeach

    </div>

</div>


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

        </div>
    </div>
</div>


<div class="row">

    <div class="col-lg-8 col-xs-12">
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
                    <div class="col-9">
                        <h2 class="post-title"><a href="{{$post->link}}">{{$post->title}}</a></h2>
                        <p class="text-lead">{{ trucnateStringh($post->body,120) }}</p>
                        <div class="wrapfooter">
                            <span class="author-meta">
                                <span class="post-name"><a href="{{$post->user->link}}">{{$post->user->name}}</a> </span>  in <a href="{{$post->category->link}}">{{$post->category->name}}</a> 
                                <br>
                                <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                                <span class="dot"></span>
                                <span class="readingtime">4 min read</span>
                            </span>
                        </div>
                    </div>

                    <div class="col-2">
                        <a href="{{$post->link}}">
                            <img class="img-fluid" src="{{$post->featuredMedia('medium')}}">
                        </a> 
                    </div>
                </div>

            @endforeach
            {{-- End of Printing posts per category --}}


        @endforeach
    </div>

    <div class="col-4  align-items-center d-none d-sm-block d-lg-block">
        <div class="sticky-top sticky-offset">
        <div class="section-title">
            <h2> <span>Popular on Blogprotalk</span> 
               
            </h2>
        </div>
          @foreach($popularPost as $post)
            <div class="row">
                <div class="col-2">
                    <h2 class="text-center sidebar-text" style="padding-top:5px; color: rgba(0,0,0,.15)!important;     fill: rgba(0,0,0,.15)!important;">0{{$loop->iteration}}</h2>
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
    </div>
    </div>
</div>

@endsection

@section("footer")

<script type="text/javascript">
    $(function(){
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

                },
                error: function (xhr) {
                $('#subscribe-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#subscribe-errors').append('<div class="alert alert-danger mb10 mt5">'+value+'</div');
                    }); 
                },
            });

        });
    });
</script>
@endsection


