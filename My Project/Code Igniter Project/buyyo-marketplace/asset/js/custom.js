$(document).ready(function(){"use strict";var e=$(".header");function o(){$(window).scrollTop()>91?e.addClass("scrolled"):e.removeClass("scrolled")}!function(){if($(".menu").length){var e=$(".hamburger"),o=$(".header"),t=$(".super_container_inner"),s=$(".super_overlay"),l=$(".header_overlay"),a=$(".menu"),i=!1;e.on("click",function(){t.toggleClass("active"),a.toggleClass("active"),o.toggleClass("active"),i=!0}),s.on("click",function(){i&&(t.toggleClass("active"),a.toggleClass("active"),o.toggleClass("active"),i=!1)}),l.on("click",function(){i&&(t.toggleClass("active"),a.toggleClass("active"),o.toggleClass("active"),i=!1)})}}(),function(){if($(".home_slider").length){var e=$(".home_slider");if(e.owlCarousel({items:1,autoplay:!1,loop:!0,mouseDrag:!0,smartSpeed:1200,nav:!1,dots:!1,responsive:{0:{mouseDrag:!0},558:{mouseDrag:!1}}}),$(".home_slider_nav_prev").length){var o=$(".home_slider_nav_prev");o.on("click",function(){e.trigger("prev.owl.carousel")})}if($(".home_slider_nav_next").length){var t=$(".home_slider_nav_next");t.on("click",function(){e.trigger("next.owl.carousel")})}$(".home_slider_custom_dot").length&&$(".home_slider_custom_dot").on("click",function(){$(".home_slider_custom_dot").removeClass("active"),$(this).addClass("active"),e.trigger("to.owl.carousel",[$(this).index(),1200])}),e.on("changed.owl.carousel",function(e){$(".home_slider_custom_dot").removeClass("active"),$(".home_slider_custom_dots li").eq(e.page.index).addClass("active")})}}(),$("img.svg").length&&jQuery("img.svg").each(function(){var e=jQuery(this),o=e.attr("id"),t=e.attr("class"),s=e.attr("src");jQuery.get(s,function(s){var l=jQuery(s).find("svg");void 0!==o&&(l=l.attr("id",o)),void 0!==t&&(l=l.attr("class",t+" replaced-svg")),l=l.removeAttr("xmlns:a"),e.replaceWith(l)},"xml")}),o(),$(window).on("resize",function(){o()}),$(document).on("scroll",function(){o()})});