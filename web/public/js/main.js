/*
	Broadcast by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

(function($) {

	// Lazy load image
	// https://viblo.asia/p/ban-chat-cua-lazy-loading-images-RQqKLAamZ7z
	var lazyloadImages = document.querySelectorAll("img.lazy");    
	var lazyloadThrottleTimeout;
	
	function lazyload () {
	  if(lazyloadThrottleTimeout) {
		clearTimeout(lazyloadThrottleTimeout);
	  }    
	  
	  lazyloadThrottleTimeout = setTimeout(function() {
		  var scrollTop = window.pageYOffset;
		  lazyloadImages.forEach(function(img) {
			  if(img.offsetTop < (window.innerHeight + scrollTop)) {
				img.src = img.dataset.src;
				img.classList.remove('lazy');
			  }
		  });
		  if(lazyloadImages.length == 0) { 
			document.removeEventListener("scroll", lazyload);
			window.removeEventListener("resize", lazyload);
			window.removeEventListener("orientationChange", lazyload);
		  }
	  }, 20);
	}
	
	document.addEventListener("scroll", lazyload);
	window.addEventListener("resize", lazyload);
	window.addEventListener("orientationChange", lazyload);
	// End lazy

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Menu.
			$('#menu')
				.append('<a href="#menu" class="close"></a>')
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'right'
				});

		// Banner.
			var $banner = $('#banner');

			if ($banner.length > 0) {

				// IE fix.
					if (skel.vars.IEVersion < 12) {

						$window.on('resize', function() {

							var wh = $window.height() * 0.60,
								bh = $banner.height();

							$banner.css('height', 'auto');

							window.setTimeout(function() {

								if (bh < wh)
									$banner.css('height', wh + 'px');

							}, 0);

						});

						$window.on('load', function() {
							$window.triggerHandler('resize');
						});

					}

			}

		// Tabbed Boxes

			$('.flex-tabs').each( function() {

				var t 		= jQuery(this),
					tab 	= t.find('.tab-list li.home a'),
					tabs 	= t.find('.tab');

				tab.click(function(e) {

					var x = jQuery(this),
						y = x.data('tab'), // tab-2,...
						id = x.data('id');

					var content_before = t.find('.' + y).html();

					if (content_before == '')
						callAPIGetGamesByCat(id, y, t);

					// Set Classes on Tabs
						tab.removeClass('active');
						x.addClass('active');

					// Show/Hide Tab Content
						tabs.removeClass('active');
						t.find('.' + y).addClass('active');

					e.preventDefault();

				});

			});

			function callAPIGetGamesByCat(id, y, t) {
				$.ajax({
					url:"/api_cat/"+id,
					type: "GET",
					headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
					//   $body.addClass("loading"); // Load Please wait modal, BUT for sending request time
					},
					success: function (res) {
					  //$body.addClass("loading");
					  genTabList(res, y, t); // json return {'data': $list_orders, 'status': 1}
					  //$body.removeClass("loading");
					},
					error: function (res) {
					
					},
					complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
					//   $body.removeClass("loading"); // Hide Please wait modal, BUT for sending request time
					},
				  })
			}
			function genTabList(res, y, t) {
				console.log(res);
				var content = '';
				if (res[0].length > 0) {
					for (let i = 0; i < res[0].length; i++) {
						content += '<div class="video col">';
						content +=   '<div class="image fit">';
						content += '<img src="../images/thumb/'+getFolder(res[0][i]['g_site']);
						// onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';"
						content +=       res[0][i]['g_thumb']+'" onerror="this.onerror=null;this.src=&quot;../images/thumb/thumb_def.png&quot;;" alt="Game online "';
						content +=       res[2][res[0][i]['g_cat_1']][0]+'" />';
						content +=     '</div>';
						content +=   '<p class="caption">'+shortenStr(res[0][i]['g_title'])+'</p>';
						content +=   '<a href="game/'+res[0][i]['g_title_slug']+'" class="link"><span>Click Me</span></a>';
						content += '</div>';
					}
				}
				if (res[0].length >= 12)
					content += '<a href="cat/'+res[1][0]['g_cat_slug']+'" class="link-more">See more</a>';
				t.find('.' + y).html(content);
			}
			function getFolder(site) {
				r = '';
				switch (site) {
					case 'https://gamemonetize.com':
						r = 'monetize'+'/';
						break;
					case 'https://crazygames.com':
						r = 'crazygames'+'/';
						break;
					case 'https://trochoi.net':
						r = 'trochoinet'+'/';
						break;
					case 'https://y8.com':
						r = 'y8'+'/';
						break;
					default:
						r = 'others'+'/';
						break;
				}
				return r;
			}
			function shortenStr(str, n=20) {
				if (str.length > n+1)
					return str.substring(0, n)+'...';
				else
					return str;
			}

		// Scrolly.
			if ( $( ".scrolly" ).length ) {

				var $height = $('#header').height();

				$('.scrolly').scrolly({
					offset: $height
				});
			}

			// Game vote
			$('.vote-action a').click(function(e) {
				e.preventDefault();
				var id = $(this).attr('data-id');
				var vote_type = $(this).attr('data-vote');
				callAPISetVoteGame(id, vote_type);
			});
			function callAPISetVoteGame(id, vote_type) {
				var data = {
					id: id,
					vote_type: vote_type
				};
				$.ajax({
					url:"/api_vote",
					type: "POST",
					data: data,
					// dataType: 'JSON',
					// contentType: "application/json",
					headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
					},
					success: function (res) {
						// setAnn('You vote successfully...');
					},
					error: function (res) {
						// setAnn('There was error occur, can you try again!');
					},
					complete: function () {
						// console.log(res[0]);
					},
				  })
			}
			function setAnn(content) {
				$('.ann').css('display', 'block');
				$('.ann').text(content);
				var intv = setInterval(function() {
					$('.ann').css('display', 'none');
					clearTimeout(intv);
				}, 3000);
			}

	});



})(jQuery);



// Slide
// let slideIndex = 0;
// showSlides();

// function plusSlides(n) {
// 	showSlidesManual();
// }

// function showSlides() {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {slideIndex = 1}
//   slides[slideIndex-1].style.display = "block";
//   setTimeout(showSlides, 5000); // Change image every 2 seconds
// }

// function showSlidesManual() {
// 	let i;
// 	let slides = document.getElementsByClassName("mySlides");
// 	for (i = 0; i < slides.length; i++) {
// 	  slides[i].style.display = "none";
// 	}
// 	slideIndex++;
// 	if (slideIndex > slides.length) {slideIndex = 1}
// 	slides[slideIndex-1].style.display = "block";
// }


