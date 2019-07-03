@extends('master')
@section('content')
<div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Liên hê</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{!! route('index') !!}">Trang chủ</a> / <span>Liên hệ</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        @foreach($gioithieu as $item)
                        <tr>
                            <td><img style="width: 150px;" src="page_asset/image/gioithieu/{{$item->image}}"></td>
                            <td>
                                <p style="font-size: 25px; color: red; font-weight: bold;">{{$item->name}}<br><br></p>
                                <p>{{$item->title}}</p>
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                     <div class="row">{!! $gioithieu->links() !!}</div>
                </div>
            </div>
        </div>
    </section>
	<!-- include js files -->
	<script src="page_asset/assets/dest/js/jquery.js"></script>
	<script src="page_asset/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="page_asset/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="page_asset/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="page_asset/assets/dest/vendors/animo/Animo.js"></script>
	<script src="page_asset/assets/dest/vendors/dug/dug.js"></script>
	<script src="page_asset/assets/dest/vendors/utils/beta.utils.js"></script>
	<script src="page_asset/assets/dest/js/scripts.min.js"></script>
	<!--customjs-->
<script>
    /* <![CDATA[ */
        jQuery(document).ready(function($) {
            'use strict';

                        
    try {		
    if ($(".animated")[0]) {
        $('.animated').css('opacity', '0');
        }
        $('.triggerAnimation').waypoint(function() {
        var animation = $(this).attr('data-animate');
        $(this).css('opacity', '');
        $(this).addClass("animated " + animation);

        },
            {
                offset: '80%',
                triggerOnce: true
            }
        );
    } catch(err) {

    }

    var wow = new WOW(
    {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       150,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
    }
    );
    wow.init();	 
    // NUMBERS COUNTER START
            $('.numbers').data('countToOptions', {
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start timer
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            } // NUMBERS COUNTER END 

        // color box

    //color
    jQuery('#style-selector').animate({
    left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
    e.preventDefault();
    var div = jQuery('#style-selector');
    if (div.css('left') === '-213px') {
    jQuery('#style-selector').animate({
    left: '0'
    });
    jQuery(this).removeClass('icon-angle-left');
    jQuery(this).addClass('icon-angle-right');
    } else {
    jQuery('#style-selector').animate({
    left: '-213px'
    });
    jQuery(this).removeClass('icon-angle-right');
    jQuery(this).addClass('icon-angle-left');
    }
    });
            

        });

        /* ]]> */
    </script>
    <script type="text/javascript">
    $(function() {
    // this will get the full URL at the address bar
    var url = window.location.href;

    // passes on every "a" tag
    $(".main-menu a").each(function() {
        // checks if its the same on the address bar
        if (url == (this.href)) {
            $(this).closest("li").addClass("active");
            $(this).parents('li').addClass('parent-active');
        }
    });
    });   


</script>
@endsection