<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: News Magazine
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('layout/images/2.png')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    @yield('metas')

    <link rel="stylesheet" type="text/css" href="{{asset('layout/styles/layout.css')}}" />
    <script type="text/javascript"         src="{{asset('layout/scripts/jquery.min.js')}}"></script>
    <!-- Homepage Specific -->
    <script type="text/javascript" src="{{asset('layout/scripts/galleryviewthemes/jquery.easing.1.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('layout/scripts/galleryviewthemes/jquery.timers.1.2.js')}}"></script>
    <script type="text/javascript" src="{{asset('layout/scripts/galleryviewthemes/jquery.galleryview.2.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layout/scripts/galleryviewthemes/jquery.galleryview.setup.js')}}"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{asset('fancy/lib/jquery.mousewheel-3.0.6.pack.js')}}"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{asset('fancy/source/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('fancy/source/jquery.fancybox.pack.js')}}"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="{{asset('fancy/source/helpers/jquery.fancybox-buttons.css')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('fancy/source/helpers/jquery.fancybox-buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('fancy/source/helpers/jquery.fancybox-media.js')}}"></script>

    <link rel="stylesheet" href="{{asset('fancy/source/helpers/jquery.fancybox-thumbs.css')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('fancy/source/helpers/jquery.fancybox-thumbs.js')}}"></script>
    <!-- / Homepage Specific -->

    @yield('styles')
</head>

<body id="top" style="font-family: Arial;">


<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1629525740694872";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="wrapper col0">
<div id="topline">
<p>This is trial version of MEDN website..</p>
<ul>
<li></li>
    @if (Auth::guest())
        Contact : mekawy.3f@gmail.com
    @else
         <div style="display: inline !important;">
             <div  style="float: right;" id="elhover">welcome : {{ Auth::user()->name}} | <a href="{{ url('/logout') }}">Sign Out</a></div>
             <div style="float: left;">
                 @if(Auth::user()->photo->file)
                     <img src="{{asset(''). Auth::user()->photo->file}}" width="30">
                 @endif
             </div>
         </div>
    @endif


</ul>
<br class="clear" />
</div>
</div>
        <!-- ####################################################################################################### -->


<div class="wrapper">
    <div id="header">
        <div class="fl_left">
            <h1><a href="{{url('/')}}"><img src="{{asset('layout/images/logo.png')}}" alt=""></a></h1>
            <p style="margin-left: 100px;">Middle East Defence News</p>
        </div>

        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
    <div id="topbar">
        <div id="topnav" style="font-family:Arial;font-weight: bold; ">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/category/land')}}">Land</a></li>
                <li><a href="{{url('/category/naval')}}">Naval</a></li>
                <li><a href="{{url('/category/air&space')}}">Air & space</a>
                    <ul>
                        <li><a href="{{url('/category/airforce')}}">Air Forces</a></li>
                        <li><a href="{{url('/category/airdefence')}}">Air Defence</a></li>
                        <li><a href="{{url('/category/space')}}">Space & satellite</a></li>
                    </ul>
                </li>
                <li class="last"><a href="{{url('/category/world')}}">World news</a></li>
            </ul>
        </div>
        <div id="search">
            {{ Form::open(['route' => 'search', 'method' => 'GET'])}}
            <fieldset>
                    <legend>Site Search</legend>
                    <input type="text" name="keyword" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
                    {{Form::submit('Search', array('id' => 'go')) }}
                </fieldset>
            {{ Form::close() }}
        </div>
        <br class="clear" />
    </div>
</div>




                                                   @yield('content')


<div class="wrapper col8" style="position: relative;bottom: 0;width: 100%;background-color: #EEEEEE;">
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a >Domain Name</a></p>
        <p class="fl_right">Designed by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates" rel="nofollow">OS Templates</a></p>
        <br class="clear" />
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox-thumb").fancybox({
            prevEffect	: 'none',
            nextEffect	: 'none',
            helpers	: {
                title	: {
                    type: 'outside'
                },
                thumbs	: {
                    width	: 50,
                    height	: 50
                }
            }
        });
    });
</script>

</body>
</html>