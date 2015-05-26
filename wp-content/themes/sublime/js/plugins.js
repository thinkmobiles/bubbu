var $ = jQuery;
jQuery(document).ready(function () {
	
/*-----------------------------------------------------------------------------------*/
    /* Parallax
/*-----------------------------------------------------------------------------------*/
	if ($(window).width() > 969 || $(window).height() > 969) {
		$.stellar({
  verticalScrolling: true,
  horizontalScrolling: false,
  horizontalOffset: 0,
  verticalOffset: 50,
  responsive: true,
  scrollProperty: 'scroll',
  positionProperty: 'position',
  parallaxBackgrounds: true,
  parallaxElements: true,
  hideDistantElements: true,
  hideElement: function($elem) { $elem.hide(); },
  showElement: function($elem) { $elem.show(); }
});

	$('.bgimage').stellar();
};
/*-----------------------------------------------------------------------------------*/
    /* Menu
/*-----------------------------------------------------------------------------------*/
   // $('.btn-navbar').click(function(){
   //     $('#main-menu').toggle();
   // });
    
/*-----------------------------------------------------------------------------------*/
/* Tabs Widget
/*-----------------------------------------------------------------------------------*/
    jQuery(".tab_content").hide();
    jQuery("ul.tabs li:first").addClass("active").show();
    jQuery(".tab_content:first").show();
    jQuery("ul.tabs li").click(function () {
        jQuery("ul.tabs li").removeClass("active");
        jQuery(this).addClass("active");
        jQuery(".tab_content").hide();
        var activeTab = jQuery(this).find("a").attr("href");
        if (jQuery.browser.msie) {
            jQuery(activeTab).show();
        } else {
            jQuery(activeTab).fadeIn();
        }
        return false;
    });
				
		
		/*-----------------------------------------------------------------------------------*/
    /* Progress Bars
/*-----------------------------------------------------------------------------------*/

    setTimeout(function () {

        $('.progress .bar').each(function () {
            var me = $(this);
            var perc = me.attr("data-percentage");


            var current_perc = 0;

            var progress = setInterval(function () {
                if (current_perc >= perc) {
                    clearInterval(progress);
                } else {
                    current_perc += 1;
                    me.css('width', (current_perc) + '%');
                }

                me.text((current_perc) + '%');

            }, 20);

        });

    }, 900);
				
				$('.salesnum').html(function(i, v) {
    return v.replace(/(\d)/g, '<button class="btn">$1</button>');
});


    /*-----------------------------------------------------------------------------------*/
    /* Portfolio
/*-----------------------------------------------------------------------------------*/

    var jQuerydata = jQuery(".filter-posts").clone();

    jQuery('.filter-list li').click(function (e) {
        jQuery(".filter li").removeClass("active");
        // Use the last category class as the category to filter by.
        var filterClass = jQuery(this).attr('class').split(' ').slice(-1)[0];

        if (filterClass == 'all-projects') {
            var jQueryfilteredData = jQuerydata.find('.project');
        } else {
            var jQueryfilteredData = jQuerydata.find('.project[data-type~=' + filterClass + ']');
        }
        jQuery(".filter-posts").quicksand(jQueryfilteredData, {
            duration: 400,
           
            adjustHeight: 'auto',
        });
        jQuery(this).addClass("active");
        return false;
    });

    jQuery('#gallery-wrap').flexslider({
        animation: "slide",
        controlsContainer: ".flex-direction-nav",
        prevText: "&larr;",
        nextText: "&rarr;"
    });
		
		/*-----------------------------------------------------------------------------------*/
    /* Extend Pagebuilder
/*-----------------------------------------------------------------------------------*/

$(document.body).find('*').each(function() {
    if ($(this).hasClass('aq_span2')) {
        $(this).removeClass('aq_span2').addClass('span2');
    } else if ($(this).hasClass('aq_span3')) {
        $(this).removeClass('aq_span3').addClass('span3');
    } else if ($(this).hasClass('aq_span4')) {
        $(this).removeClass('aq_span4').addClass('span4');
    } else if ($(this).hasClass('aq_span5')) {
        $(this).removeClass('aq_span5').addClass('span5');
    } else if ($(this).hasClass('aq_span6')) {
        $(this).removeClass('aq_span6').addClass('span6');
    } else if ($(this).hasClass('aq_span7')) {
        $(this).removeClass('aq_span7').addClass('span7');
    } else if ($(this).hasClass('aq_span8')) {
        $(this).removeClass('aq_span8').addClass('span8');
    } else if ($(this).hasClass('aq_span9')) {
        $(this).removeClass('aq_span9').addClass('span9');
    } else if ($(this).hasClass('aq_span10')) {
        $(this).removeClass('aq_span10').addClass('span10');
    } else if ($(this).hasClass('aq_span11')) {
        $(this).removeClass('aq_span11').addClass('span11');
    } else if ($(this).hasClass('aq_span12')) {
        $(this).removeClass('aq_span12').addClass('span12');
    }
else if ($(this).hasClass('tab-body')) {
        $(this).removeClass('open').addClass('close');
    }
		});		

    /*-----------------------------------------------------------------------------------*/
    /* Testimonial Slider
/*-----------------------------------------------------------------------------------*/

    if (jQuery().flexslider) {
        $('.testimonials').each(function () {
            var slider_id = $(this).attr('id');
            $('#' + slider_id).flexslider({
                animation: 'fade',
                controlsContainer: '#' + slider_id + ' .testimonial-nav',
                slideshow: true,
                controlNav: false,
                directionNav: false,
                smoothHeight: false,
                touch: true,
                useCSS: true,
                prevText: "&larr;",
                nextText: "&rarr;",
            });
        });
    }
		
		/*-----------------------------------------------------------------------------------*/
    /* Tweets
/*-----------------------------------------------------------------------------------*/

    $(".tweet .e-entry-title").css("color", "#ffffff");

/*-----------------------------------------------------------------------------------*/
    /* Tooltips
/*-----------------------------------------------------------------------------------*/

    $('[data-tip]').each(function () {
        $(this).tooltip({
            placement: $(this).data('tip')
        });
    });

/*-----------------------------------------------------------------------------------*/
    /* Carousel
/*-----------------------------------------------------------------------------------*/
    
    $('.carousel').carousel({
        interval: false
    });
});


/*-----------------------------------------------------------------------------------*/
    /* Drop-down hover
/*-----------------------------------------------------------------------------------*/

/*
 * Project: Twitter Bootstrap Hover Dropdown
 * Author: Cameron Spear
 * Contributors: Mattia Larentis
 *
 * Dependencies?: Twitter Bootstrap's Dropdown plugin
 *
 * A simple plugin to enable twitter bootstrap dropdowns to active on hover and provide a nice user experience.
 *
 * No license, do what you want. I'd love credit or a shoutout, though.
 *
 * http://cameronspear.com/blog/twitter-bootstrap-dropdown-on-hover-plugin/
 */
(function (e, t, n) {
    var r = e();
    e.fn.dropdownHover = function (n) {
        r = r.add(this.parent());
        return this.each(function () {
            var n = e(this).parent(),
                i = {
                    delay: 500,
                    instantlyCloseOthers: !0
                }, s = {
                    delay: e(this).data("delay"),
                    instantlyCloseOthers: e(this).data("close-others")
                }, o = e.extend(!0, {}, i, o, s),
                u;
            n.hover(function () {
                o.instantlyCloseOthers === !0 && r.removeClass("open");
                t.clearTimeout(u);
                e(this).addClass("open")
            }, function () {
                u = t.setTimeout(function () {
                    n.removeClass("open")
                }, o.delay)
            })
        })
    };
    e('[data-hover="dropdown"]').dropdownHover()
})(jQuery, this);

//ROLL ON HOVER
$(function () {
    $(".mask").css("opacity", "0");
    $(".mask").hover(function () {
            $(this).stop().animate({
                opacity: .7
            }, "slow");
        },
        function () {
            $(this).stop().animate({
                opacity: 0
            }, "slow");
        });

});

/*-----------------------------------------------------------------------------------*/
    /* Back-to-top
/*-----------------------------------------------------------------------------------*/


jQuery(document).ready(function () {
    var didScroll = false;

    var $arrow = $('#back-to-top');

    $arrow.click(function (e) {
        $('body,html').animate({
            scrollTop: "0"
        }, 750, 'easeOutExpo');
        e.preventDefault();
    })

    $(window).scroll(function () {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            didScroll = false;

            if ($(window).scrollTop() > 1000) {
                $arrow.css('display', 'block');
            } else {
                $arrow.css('display', 'none');
            }
        }
    }, 250);
});

/*-----------------------------------------------------------------------------------*/
    /* FadeIn
/*-----------------------------------------------------------------------------------*/

$(window).load(function () {
    $('.sublimeFadeIn').waypoint(function () {


        $(this).find('.navbar-fadein').toggleClass('show animated fadeInDown');
        $(this).find('.parallax .container').toggleClass('show animated fadeInUp');
    }, {
        triggerOnce: true,
        offset: function () {
            return $(window).height() - $(this).outerHeight() + $(this).height() - 0;
        }
       
    });
});

/*-----------------------------------------------------------------------------------*/
    /* SlideIn
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
	if(typeof window.orientation !== 'undefined'){} else {
		var controller = $.superscrollorama({
			triggerAtCenter: false,
			playoutAnimations: true,
			enablePin:false
		});
		if ($('.pow').length){
					controller.addTween('.pow', 
	    TweenMax.from($('.pow'), .5, {css:{opacity: 0, right: '200px'}}), 0,  -800)
 
		}
		if ($('.stretch-banner').length){
					controller.addTween('.stretch-banner', 
	    TweenMax.from($('.stretch-banner'), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
); 
		}
		if ($('.blog-item .portfolio-project').length){
					controller.addTween('.home .portfolio-project', 
	    TweenMax.from($('.home .portfolio-project'), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
); 
		}
		if ($('.t-image').length){
					controller.addTween('.t-image', 
	    TweenMax.from($('.t-image'), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
); 
		}
		if ($('.twit-img').length){
					controller.addTween('.twit-img', 
	    TweenMax.from($('.twit-img'), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
); 
		}
		if ($('.client-banner img').length){
					controller.addTween('.client-banner img', 
	    TweenMax.from($('.client-banner img'), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
); 
		}
		
			if ($('.blog.span2').length){
		var postdata_i = 1;
		$( '.blog.span2' ).each( function(){
		
			var id = $(this).attr('id'); 
			if( postdata_i > 1 )
				controller.addTween('#'+id, TweenMax.from($('#'+id), .5, {css:{opacity: 0, right: '200px'}}), 0,  -800).each; 
			postdata_i = postdata_i + 1;
			
		});
		var postdata_i = 1;
		$( '.portfolio-project' ).each( function(){
		
			var id = $(this).attr('id'); 
			if( postdata_i > 1 )
				controller.addTween('#'+id, TweenMax.from($('#'+id), .5, {css: {opacity: 0, scale: 0 }, immediateRender: true, ease: Quad.easeInOut}), 0, -700, true
).each; 
			postdata_i = postdata_i + 1;
			
		});
			}
			}
	});

// Generated by CoffeeScript 1.4.0
/*
jQuery Waypoints - v2.0.2
Copyright (c) 2011-2013 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/
(function(){var t=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++){if(e in this&&this[e]===t)return e}return-1},e=[].slice;(function(t,e){if(typeof define==="function"&&define.amd){return define("waypoints",["jquery"],function(n){return e(n,t)})}else{return e(t.jQuery,t)}})(this,function(n,r){var i,o,l,s,f,u,a,c,h,d,p,y,v,w,g,m;i=n(r);c=t.call(r,"ontouchstart")>=0;s={horizontal:{},vertical:{}};f=1;a={};u="waypoints-context-id";p="resize.waypoints";y="scroll.waypoints";v=1;w="waypoints-waypoint-ids";g="waypoint";m="waypoints";o=function(){function t(t){var e=this;this.$element=t;this.element=t[0];this.didResize=false;this.didScroll=false;this.id="context"+f++;this.oldScroll={x:t.scrollLeft(),y:t.scrollTop()};this.waypoints={horizontal:{},vertical:{}};t.data(u,this.id);a[this.id]=this;t.bind(y,function(){var t;if(!(e.didScroll||c)){e.didScroll=true;t=function(){e.doScroll();return e.didScroll=false};return r.setTimeout(t,n[m].settings.scrollThrottle)}});t.bind(p,function(){var t;if(!e.didResize){e.didResize=true;t=function(){n[m]("refresh");return e.didResize=false};return r.setTimeout(t,n[m].settings.resizeThrottle)}})}t.prototype.doScroll=function(){var t,e=this;t={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};if(c&&(!t.vertical.oldScroll||!t.vertical.newScroll)){n[m]("refresh")}n.each(t,function(t,r){var i,o,l;l=[];o=r.newScroll>r.oldScroll;i=o?r.forward:r.backward;n.each(e.waypoints[t],function(t,e){var n,i;if(r.oldScroll<(n=e.offset)&&n<=r.newScroll){return l.push(e)}else if(r.newScroll<(i=e.offset)&&i<=r.oldScroll){return l.push(e)}});l.sort(function(t,e){return t.offset-e.offset});if(!o){l.reverse()}return n.each(l,function(t,e){if(e.options.continuous||t===l.length-1){return e.trigger([i])}})});return this.oldScroll={x:t.horizontal.newScroll,y:t.vertical.newScroll}};t.prototype.refresh=function(){var t,e,r,i=this;r=n.isWindow(this.element);e=this.$element.offset();this.doScroll();t={horizontal:{contextOffset:r?0:e.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:e.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?n[m]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return n.each(t,function(t,e){return n.each(i.waypoints[t],function(t,r){var i,o,l,s,f;i=r.options.offset;l=r.offset;o=n.isWindow(r.element)?0:r.$element.offset()[e.offsetProp];if(n.isFunction(i)){i=i.apply(r.element)}else if(typeof i==="string"){i=parseFloat(i);if(r.options.offset.indexOf("%")>-1){i=Math.ceil(e.contextDimension*i/100)}}r.offset=o-e.contextOffset+e.contextScroll-i;if(r.options.onlyOnScroll&&l!=null||!r.enabled){return}if(l!==null&&l<(s=e.oldScroll)&&s<=r.offset){return r.trigger([e.backward])}else if(l!==null&&l>(f=e.oldScroll)&&f>=r.offset){return r.trigger([e.forward])}else if(l===null&&e.oldScroll>=r.offset){return r.trigger([e.forward])}})})};t.prototype.checkEmpty=function(){if(n.isEmptyObject(this.waypoints.horizontal)&&n.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([p,y].join(" "));return delete a[this.id]}};return t}();l=function(){function t(t,e,r){var i,o;r=n.extend({},n.fn[g].defaults,r);if(r.offset==="bottom-in-view"){r.offset=function(){var t;t=n[m]("viewportHeight");if(!n.isWindow(e.element)){t=e.$element.height()}return t-n(this).outerHeight()}}this.$element=t;this.element=t[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=e;this.enabled=r.enabled;this.id="waypoints"+v++;this.offset=null;this.options=r;e.waypoints[this.axis][this.id]=this;s[this.axis][this.id]=this;i=(o=t.data(w))!=null?o:[];i.push(this.id);t.data(w,i)}t.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback!=null){this.callback.apply(this.element,t)}if(this.options.triggerOnce){return this.destroy()}};t.prototype.disable=function(){return this.enabled=false};t.prototype.enable=function(){this.context.refresh();return this.enabled=true};t.prototype.destroy=function(){delete s[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};t.getWaypointsByElement=function(t){var e,r;r=n(t).data(w);if(!r){return[]}e=n.extend({},s.horizontal,s.vertical);return n.map(r,function(t){return e[t]})};return t}();d={init:function(t,e){var r;if(e==null){e={}}if((r=e.handler)==null){e.handler=t}this.each(function(){var t,r,i,s;t=n(this);i=(s=e.context)!=null?s:n.fn[g].defaults.context;if(!n.isWindow(i)){i=t.closest(i)}i=n(i);r=a[i.data(u)];if(!r){r=new o(i)}return new l(t,r,e)});n[m]("refresh");return this},disable:function(){return d._invoke(this,"disable")},enable:function(){return d._invoke(this,"enable")},destroy:function(){return d._invoke(this,"destroy")},prev:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e>0){return t.push(n[e-1])}})},next:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e<n.length-1){return t.push(n[e+1])}})},_traverse:function(t,e,i){var o,l;if(t==null){t="vertical"}if(e==null){e=r}l=h.aggregate(e);o=[];this.each(function(){var e;e=n.inArray(this,l[t]);return i(o,e,l[t])});return this.pushStack(o)},_invoke:function(t,e){t.each(function(){var t;t=l.getWaypointsByElement(this);return n.each(t,function(t,n){n[e]();return true})});return this}};n.fn[g]=function(){var t,r;r=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(d[r]){return d[r].apply(this,t)}else if(n.isFunction(r)){return d.init.apply(this,arguments)}else if(n.isPlainObject(r)){return d.init.apply(this,[null,r])}else if(!r){return n.error("jQuery Waypoints needs a callback function or handler option.")}else{return n.error("The "+r+" method does not exist in jQuery Waypoints.")}};n.fn[g].defaults={context:r,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};h={refresh:function(){return n.each(a,function(t,e){return e.refresh()})},viewportHeight:function(){var t;return(t=r.innerHeight)!=null?t:i.height()},aggregate:function(t){var e,r,i;e=s;if(t){e=(i=a[n(t).data(u)])!=null?i.waypoints:void 0}if(!e){return[]}r={horizontal:[],vertical:[]};n.each(r,function(t,i){n.each(e[t],function(t,e){return i.push(e)});i.sort(function(t,e){return t.offset-e.offset});r[t]=n.map(i,function(t){return t.element});return r[t]=n.unique(r[t])});return r},above:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset<=t.oldScroll.y})},below:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset>t.oldScroll.y})},left:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset<=t.oldScroll.x})},right:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset>t.oldScroll.x})},enable:function(){return h._invoke("enable")},disable:function(){return h._invoke("disable")},destroy:function(){return h._invoke("destroy")},extendFn:function(t,e){return d[t]=e},_invoke:function(t){var e;e=n.extend({},s.vertical,s.horizontal);return n.each(e,function(e,n){n[t]();return true})},_filter:function(t,e,r){var i,o;i=a[n(t).data(u)];if(!i){return[]}o=[];n.each(i.waypoints[e],function(t,e){if(r(i,e)){return o.push(e)}});o.sort(function(t,e){return t.offset-e.offset});return n.map(o,function(t){return t.element})}};n[m]=function(){var t,n;n=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(h[n]){return h[n].apply(null,t)}else{return h.aggregate.call(null,n)}};n[m].settings={resizeThrottle:100,scrollThrottle:30};return i.load(function(){return n[m]("refresh")})})}).call(this);

/*!
 * imagesLoaded PACKAGED v3.0.2
 * JavaScript is all like "You images are done yet or what?"
 */

(function(e){"use strict";function t(){}function n(e,t){if(r)return t.indexOf(e);for(var n=t.length;n--;)if(t[n]===e)return n;return-1}var i=t.prototype,r=Array.prototype.indexOf?!0:!1;i._getEvents=function(){return this._events||(this._events={})},i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,t){var i,r=this.getListenersAsObject(e);for(i in r)r.hasOwnProperty(i)&&-1===n(t,r[i])&&r[i].push(t);return this},i.on=i.addListener,i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,t){var i,r,s=this.getListenersAsObject(e);for(r in s)s.hasOwnProperty(r)&&(i=n(t,s[r]),-1!==i&&s[r].splice(i,1));return this},i.off=i.removeListener,i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,s=e?this.removeListener:this.addListener,o=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)s.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?s.call(this,i,r):o.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.emitEvent=function(e,t){var n,i,r,s=this.getListenersAsObject(e);for(i in s)if(s.hasOwnProperty(i))for(n=s[i].length;n--;)r=t?s[i][n].apply(null,t):s[i][n](),r===!0&&this.removeListener(e,s[i][n]);return this},i.trigger=i.emitEvent,i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},"function"==typeof define&&define.amd?define(function(){return t}):e.EventEmitter=t})(this),function(e){"use strict";var t=document.documentElement,n=function(){};t.addEventListener?n=function(e,t,n){e.addEventListener(t,n,!1)}:t.attachEvent&&(n=function(t,n,i){t[n+i]=i.handleEvent?function(){var t=e.event;t.target=t.target||t.srcElement,i.handleEvent.call(i,t)}:function(){var n=e.event;n.target=n.target||n.srcElement,i.call(t,n)},t.attachEvent("on"+n,t[n+i])});var i=function(){};t.removeEventListener?i=function(e,t,n){e.removeEventListener(t,n,!1)}:t.detachEvent&&(i=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var r={bind:n,unbind:i};"function"==typeof define&&define.amd?define(r):e.eventie=r}(this),function(e){"use strict";function t(e,t){for(var n in t)e[n]=t[n];return e}function n(e){return"[object Array]"===a.call(e)}function i(e){var t=[];if(n(e))t=e;else if("number"==typeof e.length)for(var i=0,r=e.length;r>i;i++)t.push(e[i]);else t.push(e);return t}function r(e,n){function r(e,n,o){if(!(this instanceof r))return new r(e,n);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=i(e),this.options=t({},this.options),"function"==typeof n?o=n:t(this.options,n),o&&this.on("always",o),this.getImages(),s&&(this.jqDeferred=new s.Deferred);var h=this;setTimeout(function(){h.check()})}function a(e){this.img=e}r.prototype=new e,r.prototype.options={},r.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);for(var i=n.querySelectorAll("img"),r=0,s=i.length;s>r;r++){var o=i[r];this.addImage(o)}}},r.prototype.addImage=function(e){var t=new a(e);this.images.push(t)},r.prototype.check=function(){function e(e,r){return t.options.debug&&h&&o.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var s=this.images[r];s.on("confirm",e),s.check()}},r.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emit("progress",this,e),this.jqDeferred&&this.jqDeferred.notify(this,e)},r.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emit(e,this),this.emit("always",this),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},s&&(s.fn.imagesLoaded=function(e,t){var n=new r(this,e,t);return n.jqDeferred.promise(s(this))});var f={};return a.prototype=new e,a.prototype.check=function(){var e=f[this.img.src];if(e)return this.useCached(e),void 0;if(f[this.img.src]=this,this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this.proxyImage=new Image;n.bind(t,"load",this),n.bind(t,"error",this),t.src=this.img.src},a.prototype.useCached=function(e){if(e.isConfirmed)this.confirm(e.isLoaded,"cached was confirmed");else{var t=this;e.on("confirm",function(e){return t.confirm(e.isLoaded,"cache emitted confirmed"),!0})}},a.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},a.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},a.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindProxyEvents()},a.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindProxyEvents()},a.prototype.unbindProxyEvents=function(){n.unbind(this.proxyImage,"load",this),n.unbind(this.proxyImage,"error",this)},r}var s=e.jQuery,o=e.console,h=o!==void 0,a=Object.prototype.toString;"function"==typeof define&&define.amd?define(["eventEmitter","eventie"],r):e.imagesLoaded=r(e.EventEmitter,e.eventie)}(window);