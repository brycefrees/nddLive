function updateViewportDimensions(){var t=window,e=document,i=e.documentElement,a=e.getElementsByTagName("body")[0],n=t.innerWidth||i.clientWidth||a.clientWidth,o=t.innerHeight||i.clientHeight||a.clientHeight;return{width:n,height:o}}function loadGravatars(){viewport=updateViewportDimensions(),viewport.width>=768&&jQuery(".comment img[data-gravatar]").each(function(){jQuery(this).attr("src",jQuery(this).attr("data-gravatar"))})}var viewport=updateViewportDimensions(),waitForFinalEvent=function(){var t={};return function(e,i,a){a||(a="Don't call this twice without a uniqueId"),t[a]&&clearTimeout(t[a]),t[a]=setTimeout(e,i)}}(),timeToWaitForLast=100;jQuery(document).ready(function($){$(".carousel-indicators li:first").addClass("active"),$(".carousel-inner .item:first").addClass("active"),$("#myCarousel .item img").load().delay(400).fadeTo(1e3,1),$("body.post-type-archive-projects").mixItUp(),$("#myCarousel").swiperight(function(){$(this).carousel("prev")}),$("#myCarousel").swipeleft(function(){$(this).carousel("next")}),$(".entry-content").each(function(t){$(this).delay(200*t++).fadeTo(1e3,1)}),$("body.page-template-page-two-column a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")||location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html,body").animate({scrollTop:t.offset().top},1e3),!1}}),loadGravatars()});