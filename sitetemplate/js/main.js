$(function(){
	
	$('.mobile_menu').click(function(e){
		e.preventDefault();
		$('html').toggleClass('no_scroll');
		$(this).toggleClass('active');
		$('.nav_menu').toggleClass('active');
	});
	$('select').niceSelect();
	$('.scroll_go').click(function(e){ $('body,html').animate({scrollTop: $($(this).attr('href')).offset().top}, 1500);});
	
	$('#ctn-preloader').addClass('loaded');


	if ($('#ctn-preloader').hasClass('loaded')) {
		
		$('#preloader').delay(900).queue(function () {
			$(this).remove();
		});
	}
    
});

var app = new Vue({
	el: '#app_block',
	data: {
		
	
	},
	methods: {
		openMobile: function(event) {
			
		},
		onSubmit: function(event) {
			grecaptcha.ready(function() {
				grecaptcha.execute($('meta[name="recaptha_public"]').attr('content'), {action: 'homepage'}).then(function(token) {
					
					$('.g-recaptcha-response').val(token);
					var form = event.target;
					$('#'+$(form).attr('id')+' button .spinner-border').remove();
					$('#'+$(form).attr('id')+' button').prop('disabled', true);
					$('#'+$(form).attr('id')+' button').append('<div class="spinner-border text-light" style="margin-left: 10px;width: 20px; height: 20px;display: none" role="status"></div>');
					$('#'+$(form).attr('id')+' button .spinner-border').fadeIn();
					$.ajax({
						type: $(form).attr('method'),
						url: $(form).attr('action'),
						data: new FormData(form),
						contentType: false,
						cache: false,
					
						processData: false,
						success: function(result) {
							
							setTimeout(() => $('#'+$(form).attr('id')+' button .spinner-border').fadeOut(), 6000);
							setTimeout(() => $('#'+$(form).attr('id')+' button').removeAttr('disabled'), 6000);
							
							json = jQuery.parseJSON(result);
							SendNotify(json.header,json.message,json.status,json.url);
							if(json.status != 'success') $('#'+$(form).attr('id')+' button').removeAttr('disabled');
							
						}
					});
				});
			});
		}
		
	}
});
function SendNotify(title,message,type, link = "") {
	var e = $.notify(
	{
		title: title,
		message: message,
		
	},
	{
		type: type,
		
		
		allow_dismiss: true,
		newest_on_top: false,
		mouse_over: true,
		showProgressbar: false,
		spacing: 10,
		timer: 2000,
		placement: {
			from: 'bottom',
			align: 'right'
		},
		offset: {
			x: 30,
			y: 30
		},
	
		delay: 1000,
		z_index: 10000,
		animate: {
			enter: "animated fadeInDown",
			exit: "animated fadeOutDown"
		}
	});
	$('.alert[data-notify] .close').html('');
	$('.alert[data-notify]').removeClass('col-xs-11 col-sm-4');
	if(link) setTimeout(() => RedirectNotify(link), 1000); 
}
function RedirectNotify(link) {
	var e = $.notify(
		{
			
			message: 'Переход на другую страницу',
			
			url: link
		},
		{
			type: 'info',
			
			
			allow_dismiss: true,
			newest_on_top: false,
			mouse_over: true,
			showProgressbar: true,
			spacing: 10,
			timer: 2000,
			placement: {
				from: 'bottom',
				align: 'right'
			},
			offset: {
				x: 30,
				y: 30
			},
			delay: 1000,
			z_index: 10000,
			animate: {
				enter: "animated fadeInDown",
				exit: "animated fadeOutDown"
			}
		});
		setTimeout(() => window.location.href = link, 3000);
		$('.alert[data-notify] .close').html('');
	$('.alert[data-notify]').removeClass('col-xs-11 col-sm-4');
		
}


