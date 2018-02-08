$(document).ready(function(){

	$('.saleFiveImg').mouseover(function(){
		$('.saleFive').fadeIn(1000);//.addClass('hovered');
	});
	$('.saleFiveImg').mouseout(function(){
		$('.saleFive').fadeOut(1000);//.removeClass('hovered');
	});



	/*if($(".room_header").length>0)
	{
		$('body').prepend("<div style='position:fixed; z-index:9999999; width:100%; height:100%; background:#32445a' id='over'></div>");
		setTimeout(function(){
			$("#over").fadeOut();
		},1000);
	}*/


	if($("#sr").val()==1)
	{
		setTimeout(function(){
			$('html, body').animate({
				scrollTop: $("#free_services").offset().top
			}, 1000);
		},500);
	}



	if($(".hostel").length>0)
	{
	var images = ['images/hostel/2.jpg', 'images/hostel/3.jpg', 'images/hostel/4.jpg', 'images/hostel/5.jpg', 'images/hostel/6.jpg', 'images/hostel/7.jpg', 'images/hostel/8.jpg', 'images/hostel/9.jpg', 'images/hostel/10.jpg', 'images/hostel/11.jpg', 'images/hostel/12.jpg', 'images/hostel/13.jpg', 'images/hostel/14.jpg'];
        var i = 0;


		for(a=0;a<images.length;a++)
		{
			$('body').append("<img style='position:fixed; left:-1000000px;' src='"+images[a]+"' />");
		}

        setInterval(function(){
            $('.hostel').animate({'opacity': '1'}, 1, function() {
                if (i >= images.length) {
                    i=0;
                }
                $(this).css('background','url(' + images[i++] +') no-repeat center center / cover').animate({'opacity': '1'}, 1);
            });
        }, 3000);
	}




		if($(".room_header").length>0)
	{

        var images1 = ['images/room/2.jpg', 'images/room/3.jpg', 'images/room/4.jpg', 'images/room/5.jpg', 'images/room/6.jpg', 'images/room/7.jpg', 'images/room/8.jpg', 'images/room/9.jpg', 'images/room/10.jpg'];
        var i = 0;

		for(a=0;a<images1.length;a++)
		{
			$('body').append("<img style='position:fixed; left:-1000000px;' src='"+images1[a]+"' />");
		}



		setInterval(function(){
            $('.room_header').animate({'opacity': '1'}, 1, function() {
                if (i >= images1.length) {
                    i=0;
                }
                $(this).css('background','url(' + images1[i++] +') no-repeat center center / cover').animate({'opacity': '1'}, 1);
            });
        }, 3000);
	}


if($(".rulles").length>0)
	{

        var images2 = ['images/rules/1.jpg'];
        var i = 0;
 		for(a=0;a<images2.length;a++)
		{
			$('body').append("<img style='position:fixed; left:-1000000px;' src='"+images2[a]+"' />");
		}


		setInterval(function(){
            $('.rulles').animate({'opacity': '1'}, 1, function() {
                if (i >= images2.length) {
                    i=0;
                }
                $(this).css('background','url(' + images2[i++] +') no-repeat center center / cover').animate({'opacity': '1'}, 1);
            });
        }, 3000);
	}

	/*
	var slider_nav_img = $('.rooms .room_slide .slider_nav img');
	for(var i = 0; i<slider_nav_img.length; i++){
		slider_nav_img[i].css({
			'height' : '106px !important'
		})
	}
	*/


		/***************------------>
		---------------->language<-------
		--------------<******************/

	var lang = $(".lang > a + ul");

	$('.lang > a').click(function(e){
		e.preventDefault();
		if(lang.css('display')!='block') {
			$('.lang > a').css('color', '#f6b41d');
			lang.slideDown(function(){
				$(document).bind('click.myEvent', function(e) {
					if (!$(e.target).closest(lang).length) {
						lang.slideUp();
						$('.lang > a').css('color', '#000');
						$(this).unbind('click.myEvent');
					}
				});
			});
		}
	});

			/***************------------>
		---------------->Scroll<-------
		--------------<******************/
	$(".scroll > a").click(function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("#free_services").offset().top
		}, 1000);
	});



$(document).ready(function() {
	$('a.popup').click( function(event){
		event.preventDefault();
		$('#overlay').fadeIn(400,
		 	function(){
				$('#modal_form')
					.css('display', 'block')
					.animate({opacity: 1, top: '50%'}, 200);
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400);
				}
			);
	});
});

/***************------------>
		---------------->MOBILE MENU<-------
		--------------<******************/
	$(".toggle_mnu").click(function() {
		$(".sandwich").toggleClass("active");
	});

	$(".top_mnu ul a").click(function() {
		$(".top_mnu").fadeOut(600);
		$(".sandwich").toggleClass("active");
		$(".top_text").css("opacity", "1");
	}).append("<span>");

	$(".toggle_mnu").click(function() {
		if ($(".top_mnu").is(":visible")) {
			$(this).css({'width': '120px','height':'110px'});
			$(".top_text").css("opacity", "1");
			$(".top_mnu").fadeOut(600);
			$(".top_mnu li a").removeClass("fadeInUp animated");
		} else {
			$(this).css({'width': '90px','height':'90px'});
			$(".top_text").css("opacity", ".1");
			$(".top_mnu").fadeIn(600);
			$(".top_mnu li a").addClass("fadeInUp animated");
		};
	});

/***************------------>
		---------------->top button<-------
		--------------<******************/
  var top_show = 150;
  var delay = 1000;
	$(window).scroll(function () {
		if ($(this).scrollTop() > top_show) {
			$('.top').fadeIn();
		}
		else {
			$('.top').fadeOut();
		}
	});
	$('.top').click(function () {
		$('body, html').animate({
		scrollTop: 0
		}, delay);
	});

    $(window).load(function(){
        var iter = 1;
        $(".room_slide").each(function(){
            $(this).find(".slider_for").addClass("slider_for" + iter);
            $(this).find(".slider_nav").addClass("slider_nav" + iter);
            iter++;
        });
        updateSlider();
    })


    function updateSlider(){
        $('.slider_for1').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav1',
    	  dots:false
    	});
    	$('.slider_nav1').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for1',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for2').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav2',
    	  dots:false
    	});
    	$('.slider_nav2').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for2',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for3').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav3',
    	  dots:false
    	});
    	$('.slider_nav3').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for3',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for4').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav4',
    	  dots:false
    	});
    	$('.slider_nav4').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for4',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	})
    	$('.slider_for5').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav5',
    	  dots:false
    	});
    	$('.slider_nav5').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for5',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for6').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav6',
    	  dots:false
    	});
    	$('.slider_nav6').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for6',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for7').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav7',
    	  dots:false
    	});
    	$('.slider_nav7').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for7',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    	$('.slider_for8').slick({
    	  slidesToShow: 1,
    	  slidesToScroll: 1,
    	  arrows: false,
    	  fade: true,
    	  asNavFor: '.slider_nav8',
    	  dots:false
    	});
    	$('.slider_nav8').slick({
    	  slidesToShow: 4,
    	  slidesToScroll: 1,
    	  asNavFor: '.slider_for8',
    	  centerMode: false,
    	  focusOnSelect: true,
    	  arrows:false,
    	  dots:false
    	});
    }



var show_message = false;
// reserv_go
$(document).ready(function() {
	$('a.reserv_go').click( function(event){
		event.preventDefault();

        var parent = $(this).parent();
        var free = parent.find(".room_free").val();
        var title = parent.find(".room_title").val();
        var id = parent.find(".room_id").val();
        var room_number = parent.find(".room_room_number").val();
        var type = parent.find(".room_reservation_type").val();

        $('#reserv_form').find(".reserv_room_id").val(id);
        $('#reserv_form').find(".reserv_room_title").val(title);
        $('#reserv_form').find(".reserv_room_free").val(free);
        $('#reserv_form').find(".reserv_room_number").val(room_number);
        $('#reserv_form').find(".reserv_room_type").val(type);

        $('#reserv_form').find("select option").removeAttr("selected");
        $('#reserv_form').find("select option[value=" + room_number + "]").attr('selected','selected');
        var option_title = $('#reserv_form').find("select option[value=" + room_number + "]").text();
        $('#reserv_form').find(".jq-selectbox__select-text").text( option_title );
        $('#reserv_form').find(".jq-selectbox__dropdown ul li").each(function(){
            if( $(this).text() == option_title ){
                $('#reserv_form').find(".jq-selectbox__dropdown ul li").removeClass("selected");
                $('#reserv_form').find(".jq-selectbox__dropdown ul li").removeClass("sel");
                $(this).addClass("selected");
                $(this).addClass("sel");
            }
        })

		$('#overlay_reserv').fadeIn(400,
		 	function(){
				$('#reserv_form')
					.css('display', 'block')
					.animate({opacity: 1, top: '50%'}, 200);
		});
	});

    $(window).load(function(){
        $('#reserv_form .error').hide();
    })


    $(".reserv_form").submit(function(){
		var time_start = $("#reserv_form").find(".time_start").val();
        var time_end = $("#reserv_form").find(".time_end").val();
        var count_people = $("#reserv_form").find(".count_people").val();
        var name = $("#reserv_form").find(".name").val();
        var email = $("#reserv_form").find(".email").val();
        var phone = $("#reserv_form").find(".phone").val();

        if( time_start.length > 0 && time_end.length > 0 && count_people.length > 0 && name.length > 0 && email.length > 0 && phone.length > 0 ){
            return true;
        }else{
        	$('#reserv_form .error').show();
			return false;
        }
    })


    /*$('#reserv_form .reservation_form_submit').submit( function(event) {
        console.log("sub");
        console.log(show_message);
        if( !show_message ){
            event.preventDefault();
            var text = "<span>Спасибо за Вашу заявку! После её обработки нашим менеджером Вам придёт уведомление на указанный Вами Email.</span>";
             $("#reserv_form").find(".sandbox-container").append(text);
             $("#reserv_form").find(".reserv_form").hide();
            show_message = true;
            setTimeout( function () {
                $('#reserv_form .reserv_form').submit();
            }, 2000);
        }
    }); */

	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#reserv_close, #overlay_reserv').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#reserv_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay_reserv').fadeOut(400);
				}
			);
	});



    function isset_js(obj){
        if ((obj).length == 0){
           return false;
        }
        return true;
    }

});


});