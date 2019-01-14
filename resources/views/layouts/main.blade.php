<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="SvR3wpjkF5FgMgsyV08uywIK5Dxa41lmrSt6oJA0CS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title',env("APP_NAME"))</title>
    <meta name="description" content="@yield('description')" />
    <link rel='stylesheet' href='{{asset("wp-content/themes/mediumishh/assets/css/bootstrap.min.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("wp-content/themes/mediumishh/style6959.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css'>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style type="text/css" id="wp-custom-css">
        .listfeaturedtag .card {overflow:initial;}

        @media (min-width: 992px){
        .navbar-toggleable-sm .navbar-nav .nav-link {
            font-size: 0.80rem;
            font-weight: 600;
            letter-spacing: 0.8px;
        }
        }

 .avatar {
    display: block;
    white-space: nowrap;
    overflow: visible;
    text-overflow: ellipsis;
    line-height: normal;
    position: relative;
}

.avatar-image--icon {
    width: 32px;
    height: 32px;
}

.avatar-image {
    display: inline-block;
    vertical-align: middle;
    -webkit-border-radius: 100%;
    border-radius: 100%;
}

.button--chromeless, .button--link {
    border-width: 0;
    padding: 0;
    text-align: left;
    vertical-align: baseline;
    white-space: normal;
}

.button {
    display: inline-block;
    position: relative;
    color: rgba(0,0,0,.54);
    background: rgba(0,0,0,0);
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    vertical-align: bottom;
    white-space: nowrap;
    text-rendering: auto;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    font-family: medium-content-sans-serif-font,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Open Sans","Helvetica Neue",sans-serif;
    letter-spacing: 0;
    font-weight: 400;
    font-style: normal;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -moz-font-feature-settings: "liga" on;
}

.nav-up .navbar-brand {
    opacity: 100;
    transition: all 0.2s;
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
    width:100%;
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
    padding-left:5px;
    padding-right:5px;
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


    </style>
    @yield('css')
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7018522938301686",
        enable_page_level_ads: true
      });
    </script>
</head>

<body class="home blog">

  

    <header class="navbar-light bg-white fixed-top mediumnavigation">

        <div class="container">
            <p class="text-center">
            <a href="/login" style="
                        font-size: 16px;
                        font-weight: 600;
                        color: #1c9963;
                    "><span class="fa fa-pencil-square" style="
                        font-size: 25px;
                    "></span>
                    We are actively looking for guest post writer</a></p>
            <!-- Begin Logo -->
            <div class="row justify-content-center align-items-center brandrow">

                <div class="col-lg-4 col-md-4 col-xs-12 ">

                       @if(!auth()->check())   
                        <a href="/login">Login</a> 
                    <span style="color:#00ab6b;"> / </span>
                    <a href="/register">Get Started</a> 

                    @else
                
                         <div class="btn-group">
                  <button type="button" class="button--chromeless button" data-toggle="dropdown" lass="img-circle" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ is_null(auth()->user()->image) ? asset("wp-content/uploads/user/default.png") :  asset("wp-content/uploads/user/".auth()->user()->image)  }}" class="avatar-image avatar-image--icon" alt="{{auth()->user()->name}}">
                    {{auth()->user()->name}}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="/edit-profile">Edit Profile</a>
                    <a class="dropdown-item" href="/create-post">Create Post</a>
                    <a class="dropdown-item" href="/home">View Posts</a>
                    <a class="dropdown-item" href="/trashed-posts">Trashed Posts</a>
                    <a class="dropdown-item" style="border-top:1px solid #e4e1e1; margin-top:5px; padding-top:5px;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                  </div>
                </div> 
                 
                     

                    @endif


                </div>

                <div class="col-lg-4 col-md-4  col-xs-6 text-center logoarea">
                    <a class="navbar-brand" href="{{ url ('/') }}">{{ env("APP_NAME")}}</a>
                </div>

                <div class="col-lg-3 col-md-3  col-xs-2 text-right logoarea">

                    <form role="search" method="get" class="search-form" action="{{action('SearchController@index')}}">
                        <input type="search" class="search-field" placeholder="Search..." value="" name="q" title="Search for:">
                        <button type="submit" class="search-submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                 
          
                </div>

            </div>
            <!-- End Logo -->
          @include('layouts.nav')

        </div>

    </header>
    <div class="site-content">
        <div class="container-fluid">
          @yield('content')
        </div>    {{--End Container--}}
    </div>    <!-- /.site-content -->

@yield('postcontent')
    <div class="container">
        <footer class="footer"> 
            <p class="pull-left"> &copy; {{ env("APP_NAME") }} All rights reserved. </p>
            <p class="pull-right"> {{ env("APP_NAME") }} by RedBirdSources </p>
            <div class="clearfix"></div>
        </footer>
    </div>

    <script type='text/javascript' src='{{asset("wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4")}}'></script>
    <script type='text/javascript' src='{{asset("wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1")}}'></script>
    <script type='text/javascript' src='{{asset("wp-content/themes/mediumishh/assets/js/bootstrap.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("wp-content/themes/mediumishh/assets/js/ie10-viewport-bug-workaround.js")}}'></script>
    <script type='text/javascript' src='{{asset("wp-content/themes/mediumishh/assets/js/masonry.pkgd.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("wp-content/themes/mediumishh/assets/js/mediumish.js")}}'></script>

    @yield('footer')
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114351479-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114351479-3');

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
  });
</script>

</body>

</html>
