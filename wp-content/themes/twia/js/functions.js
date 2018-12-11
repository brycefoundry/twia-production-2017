
jQuery(function($){

	$(document).ready(function(){
		
		init = function(){
			//Load components like home modules and menu navigation
			components();

			//Load functions to trigger animations and intros sequences
      		globaleffects();

      		
		}

		globaleffects = function(){
			

			if ($(".animated")[0]){
			    // Do something if class exists
			    waypointAnimation();
			} else {
			    // Do something if class does not exist
			}

			$(document).on('click', 'a[href^="#"]', function (event) {
			    event.preventDefault();

			    $('html, body').animate({
			        scrollTop: $($.attr(this, 'href')).offset().top
			    }, 500);
			});

		}

		components = function(){
			menu();
			mobilemenu();
			sidenav();
			expandible();
			contentselector();
			loadmasthead();
			richrotator();

			if($('body').hasClass('home')){
				home();
			}

			if($('body').hasClass('page-template-agents')){
				agents();

			}

			if($('body').hasClass('page-template-windstorm')){
				wind();

			}

			if($('body').hasClass('page-template-about')){
				about();

			}

			if($('body').hasClass('page-template-contact')){
				contact();

			}

			if($('body').hasClass('post-type-archive-find_agent')){
				findagent();

			}

			if($('.entry-content').length){
				expandableMenu();
			}

			if($('.page-template-wpi-3-application').length){
				wpi3();
			}

			if($('.alert-container').length){
				alert();
			}

			if($('.alert-fixed-container').length){
				alert();
			}

		}

		alert = function(){
			$(function() {
			      $('#severity-bar').barrating({
			        theme: 'bars-pill',
			        showValues: true,
			        readonly: true,
			        showSelectedRating: false
			      });
			   });

			var x = getCookie('weatheralert');

			if(x){
				
			}else{
				if($('.alert-fixed-container').length){
					$('body').addClass('alert-fixed');
				}

				if($('.alert-container').length){
					$('body').addClass('alert');
				}
				

			}


			$('.close-btn').click(function(){
				$('body').removeClass('alert');
				$('body').removeClass('alert-fixed');
				setCookie('weatheralert','yes',7);
			});

			


		}

	

		function setCookie(name,value,days) {
		    var expires = "";
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime() + (days*24*60*60*1000));
		        expires = "; expires=" + date.toUTCString();
		    }
		    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
		}
		function getCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}

		

		richrotator = function(){
			if($('.media-rotator').length){
				$('.media-rotator').slick({
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
					arrows: false,
					adaptiveHeight: true
	      		});
			}
			
		}

		expandableMenu = function(){
			

			$('.accordion-toggle').click(function(){
				$(this).parent().next().toggleClass('in');
				$(this).toggleClass('active');
			});

			$('.nav-tabs li a').click(function(){
				//console.log($(this).attr('href'));
				var el = $(this).attr('href');

				var joined = '#' + el;
				

				//console.log(joined);

				$('.nav-tabs li').removeClass('active');
				$(this).parent().toggleClass('active');


				
				$('.tab-pane').removeClass('in');
				$('.tab-pane').removeClass('active');


				$(el).toggleClass('active');
				$(el).toggleClass('in');



			});
		}

		loadmasthead = function(){
			$('.loaded').imagesLoaded( { background: true }, function() {
			  	setTimeout(function(){
			  		$('body').addClass('enter');
			  	},500);
			  	$('.loader-container').addClass('leave');
			});

		}

		findagent = function(){
      	
		}

		home = function(){

			

			

			

			var waypoint = new Waypoint({
			  element: document.getElementById('home-section-3'),
			  handler: function(direction) {
			  	if(direction=='down'){
			  		$('#home-section-3').addClass('waypoint');
			  	}else{			  		
			  		$('#home-section-3').removeClass('waypoint');
			  	}
			  
			  },
			  offset: "50%"
			})
			var el = document.getElementById("home-section-3");
			var ticknum1 = el.getAttribute('data-a');
			var ticknum2 = el.getAttribute('data-b');
			var ticknum3 = el.getAttribute('data-c');
			var ticknum4 = el.getAttribute('data-d');

			var waypoint = new Waypoint({
			  element: document.getElementById('stats'),
			  handler: function(direction) {
			  	if(direction=='down'){
			  		$('#tick-num-1').animateNumber({ number: ticknum1}, 2000 );
			  		$('#tick-num-2').animateNumber({ number: ticknum2}, 2000 );
			  		$('#tick-num-3').animateNumber({ 
			  			number: ticknum3,
			  			numberStep: function(now, tween) {
			  			        
			  			        var formatted = now.toFixed(0).replace(/(\d+)(\d{3})/, '$1'+','+'$2');
			  			        $(tween.elem).text(formatted);
			  			}
			  		}, 2000 );
			  		$('#tick-num-4').animateNumber({ 
			  			number: ticknum4,
			  			numberStep: function(now, tween) {
			  			        
			  			        var formatted = now.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
			  			        $(tween.elem).text('$' + formatted);
			  			}
			  			},  2000 );
			  	}else{			  		
			  		$('#tick-num-1').animateNumber({ number: 0 }, 500);
			  		$('#tick-num-2').animateNumber({ number: 0 }, 500);
			  		$('#tick-num-3').animateNumber({ number: 0 }, 500);
			  		$('#tick-num-4').animateNumber({ number: 0 }, 500);
			  	}
			  
			  },
			  offset: "70%"
			})



			var waypoint = new Waypoint({
			  element: document.getElementById('home-section-4'),
			  handler: function(direction) {
			  	if(direction=='down'){
			  		$('#home-section-4').addClass('waypoint');
			  	}else{			  		
			  		$('#home-section-4').removeClass('waypoint');
			  	}
			  
			  },
			  offset: "50%"
			})

			var waypoint = new Waypoint({
			  element: document.getElementById('home-section-5'),
			  handler: function(direction) {
			  	if(direction=='down'){
			  		$('#home-section-5').addClass('waypoint');
			  	}else{			  		
			  		$('#home-section-5').removeClass('waypoint');
			  	}
			  
			  },
			  offset: 100
			})

			
			
		}

		contact = function(){
			$('.gfield_select').select2({
      			minimumResultsForSearch: Infinity
			    

			});			
		}

		wpi3 = function(){
			$('.ui-datepicker-month').select2({
      			minimumResultsForSearch: Infinity
			    

			});	

			if(jQuery('#gform_confirmation_message_19').length){
				jQuery('body').addClass('wpi3-success');
			}

			
		}

		agents = function(){
			

		}

		wind = function(){
			
		}

		about = function(){
			
		}

		expandible = function(){
			if($('.expandible-module').length){
				$('li.tier-1').click(function(){
					$(this).toggleClass('active');
					$(this).find('ul.tier-2').toggleClass('active');
				});
			}
		}

		contentselector = function(){
			if($('.content-selector-module').length){
				$('.content-selector-module .links li').click(function(){
					$('.content-selector-module .active').removeClass('active');
					$(this).addClass('active');
					var pos = $(this).index();
					$('.content-selector-module .content li.parent').removeClass('active');
					$('.content-selector-module .content li.parent').eq(pos).addClass('active');
				});

				$('.content-selector-module .content.box li.parent').each(function(){

					var leftHeight = $(this).find('.left').height();
					var rightHeight = $(this).find('.right').height();

					console.log(leftHeight + " " + rightHeight);
				});
			}
		}

		sidenav = function(){
			
			if($('.left-side-nav').length){
				
				var ppWaypoint = $('.sidenav-start').waypoint(function(direction) {
				    //check the direction
				    if(direction == 'down') {
				       
				  		$('.left-side-nav').addClass('sticky');
				        
				    }else{
				    	
				    	$('.left-side-nav').removeClass('sticky');
				    	$('.left-side-nav').removeClass('withmenu');
				    }
				}, {
				    //Set the offset
				    offset: '0'
				});
			}else if($('.right-side-nav').length){
				var ppWaypoint = $('.sidenav-start').waypoint(function(direction) {
				    //check the direction
				    if(direction == 'down') {
				       
				  		$('.right-side-nav').addClass('sticky');
				        
				    }else{
				    	
				    	$('.right-side-nav').removeClass('sticky');
				    	$('.right-side-nav').removeClass('withmenu');
				    }
				}, {
				    //Set the offset
				    offset: '0'
				});
			}else{

			}

			$(".left-side-nav button").click(function() {
				var offset = 0; //Offset of 0px

				var anchor = this.getAttribute('data-anchor');
				//$(".left-side-nav li.active").removeClass('active');
				//$(".left-side-nav li button[data-anchor='"+anchor+"']").parent().addClass('active');

				var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '#' + anchor;
				

				 if($('body.page-template-wpi-3-application').length){


				 }else{
				 	window.history.pushState({path:newurl},'',newurl);
				 }

			    $('html, body').animate({
			        scrollTop: $("#" + anchor).offset().top + offset
			    }, 600);
			});

			


			

			var ppWaypoint = $('.sidenav-section').waypoint(function(direction) {

			    if(direction == 'down') {
			        
				    

				    
				   
				   
				    if($('body.page-template-wpi-3-application').length){
				    	var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
				    					    
						DOMElement = $(this.element);
					    sectionID = $(this.element).attr('id');
					  
					    if(scrollTop>400){

			    		    
			    		   
					    	$(".left-side-nav li.active").removeClass('active');
					    	
					    	$(".left-side-nav li button[data-anchor='"+sectionID+"']").parent().addClass('active');
					    }else{
					    	//Do Nothing
					    }
				    }else{
				    		DOMElement = $(this.element);
				    	    sectionID = $(this.element).attr('id');
				    	    $(".left-side-nav li.active").removeClass('active');
				    	    
				    	    $(".left-side-nav li button[data-anchor='"+sectionID+"']").parent().addClass('active');
				    	  	var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '#' + sectionID;
				    		window.history.pushState({path:newurl},'',newurl);
				    }
				  
			    }
			}, {
			    offset: 100
			});

			/*if($('body.page-template-wpi-3-application').length){
				setTimeout(function(){
					$(".left-side-nav li.active").removeClass('active');
				},400);
			}*/

			var ppWaypoint = $('.sidenav-section').waypoint(function(direction) {
			    if(direction == 'up') {
			       var DOMElement = $(this.element);
			        sectionID = $(this.element).attr('id');
			       $(".left-side-nav li.active").removeClass('active');
			       $(".left-side-nav li button[data-anchor='"+sectionID+"']").parent().prev().addClass('active');
			       
		       		

		       		if($('body.page-template-wpi-3-application').length){
		       			//No Hashing Exception
		       		}else{
			       		var urlID = $('#' + sectionID).prev().attr('id');
			       		if(urlID==null){
			       			 	var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
			       				window.history.pushState({path:newurl},'',newurl);
			       		}else{
		       			 	var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '#' + urlID;
		       				window.history.pushState({path:newurl},'',newurl);
			       		}
		       		}
			       	 	
			       
			       	

			    }
			}, {
			    //Set the offset
			    offset: 100
			});
			var bottom = $(".left-side-nav li:last-child button").attr('data-anchor');

			/**var ppWaypoint = $("#"+bottom).waypoint(function(direction) {
			    if(direction == 'down') {
			       var bottom = $(".left-side-nav li:last-child button").attr('data-anchor');
			       $(".left-side-nav li.active").removeClass('active');
			       $(".left-side-nav li:last-child").addClass('active');
			        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '#' + bottom;
			       	window.history.pushState({path:newurl},'',newurl);

			    }
			}, {
			    //Set the offset
			    offset: 'bottom-in-view'
			});*/

			
		}

		

		menu = function(){
			if($("#rich-nav-links li").length){
				var list_collection = $( "#rich-nav-links" );

				if($("#rich-nav-links li").eq(1).length){
					var list_item_one = $( "#rich-nav-links li" ).eq(1);
					var offset = list_item_one.offset().left - list_collection.offset().left;

					var rich_nav_one = $("#nav-rich-dropdowns li").eq(1);
					$("#nav-rich-dropdowns li:nth-child(2)").css('left', offset);
				}

				if($("#rich-nav-links li").eq(2).length){
					var list_item_two = $( "#rich-nav-links li" ).eq(2);
					var offset = list_item_two.offset().left - list_collection.offset().left;

					var rich_nav_one = $("#nav-rich-dropdowns li").eq(2);
					$("#nav-rich-dropdowns li:nth-child(3)").css('left', offset);
				}


				
			}else{
				
			}
			

			
			

      		$('.login-dropdown').select2({
      			placeholder: "Select",
			    minimumResultsForSearch: Infinity
			    

			});

			


			

      		var timer; 
			$("#rich-nav-links li.dropdown").hover(function(){
				clearTimeout(timer);
				el = $(this);
				
				openSubmenunav(el);
			}, function(){
				el = $(this);
				timer = setTimeout("closeSubmenunav(el)", 1000);
			});

			$('.dropdown-container').hover(function(){
				clearTimeout(timer);
				el = $(this);
				
				openSubmenucontainer(el);
				
				
			},function(){
				el = $(this);
				timer = setTimeout("closeSubmenucontainer(el)", 1000);
			});


			openSubmenunav = function(el){
				var pos = $(el).index();
				
				$("#rich-nav-links li").removeClass('active');
				$(el).addClass('active');
				$(".dropdown-container").removeClass('active');
				$(".dropdown-container").eq(pos).addClass('active');
			}

			closeSubmenunav = function(el){
				pos = $(el).index();
				elem = $(el);
				
				$(".dropdown-container").eq(pos).removeClass('active');
				$(elem).removeClass('active');
			}


			openSubmenucontainer = function(el){
				var pos = $(el).index();
				
				$(".dropdown-container").removeClass('active');
				$(el).addClass('active');
				$("#rich-nav-links li").removeClass('active');
				$("#rich-nav-links li").eq(pos).addClass('active');
			}

			closeSubmenucontainer = function(el){
				pos = $(el).index();
				elem = $(el);
				$("#rich-nav-links li").eq(pos).removeClass('active');
				$(elem).removeClass('active');
			}

			


			

			
			
			var windowwidth = $(window).width();
			
			if(windowwidth>965){
				fixednav();
			}else{
				//Do Nothing
				$('body').addClass('sticky');
			}

			

			
		}


		fixednav = function(){

			
			var iScrollPos = 500;

			$(window).scroll(function () {
			    var iCurScrollPos = $(this).scrollTop();
			    if (iCurScrollPos > iScrollPos) {
			        //down

			        if($('.left-side-nav').length){
			        	$('header').addClass('static');
			        }else if($('.right-side-nav').length){
			        	$('header').addClass('static');
			    	}else{
			        	//

			        	$('body').removeClass('sticky');
			        	$('.left-side-nav').removeClass('withmenu');
			        	

			        	if(iCurScrollPos>200){
			        		$('body').addClass('setup');
			        	}
			        }
			        
			    } else {
			    	if($('.left-side-nav').length){
			    		$('header').addClass('static');
			    	}else if($('.right-side-nav').length){
			    		$('header').addClass('static');
			    	}else{
			    		$('body').addClass('sticky');
			    		$('body').removeClass('setup');
			    		$('.left-side-nav').addClass('withmenu');
			    	}
			        
			        //up
			    }
			    iScrollPos = iCurScrollPos;
			});
		}

		mobilemenu = function(){
			$('#nav-links .mobile-expand-btn').click(function(){
				$(this).toggleClass('open');
				$(this).prev().toggleClass('open');

			});	

			$('#menu-btn').click(function(){
				$(this).toggleClass('open');
				$('.nav-container').toggleClass('open');
				$('body').toggleClass('disable');
				
			});	
		}

		waypointAnimation = function(){


		    var ppWaypoint = $('.animated').waypoint(function(direction) {
		        //check the direction
		        if(direction == 'down') {
		            //add the class to start the animation
		            $(this.element).addClass('show');
		            //then destroy this waypoint, we don't need it anymore
		            
		        }
		    }, {
		        //Set the offset
		        offset: '100%'
		    });

		    var ppWaypoint = $('.animated').waypoint(function(direction) {
		        //check the direction
		        if(direction == 'up') {
		            //add the class to start the animation
		            $(this.element).removeClass('show');
		            //then destroy this waypoint, we don't need it anymore
		            
		        }
		    }, {
		        //Set the offset
		        offset: '100%'
		    });



		 
		}

		MenuOpenCloseErgoTimer = function(dDelay, fActionFunction, node){
		    if (typeof this.delayTimer == "number") {
		        clearTimeout (this.delayTimer);
		        this.delayTimer = '';
		    }
		    if (node)
		        this.delayTimer     = setTimeout (function() { fActionFunction (node); }, dDelay);
		    else
		        this.delayTimer     = setTimeout (function() { fActionFunction (); }, dDelay);
		}

		

		

		init();
	});


	
});