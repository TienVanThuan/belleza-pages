$(function(){

	// 横幅取得
	var w = $(window).width();
	var h = $(window).height();

	// config url get Ajax function
	var siteUrl = window.location.protocol + '//' + window.location.hostname + '/';
	var adminUrl = siteUrl + 'wp-admin/admin-ajax.php';

	// console.log(adminUrl);
	/*=======================================
	スムーズスクロール
	=========================================*/
	$('a[href^="#"]').click(function(){
		$('html,body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 500, 'swing');
		return false;
	});

	var gotop = $('.l-pagetop');
	gotop.hide();
	$(window).scroll(function(){
		if ($(window).scrollTop() > 500) gotop.css({'display': 'grid'});
		else gotop.fadeOut();
	});

	var leftSocial = $('.l-socical');
	var searchIcons = leftSocial.find('.search-icons');
	var mgBtWidth = $('.l-header').children('.contact').find('.bt.bt-v2').innerWidth();

	var separate;

	if(w>640){ separate = 30; }
	if (w>1200){ leftSocial.css({'width': mgBtWidth + 'px'}); }
	else { separate = 10; }

	$(window).on('scroll', function(){
		scrollHeight = $(document).height();
		scrollPosition = $(window).height() + $(window).scrollTop();


		headerHeight = $('.l-header').innerHeight();
		footHeight = $('.l-footer').innerHeight();
		

		socialItems = leftSocial.find('.social-items');

		
		
		//console.log(footHeight);
		if (scrollHeight - scrollPosition <= footHeight) {
			if(w>1440){
				gotop.css({'position':'absolute','bottom':footHeight + separate, 'width': mgBtWidth + 'px'});
			} else {
				gotop.css({'position':'absolute','bottom':footHeight + separate + 'px'});
			}
			leftSocial.css({'position':'fixed','bottom':footHeight + 32 + 'px', 'height': h - headerHeight - footHeight - 32 + 'px', 'width': mgBtWidth + 'px'});
			leftSocial.find('.search').css({'margin-top': h/6 + 'px'});
		}
		else {
			if (w>1400){
				gotop.css({'position':'fixed','bottom':separate +'px', 'width': mgBtWidth + 'px'});
			} else {
				gotop.css({'position':'fixed','bottom':separate +'px'});
			}
			leftSocial.css({'position':'fixed','bottom': 32 + 'px', 'height': h - headerHeight - 32 + 'px', 'width': mgBtWidth + 'px'});
			leftSocial.find('.search').css({'margin-top': h/3 + 'px'});
		}
	});

	/*=======================================
	Add loading page
	=========================================*/
	// function pageOnLoad(){
	// 	$.ajax({
	// 		beforeSend: function(){
	// 			//add loading icons
	// 			var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
	// 			$('body').append(loading);
	// 		},
	// 		success: function() {
	// 			var isLoading = false;
				
	// 			if (!isLoading) {
					
	// 				setTimeout(() => {
	// 					$('body').find('.overlay').fadeOut();
	// 				}, 450), setTimeout(() => {
	// 					$('.overlay').remove();
	// 				}, 750);
					
	// 			}
	// 		}
	// 	});
	// }
	// pageOnLoad();

	/*=======================================
	Slide
	=========================================*/
	function sliders() {
		var speed = 5000;
		var container = $('.slides');
		var slider = $(".slides > .slides-item");
		var slidersLength = container.children('.slides-item');
		
		var next = 'next';
		var prev = 'prev';

		slider.each(function(index, el) {
			var dataImage = $(this).attr('data-image');
			$(this).css('background-image', 'url("' + dataImage + '")');
		});

		
	    if (slidersLength.length >= 1) {
	        setInterval( function() {
	        	var control = $(".controls");
				var active = $(".slides > .slides-item.isOpen");

				var next = active.next().length ? active.next() : $(".slides > .slides-item:first");

				active.addClass('isClose');

				next.css( { opacity: 0.0} ).addClass('isOpen').animate( { opacity : 1.0}, 1000, function() {
					active.removeClass('isOpen isClose');
		        });

		    }, speed);
	    }

	}
	

	function shoppingPageSlider() {
		var container = '.p-page__shopping-slider .swiper-container';
		var swiper = new Swiper(container, {
			spaceBetween: 30,
			// effect: 'fade',
    		loop: true,
			autoplay: {
				delay: 8000,
				disableOnInteraction: false,
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		  });
		//return swiper;
	}


	function ajaxSliderWebsitePages() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxSliderWebsitePages",
          
			success: function(results) {
                $('.p-top__website-slider .swiper-wrapper').append(results);
                var container = '.p-top__website-slider .swiper-container';
				var swiper = new Swiper(container, {
					spaceBetween: 30,
					// effect: 'fade',
		    		loop: true,
					autoplay: {
						delay: 8000,
						disableOnInteraction: false,
					},
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					}
				  });
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	function ajaxGetFeedbackSlider() {
		
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxGetFeedbackSlider",
          
			success: function(results) {
				
                $('.p-top__feedback .swiper-wrapper').prepend(results);
                var container = '.p-top__feedback .swiper-container';
				var swiper = new Swiper(container, {
					slidesPerView: 1.5,
		      		spaceBetween: 32,
		    		loop: true,
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
					},
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					}
				  });
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	function ajaxMaterialCafeService() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxMaterialCafeService",
          
			success: function(results) {
				
                $('.p-top__materia-cafe-service .items').prepend(results);
                
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}


	// this function add ajax to the material cafe page
	function ajaxGetMCPancakeSlider() {
		
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxGetMCPancakeSlider",
          
			success: function(results) {
				
                $('.pancake-menu-list .swiper-wrapper').prepend(results);
                var container = '.pancake-menu-list .swiper-container';
				var swiper = new Swiper(container, {
					slidesPerView: 1,
		      		spaceBetween: 32,
		    		// loop: true,
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
					},
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					breakpoints: {
						480: {
							slidesPerView: 1.2,
				          	spaceBetween: 32,
						},
				        640: {
				          	slidesPerView: 1.2,
				          	spaceBetween: 32,
				        },
				        768: {
				          	slidesPerView: 2.5,
				          	spaceBetween: 32,
				        },
				        1024: {
				          	slidesPerView: 3.5,
				          	spaceBetween: 32,
				        },
				        1440: {
				        	slidesPerView: 4.5,
				           	spaceBetween: 32,
				        }
				    }
				  });
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	// this function add Hashed Beef Menu List to the material cafe page
	function ajaxGetMCHashedBeefSlider() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxGetMCHashedBeefSlider",
          
			success: function(results) {
				
                $('.hashed-beef-menu-list .swiper-wrapper').prepend(results);
                var container = '.hashed-beef-menu-list .swiper-container';
				var swiper = new Swiper(container, {
					slidesPerView: 1,
		      		spaceBetween: 32,
		    		// loop: true,
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
					},
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					breakpoints: {
						480: {
							slidesPerView: 1.2,
				          	spaceBetween: 32,
						},
				        640: {
				          	slidesPerView: 1.2,
				          	spaceBetween: 32,
				        },
				        768: {
				          	slidesPerView: 2.5,
				          	spaceBetween: 32,
				        },
				        1024: {
				          	slidesPerView: 3.5,
				          	spaceBetween: 32,
				        },
				        1440: {
				        	slidesPerView: 4.5,
				           	spaceBetween: 32,
				        }
				    }
				  });
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	// this function add Drinks Slider With SwiperJs on Material Cafe Page
	function ajaxGetMCDrinksSlider() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxGetMCDrinksSlider",
          
			success: function(results) {
				
                $('.drinks-menu-list .swiper-wrapper').prepend(results);
                var container = '.drinks-menu-list .swiper-container';
				var swiper = new Swiper(container, {
					slidesPerView: 1.2,
					slidesPerColumn: 1,
					slidesPerColumnFill: 'row',
		      		spaceBetween: 32,
		    		// loop: false,
					// autoplay: {
					// 	delay: 4000,
					// 	disableOnInteraction: false,
					// },
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					breakpoints: {
						480: {
							slidesPerView: 1.2,
				          	spaceBetween: 32,
				          	slidesPerColumn: 1,
				          	slidesPerColumnFill: 'row',
						},
				        640: {
				          	slidesPerView: 1.2,
				          	spaceBetween: 32,
				          	slidesPerColumn: 1,
				          	slidesPerColumnFill: 'row',
				        },
				        768: {
				          	slidesPerView: 2,
				          	spaceBetween: 32,
				          	slidesPerColumn: 2,
				          	slidesPerColumnFill: 'row',
				        },
				        1024: {
				          	slidesPerView: 3,
				          	spaceBetween: 32,
				          	slidesPerColumn: 2,
				          	slidesPerColumnFill: 'row',
				        },
				        1440: {
				        	slidesPerView: 4,
				           	spaceBetween: 32,
				           	slidesPerColumn: 2,
				           	slidesPerColumnFill: 'row',
				        }
				    }
				  });
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	// this function add Material Cafe Slider With SwiperJs on Material Cafe Page
	function ajaxGetSliderMCPageCT() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxGetSliderMCPageCT",
          
			success: function(results) {
				
                $('.p-top__material-cafe-slider .swiper-wrapper').prepend(results);
                var container = '.p-top__material-cafe-slider .swiper-container';
				var swiper = new Swiper(container, {
					spaceBetween: 32,
					// effect: 'fade',
		    		// loop: true,
					// autoplay: {
					// 	delay: 8000,
					// 	disableOnInteraction: false,
					// },
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					}
				  });
  
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	/*=======================================
	Add Show Portfolio to the Home Page
	=========================================*/
	function ajaxShowPortfolioHP(){
        $.ajax({
            url: adminUrl,
            type: "GET",
            data: "action=ajaxShowPortfolioHP",
            beforeSend: function(){
                //add loading icons
                var loading = '<div class="sp sp-circle"></div>'
                $('.p-top__our-project').find('.portfolio-ct').append(loading);
            },
            success: function(results) {
                // const posts = JSON.parse(results);
                $('.p-top__our-project').find('.portfolio-ct').html(results);
                $('.p-top__our-project').find('.portfolio-bt').append('<div class="col-lg-12 view-more"><p><a href="'+ siteUrl +'du-an/" class="more">Xem thêm</a></p></div>');
                $('.p-top__our-project .portfolio-bt').find('.sp.sp-circle').remove();
            },
            error: function() {
                console.log('Cannot retrieve data.');
            }
        });
    }

	/*=======================================
	Add Ajax to the Home Page
	=========================================*/
	function fetchDataToHomePages() {
		$('body.page-template-home').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                $.each(posts, function() {
		                    if (this.id === 13) {
		                        $('.p-top__about .c-row').prepend('<div class="col-lg-6 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__about .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 14) {
		                        $('.p-top__contact .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact .title-box').find('p.desc').append(this.content);
		                        $('.p-top__contact').find('li.phone').append(this.phone);
		                        $('.p-top__contact').find('li.email').append(this.email);
		                        $('.p-top__contact').find('li.address').append(this.address);
		                    } else if (this.id === 16) {
		                        $('.p-top__feedback .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__feedback .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 17) {
		                        $('.p-top__service .service-area').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__service .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 34) {
		                        $('.p-top__our-project .portfolio-tt').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__our-project .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 54) {
		                        $('.p-top__our-product .product-ct').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__our-product .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 71) {
		                        $('.p-top__career .content').find('h1.title').append(this.name);
		                        $('.p-top__career .content').append(this.content);
		                        $('.p-top__career .careers-item').css({'background-image': 'url("'+ this.thumbs +'")'});
		                        $('.p-top__career').on('click', function(){
		                            window.location = '<?php echo home_url(); ?>/tuyen-dung/';
		                        });
		                    } 
		                });
		                $('body .overlay').remove();
		                sliders();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    
		    

		    function ajaxGetPost(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPost",
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                $.each(posts, function() {
		                    if (this.id === 11) {
		                        $('.p-top__mission .c-row').append('<div class="col-lg-8 title-box"><h1 class="title">'+this.name+'</h1></div><div class="col-lg-8 content-box">'+ this.content +'</div><div class="col-lg-8 view-more"><p><a href="'+ this.link +'" class="more">Xem thêm</a></p></div>');
		                    }
		                });
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    
		    

		    function ajaxGetWorks(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetWorks",
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                posts.sort(function(a, b){return a.id - b.id});
		                $.each(posts, function() { 
		                    $('.p-top__service').find('.service-box .c-row').append('<div class="col-lg-6 col-md-6 ' + this.id + '"><div class="item" data-image="' + this.thumbs + '"><div class="icon">' + this.icons + '</div><div class="content"><h3 class="title">' + this.name + '</h3>' + this.content + '</div></div></div>');
		                });

		                /*=======================================
		                Our Service Hover Script
		                =========================================*/
		                var ourService = $('.service-box');

		                ourService.find('.item').hover(function() {
		                    /* Stuff to do when the mouse enters the element */
		                    var getImages = $(this).attr('data-image');
		                    $('.service-img').find('.img').css({'background-image': 'url("'+ getImages +'")'});
		                    $('.service-img').find('.img').addClass('isActive');
		                }, function() {
		                    /* Stuff to do when the mouse leaves the element */
		                    $('.service-img').find('.img').removeClass('isActive');
		                });
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }

		    ajaxGetPageContent();
		    ajaxGetWorks();
		    ajaxGetPost();

		    ajaxShowPortfolioHP();  
		    // feedbackSlider();  
			ajaxGetFeedbackSlider(); 
		});
	}
	fetchDataToHomePages();


	/*=======================================
	Add Ajax to the Career Page 
	=========================================*/
	function fetchDataToCareerPages() {
		$('body.post-type-archive-career').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                $.each(posts, function() {
		                    if (this.id === 14) {
		                        $('.p-top__career-page .left .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__career-page .left .title-box').find('p.desc').append(this.content);
		                        $('.p-top__career-page .left').find('li.phone').append(this.phone);
		                        $('.p-top__career-page .left').find('li.email').append(this.email);
		                        $('.p-top__career-page .left').find('li.address').append(this.address);
		                    } else if (this.id === 71) {
		                        
		                        $('.p-top__career .careers').append('<div class="careers-item isOpen"><div class="intro"><div class="content"><h1 class="title"></h1></div></div></div>');
		                        $('.p-top__career .content').find('h1.title').append(this.name);
		                        $('.p-top__career .content').append(this.content);
		                        $('.p-top__career .careers-item').css({'background-image': 'url("'+ this.thumbs +'")'});
		                    } else if (this.id === 184) {
		                        $('.p-top__career-page .right .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__career-page .right .title-box').find('p.desc').append(this.content);
		                    }
		                });
		                $('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    ajaxGetPageContent();

			function ajaxGetCareer(){
				$.ajax({
					url: adminUrl,
					type: "GET",
		            data: "action=ajaxGetCareer",
		            beforeSend: function(){
		                //add loading icons
		                var loading = '<div class="sp sp-circle"></div>'
		                $('.p-top__career-page .right').find('.career-items').append(loading);
		            },
					success: function(results) {
		                $('.p-top__career-page .right').find('.career-items').html(results);
		                $('.p-top__career-page .sp.sp-circle').remove();
					},
					error: function() {
						console.log('Cannot retrieve data.');
					}
				});
			}
			ajaxGetCareer();
		});
	}
	fetchDataToCareerPages();


	/*=======================================
	Add Ajax to the Product Page 
	=========================================*/
	
	
	function fetchDataToProductPages() {
		$('body.page-id-40').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},

		            success: function(results) {
		                var posts = JSON.parse(results);
		                $.each(posts, function() {
		                    if (this.id === 14) {
		                        $('.p-page__contact .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-page__contact .title-box').find('p.desc').append(this.content);
		                        $('.p-page__contact').find('li.phone').append(this.phone);
		                        $('.p-page__contact').find('li.email').append(this.email);
		                        $('.p-page__contact').find('li.address').append(this.address);
		                    } else if (this.id === 54) {
		                        $('.p-page__our-product .product-ct').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-page__our-product .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 326) {
		                    	//add slider to the product page with custom post type id
		                        $('.p-page__shopping-slider .swiper-wrapper').prepend('<div class="swiper-slide"> <div class="item"><div class="item-bg-motion item-bg-motion-v1"><img class="motion" src="'+siteUrl+'images/slider/products/sakura-flower.png" alt="'+ this.name +'"></div> <div class="item-img"><img src="'+ this.thumbs +'" alt="'+ this.name +'"/></div><div class="item-bg-motion item-bg-motion-v2"><img class="motion" src="'+siteUrl+'images/slider/products/cherry_flower.png" alt="'+ this.name +'"></div><div class="content-box"><div class="content"><h2 class="title">'+ this.name +'</h2><div class="desc">' + this.content + '</div></div></div><div class="area-header-box"><h2 class="title">Belleza Vietnam</h2><p class="desc">Đơn vị cung cấp giải pháp website tổng thể. Dành cho doanh nghiệp, tổ chức, shop bán hàng, nhà quảng cáo, cá nhân kinh doanh.</p></div></div></div>');
		                    } else if (this.id === 331) {
		                    	//add slider to the product page with custom post type id
		                        $('.p-page__shopping-slider .swiper-wrapper').prepend('<div class="swiper-slide"> <div class="item"><div class="item-bg-motion item-bg-motion-v1"><img class="motion" src="'+siteUrl+'images/slider/products/sakura-flower.png" alt="'+ this.name +'"></div> <div class="item-img"><img src="'+ this.thumbs +'" alt="'+ this.name +'"/></div><div class="item-bg-motion item-bg-motion-v2"><img class="motion" src="'+siteUrl+'images/slider/products/cherry_flower.png" alt="'+ this.name +'"></div><div class="content-box"><div class="content"><h2 class="title">'+ this.name +'</h2><div class="desc">' + this.content + '</div></div></div><div class="area-header-box"><h2 class="title">Belleza Vietnam</h2><p class="desc">Đơn vị cung cấp giải pháp website tổng thể. Dành cho doanh nghiệp, tổ chức, shop bán hàng, nhà quảng cáo, cá nhân kinh doanh.</p></div></div></div>');
		                    }
		                });
		                $('body .overlay').remove();

		                /*=======================================
						Shopping Page Slider With SwiperJs
						=========================================*/
						shoppingPageSlider();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    ajaxGetPageContent();
		});
	}
	fetchDataToProductPages();

	/*=======================================
	Add Ajax to the Du An - Portfolio Page 
	=========================================*/
	function fetchDataToPortfolioPages() {
		$('body.post-type-archive-portfolio').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "POST",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                $.each(posts, function() {
		                    if (this.id === 34) {
								$('.p-top__breadcrumb .c-row').prepend('<div class="col-lg-12 content"><h2 class="title">'+this.name+'</h2><p class="desc"></p></div>');
		                        $('.p-top__breadcrumb .c-row').find('p.desc').append(this.content);
		                    } else if (this.id === 14) {
		                        $('.p-top__contact .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact .title-box').find('p.desc').append(this.content);
		                        $('.p-top__contact').find('li.phone').append(this.phone);
		                        $('.p-top__contact').find('li.email').append(this.email);
		                        $('.p-top__contact').find('li.address').append(this.address);
		                    }
		                });
		                $('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
			ajaxGetPageContent();
		});
	}
	fetchDataToPortfolioPages();


	/*=======================================
	Add Ajax to the Website Service Page
	=========================================*/

	function ajaxWebsiteFreatured() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxWebsiteFreatured",
			success: function(results) {
                $('.p-top__featured .area-footer').prepend(results);
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}
	

	function ajaxWebsitePagesService() {
		$.ajax({
			url: adminUrl,
			type: "GET",
            data: "action=ajaxWebsitePagesService",
			success: function(results) {
                $('.p-top__website-service .items').prepend(results);
			},
			error: function() {
				console.log('Cannot retrieve data.');
			}
		});
	}

	function fetchWebsiteServicePages() {
		$('body.page-template-website').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                $.each(posts, function() {
		                    if (this.id === 14) {
		                        $('.p-page__contact .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-page__contact .title-box').find('p.desc').append(this.content);
		                        $('.p-page__contact').find('li.phone').append(this.phone);
		                        $('.p-page__contact').find('li.email').append(this.email);
		                        $('.p-page__contact').find('li.address').append(this.address);
		                    } else if (this.id === 348) {
		                    	$('.p-top__featured .area-header').append('<h1 class="title">' + this.name + '</h1><p class="desc">' + this.content + '</p>');
		                    } else if (this.id === 358) {
		                    	$('.p-top__website-service .title-box').prepend('<h1 class="title">' + this.name + '</h1> <p class="desc"></p>');
		                    	$('.p-top__website-service .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 34) {
		                        $('.p-top__our-project .portfolio-tt').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__our-project .title-box').find('p.desc').append(this.content);
		                    } 
		                });
		                //adding slider

		                $('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    //swiper slider
		    ajaxSliderWebsitePages();
            ajaxWebsiteFreatured();
            ajaxWebsitePagesService();
		    ajaxGetPageContent();
		    ajaxShowPortfolioHP();
		});
	}
	fetchWebsiteServicePages();


	/*=======================================
	Add Ajax to the Material Cafe Page
	=========================================*/

	
	

	function fetchDataToMaterialCafePages() {
		$('body.page-template-material-cafe').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "GET",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                // console.log(results);
		                $.each(posts, function() {
		                    if (this.id === 14) {
		                        $('.p-top__contact .c-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact .title-box').find('p.desc').append(this.content);
		                        $('.p-top__contact').find('li.phone').append(this.phone);
		                        $('.p-top__contact').find('li.email').append(this.email);
		                        $('.p-top__contact').find('li.address').append(this.address);
		                    } else if (this.id === 335) {
		                    	$('.p-top__website-service .titles').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__website-service .titles .title-box').find('p.desc').append(this.content);
		                    }
		                });
		                
		                $('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    ajaxGetSliderMCPageCT();
		    ajaxGetPageContent();
		    ajaxMaterialCafeService();

		    ajaxGetMCPancakeSlider();
		    ajaxGetMCHashedBeefSlider();
		    ajaxGetMCDrinksSlider();
		});
	}
	fetchDataToMaterialCafePages();

	/*=======================================
	Add Ajax to the Download Company Profile Page 
	=========================================*/
	function fetchDataToDownloadPages() {
		$('body.page-template-download').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "POST",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                $.each(posts, function() {
		                    if (this.id === 83) {
		                        $('.p-top__download .download-row').prepend('<div class="col-lg-6 off-lg-3 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__download .title-box').find('p.desc').append(this.content);
		                    }               
		                });
		                
						$('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    ajaxGetPageContent();
		});
	}
	fetchDataToDownloadPages()

	/*=======================================
	Add Ajax to the Contact Page 
	=========================================*/
	function fetchDataToContactPages(){
		$('body.page-template-contact').each(function(index, el) {
			function ajaxGetPageContent(){
		        $.ajax({
		            url: adminUrl,
		            type: "POST",
		            data: "action=ajaxGetPageContent",
		            beforeSend: function(){
						//add loading icons
						var loading = '<div class="overlay"><div class="sp sp-circle"></div></div>';
						$('body').append(loading);
					},
		            success: function(results) {
		                var posts = JSON.parse(results);
		                $.each(posts, function() {
		                    if (this.id === 14) {
		                        $('.p-top__contact-elm .left .contact-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact-elm .left .contact-row .title-box').find('p.desc').append(this.content);
		                        
		                        $('.p-top__contact-elm .left').find('li.phone').append(this.phone);
		                        $('.p-top__contact-elm .left').find('li.email').append(this.email);
		                        $('.p-top__contact-elm .left').find('li.address').append(this.address);
		                    } else if (this.id === 68) {
		                        $('.p-top__contact-elm .contact-form .form-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact-elm .contact-form .form-row .title-box').find('p.desc').append(this.content);
		                    } else if (this.id === 211) {
		                        $('.p-top__contact-elm .contact-map .map-row').prepend('<div class="col-lg-12 title-box"><h1 class="title">'+this.name+'</h1><p class="desc"></p></div>');
		                        $('.p-top__contact-elm .contact-map .map-row .title-box').find('p.desc').append(this.content);
		                    }               
		                });

						$('body .overlay').remove();
		            },
		            error: function() {
		                console.log('Cannot retrieve data.');
		            }
		        });
		    }
		    ajaxGetPageContent();
		});
	}
	fetchDataToContactPages();

	/*=======================================
	Contact Page
	=========================================*/
	function contactPage(){
		var getHeightCt = $('.contact-form').innerHeight();
		

		// $('.contact-map').find('#map').css({'height': getHeightCt});
		// $('.contact-form').addClass('isOpen');
		// $('.contact-map').addClass('isClose');
		
		$('.map-open').on('click', function(e) {
			var ctformHasOpen = $('.contact-form').hasClass('isOpen');
			var ctformHasClose = $('.contact-form').hasClass('isClose');
			e.preventDefault();
			// console.log(!ctformHasOpen);
			if(!ctformHasOpen) {
				
					/* Act on the event */
					$('.contact-form').addClass('isOpen');
					$('.contact-form').removeClass('isClose');
					$('.contact-map').addClass('isClose');
					$('.contact-map').removeClass('isOpen');

			
			} else if (!ctformHasClose) {
	
					/* Act on the event */
					$('.contact-form').addClass('isClose');
					$('.contact-form').removeClass('isOpen');
					$('.contact-map').addClass('isOpen')
					$('.contact-map').removeClass('isClose');
				
			}
		});
		
	}
	contactPage();


	/*=======================================
	Mobile Menu
	=========================================*/
	function mobileMenu(){
		var searchIcon = $('.search-icons');
		var icons = searchIcon.children('.icons');
		var hasActiveSearch = $('.l-search-box').hasClass('isActive');

		var touchMenu = $('.mobile-menu');
		
		touchMenu.on('click', function(e) {
			$(this).parents().find('.navigation').each(function(index, el) {
				var hasActiveNav = $('.navigation').hasClass('isActive');

				if(!hasActiveNav) {
					$(this).addClass('isActive');
					$(this).removeClass('isClose');
					$('body').css({'overflow-y': 'hidden'});
				} else {
					$(this).removeClass('isActive');
					$(this).addClass('isClose');
					$('body').css({'overflow-y': 'scroll'});
				}
			});
		});

		if(w<=1024){
			if (!hasActiveSearch){
				touchMenu.on('click', function(e) {
					icons.addClass('isOpen').removeClass('isClose');
					
					$('.l-search-box').removeClass('isActive');
					$('.l-search-box').addClass('isClose');
				});
			} else {
				touchMenu.on('click', function(e) {
					icons.addClass('isClose').removeClass('isOpen');
					$('.l-search-box').removeClass('isClose');
					$('.l-search-box').addClass('isActive');
				});
			}
		}
		
		
	}
	mobileMenu();

	/*=======================================
	Search Box
	=========================================*/
	function searchBox() {

		var searchIcon = $('.search-icons');
		var icons = searchIcon.children('.icons');
		var searchBox = $('.l-search-box');

		var hasActiveNav = $('.navigation').hasClass('isActive');
		searchBox.each(function(index, el) {

			icons.addClass('isOpen');
			searchIcon.on('click', '.isOpen' , function(e) {
				e.preventDefault();
				/* Act on the event */
				$(this).addClass('isClose').removeClass('isOpen');
				searchBox.addClass('isActive').removeClass('isClose');	
				searchBox.find('.search-control').focus();
				$('body').css({'overflow-y': 'hidden'});
			});

			searchIcon.on('click', '.isClose' , function(e) {
				e.preventDefault();
				/* Act on the event */
				$(this).addClass('isOpen').removeClass('isClose');
				searchBox.removeClass('isActive').addClass('isClose');
				$('body').css({'overflow-y': 'scroll'});
			});

			if(w<=1024){
				if(!hasActiveNav) {
					searchIcon.on('click', '.isOpen' , function(e) {
						e.preventDefault();
						/* Act on the event */
						$('.navigation').removeClass('isActive');
						$('.navigation').addClass('isClose');
						$('body').css({'overflow-y': 'hidden'});
					});
					
				} else {
					searchIcon.on('click', '.isClose' , function(e) {
						e.preventDefault();
						/* Act on the event */
						
						$('.navigation').addClass('isActive');
						$('.navigation').removeClass('isClose');
						$('body').css({'overflow-y': 'scroll'});
					});
				}
			}
		});
		

	}
	searchBox();


	// this function remove white space in woocommerce-loop-category__title class
	function removeWhiteSpace() {
		$('.woocommerce-loop-category__title').each(function(index, el) {
			var Str = $(this).text();
			var trimStr = $.trim(Str);
			$(this).html(trimStr);
		});
		
	}
	removeWhiteSpace();

	if(w>640){// PCでの処理



	} else {// SPでの処理

		

	}


});

	





$(window).on('load', function(){// ロード完了時に処理



	// 横幅取得
	var w = $(window).width();


	if(w>640){// PCでの処理



	} else {// SPでの処理



	}




});




$(window).on('load resize', function(){// ロード完了、リサイズ時に処理


	// 横幅取得
	var w = $(window).width();


	if(w>640){// PCでの処理



	} else {// SPでの処理



	}


});