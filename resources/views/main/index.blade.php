
@extends('layouts.main')

@section('title')

MEDN | Middle East Defence News

@stop



@section('content')

        <!-- ####################################################################################################### -->
<div class="wrapper" style="border-bottom: none !important;">
    <div class="container">
        <div class="content">
            <div id="featured_slide">
                <ul id="featurednews">

                    @foreach($sliders as $slider)

                        <li><img style="height: 290px;width: 100%;position: relative;top: 0px; left:1px;" src="{{asset('').$slider->photo->file}}" alt="" />
                            <div class="panel-overlay">
                                <h2>{{str_limit($slider->title,55)}}</h2>
                                <p>{{str_limit(strip_tags($slider->body),80)}}<br />
                                    <a href="{{url('article/').'/'.$slider->title_slug}}">Continue Reading &raquo;</a></p>
                            </div>
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class="column">
            <ul class="latestnews">

                <div class="fb-page" data-href="https://www.facebook.com/MiddleEastDefenceNews/" data-tabs="timeline" data-height="385" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MiddleEastDefenceNews/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MiddleEastDefenceNews/">MEDN</a></blockquote></div>


            </ul>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper" style="margin-top: 50px;">

    <div id="hpage_cats">
        <div class="fl_left">
            <h2><a href="/category/land">Land &raquo;</a></h2>
            <img height="75" width="100" src="{{asset('').$sections['land']->photo->file}}" alt="" />
            <p><strong><a href="article/{{$sections['land']->title_slug}}">{{$sections['land']->title}}</a></strong></p>
            <p>{{str_limit(strip_tags($sections['land']->body),500)}}</p>
            <p><a href="article/{{$sections['land']->title_slug}}">Continue Reading &raquo;</a></p>
        </div>

        <div class="fl_right">
            <h2><a href="/category/naval">Naval &raquo;</a></h2>
            <img height="75" width="100" src="{{asset('').$sections['naval']->photo->file}}" alt="" />
            <p><strong><a href="article/{{$sections['naval']->title_slug}}">{{$sections['naval']->title}}</a></strong></p>
            <p>{{str_limit(strip_tags($sections['naval']->body),500)}}</p>
            <p><a href="article/{{$sections['naval']->title_slug}}">Continue Reading &raquo;</a></p>
        </div>

        <br class="clear" />
        <div class="fl_left">
            <h2><a href="/category/air&space">Air & Space &raquo;</a></h2>
            <img height="75" width="100" src="{{asset('').$sections['air&space']->photo->file}}" alt="" />
            <p><strong><a href="article/{{$sections['air&space']->title_slug}}">{{$sections['air&space']->title}}</a></strong></p>
            <p>{{ str_limit( strip_tags($sections['air&space']->body) ,500) }}</p>
            <p><a href="article/{{$sections['air&space']->title_slug}}">Continue Reading &raquo;</a></p>
        </div>

        <div class="fl_right">
            <h2><a href="/category/world"> World News	 &raquo;</a></h2>
            <img height="75" width="100" src="{{asset('').$sections['world']->photo->file}}" alt="" />
            <p><strong><a href="article/{{$sections['world']->title_slug}}">{{$sections['world']->title}}</a></strong></p>
            <p>{{str_limit(strip_tags($sections['world']->body),500)}}</p>
            <p><a href="article/{{$sections['world']->title_slug}}">Continue Reading &raquo;</a></p>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper" style="margin-top: 30px;">
    <div class="container">
        <div class="content" style="width: 1000px !important;">
            <div id="hpage_latest">
                <h2>Articles : </h2>
                <ul>
                    @foreach($articles as $article)

                        <li><img height="150" width="150" src="{{asset('').$article->photo->file}}" alt="" />
                            <p style="color: #0b97c4">{{$article->title}}</p>
                            <p>{{str_limit(strip_tags($article->body),250)}}</p>
                            <p><a href="article/{{$article->title_slug}}">Continue Reading &raquo;</a></p>
                        </li>

                    @endforeach
                </ul>
                <br class="clear" />
            </div>
        </div>
        <br class="clear" />
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper" style="margin-top: 30px; margin-bottom:20px; border-bottom: none !important;" >
    <div id="footer" style="width: 1000px !important; ">
        <div style="margin-left: 10px !important;">
            <p> <h1>Media : </h1></p><br>
            @foreach($medias as $media)
                <div class="footbox" style="margin-top: 15px!important;">
                    <a class="fancybox-thumb" rel="fancybox-thumb" href="{{asset('').$media->file}}" title="{{$media->title}}">
                        <img width="150" height="120" src="{{asset('').$media->file}}" alt="" />
                    </a>
                </div>
            @endforeach
            <br class="clear" />
        </div>
    </div>
</div>
<!-- ####################################################################################################### -->
{{--<div class="wrapper">--}}
{{--<div id="socialise">--}}
{{--<ul>--}}
{{--<li><a href="#"><img height="50" src="layout/images/facebook.gif" alt="" /><span>Facebook</span></a></li>--}}
{{--<li><a href="#"><img height="50" src="layout/images/rss.gif" alt="" /><span>FeedBurner</span></a></li>--}}
{{--<li class="last"><a href="#"><img height="50" src="layout/images/twitter.gif" alt="" /><span>Twitter</span></a></li>--}}
{{--</ul>--}}
{{--<div id="newsletter">--}}
{{--<h2>NewsLetter Sign Up !</h2>--}}
{{--<p>Please enter your Email and Name to join.</p>--}}
{{--<form action="#" method="post">--}}
{{--<fieldset>--}}
{{--<legend>Digital Newsletter</legend>--}}
{{--<div class="fl_left">--}}
{{--<input type="text" value="Enter name here&hellip;"  onfocus="this.value=(this.value=='Enter name here&hellip;')? '' : this.value ;" />--}}
{{--<input type="text" value="Enter email address&hellip;"  onfocus="this.value=(this.value=='Enter email address&hellip;')? '' : this.value ;" />--}}
{{--</div>--}}
{{--<div class="fl_right">--}}
{{--<input type="submit" name="newsletter_go" id="newsletter_go" value="&raquo;" />--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--</form>--}}
{{--<p>To unsubsribe please <a href="#">click here &raquo;</a>.</p>--}}
{{--</div>--}}
{{--<br class="clear" />--}}
{{--</div>--}}
{{--</div>--}}
        <!-- ####################################################################################################### -->


@stop