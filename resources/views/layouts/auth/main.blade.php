<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/bootstrap.min.css")}}'>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/animate.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/hamburgers.min.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/select2.min.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/util.css")}}'>
    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/main.css")}}'>

    @yield('css')

</head>
<body>
    
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
            </div>

            @yield('content')
        
         </div>
    </div>
</div>
    
    

    

<script type='text/javascript' src='{{asset("wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4")}}'></script>
<script type='text/javascript' src='{{asset("wp-content/themes/mediumishh/assets/js/bootstrap.min.js")}}'></script>
    <script src='{{asset("wp-content/themes/mediumishh/assets/js/popper.min.js")}}'></script>
    <script src='{{asset("wp-content/themes/mediumishh/assets/js/select2.min.js")}}'></script>

    <script src='{{asset("wp-content/themes/mediumishh/assets/js/tilt.jquery.min.js")}}'></script>
    <script >
        jQuery('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
   {{--  <script src='{{asset("wp-content/themes/mediumishh/assets/js//main.js")}}'></script> --}}

    @yield('footer')
</body>
</html>