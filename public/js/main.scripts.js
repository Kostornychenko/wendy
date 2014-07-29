$(document).ready(function() {
    /*Countdown*/
    $('#countdown').countDown({
        targetDate: {
            'day': 		23,
            'month': 	8,
            'year': 	2014,
            'hour': 	0,
            'min': 		0,
            'sec': 		0
        }
    });

    /*jcarousel*/
    $('.jcarousel').jcarousel({
        vertical:true
    });
    $('.jcarousel-prev').jcarouselControl({
        target: '-=1'
    });

    $('.jcarousel-next').jcarouselControl({
        target: '+=1'
    });

    /*menu*/
    $("#logo-link").click(function(){scroll("#home");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#home-link").click(function(){scroll("#home");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#lovestory-link").click(function(){scroll("#lovestory");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#guest-link").click(function(){scroll("#guest");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#photo-link").click(function(){scroll("#photo");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#wish-link").click(function(){scroll("#wish");$(this).siblings().removeClass("active");$(this).addClass("active");});
    $("#contact-link").click(function(){scroll("#contact");$(this).siblings().removeClass("active");$(this).addClass("active");});
});

function scroll(destination) {
    var time = 1000;
    var height = $(destination).offset();
    $("body, html").animate({"scrollTop":height.top},time);
}


/*gallery*/
jssor_slider1_starter = function (containerId) {
    var options = {
        $DragOrientation: 5,
        $AutoPlay: false,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
        $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
        $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
            $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
            $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
            $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
            $ParkingPosition: 360                           //[Optional] The offset position to park thumbnail
        },
        $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
        }
    };
    var jssor_slider1 = new $JssorSlider$(containerId, options);
};

/*map*/
var geocoder;
var map;

function initialize() {
    geocoder = new google.maps.Geocoder();

    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var address1 = document.getElementById("address1").value;
    var address2 = document.getElementById("address2").value;
    var address3 = document.getElementById("address3").value;

    geocoder.geocode( { 'address': address1}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: address1
            });
        }
    });

    geocoder.geocode( { 'address': address2}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: address2
            });
        }
    });

    geocoder.geocode( { 'address': address3}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: address3
            });
        }
    });
}



