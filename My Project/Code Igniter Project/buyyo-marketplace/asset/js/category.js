$(document).ready(function(){"use strict";var t=$(".header");function e(){$(window).scrollTop()>91?t.addClass("scrolled"):t.removeClass("scrolled")}!function(){if($(".menu").length){var t=$(".hamburger"),e=$(".header"),i=$(".super_container_inner"),r=$(".super_overlay"),a=$(".header_overlay"),n=$(".menu"),o=!1;t.on("click",function(){i.toggleClass("active"),n.toggleClass("active"),e.toggleClass("active"),o=!0}),r.on("click",function(){o&&(i.toggleClass("active"),n.toggleClass("active"),e.toggleClass("active"),o=!1)}),a.on("click",function(){o&&(i.toggleClass("active"),n.toggleClass("active"),e.toggleClass("active"),o=!1)})}}(),$("img.svg").length&&jQuery("img.svg").each(function(){var t=jQuery(this),e=t.attr("id"),i=t.attr("class"),r=t.attr("src");jQuery.get(r,function(r){var a=jQuery(r).find("svg");void 0!==e&&(a=a.attr("id",e)),void 0!==i&&(a=a.attr("class",i+" replaced-svg")),a=a.removeAttr("xmlns:a"),t.replaceWith(a)},"xml")}),function(){var t=$(".item_sorting_btn");if($(".grid").length){var e=$(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{horizontalOrder:!0},getSortData:{price:function(t){var e=$(t).find(".product_price").text().replace("$","");return parseFloat(e)},name:".product_name"}});t.each(function(){$(this).on("click",function(){var t=$(this).parent().parent().find(".isotope_sorting_text span");t.text($(this).text());var i=$(this).attr("data-isotope-option");i=JSON.parse(i),e.isotope(i)})}),$(".item_filter_btn").on("click",function(){var t=$(this).parent().parent().find(".isotope_filter_text span");t.text($(this).text());var i=$(this).attr("data-filter");e.isotope({filter:i})})}}(),e(),$(window).on("resize",function(){e()}),$(document).on("scroll",function(){e()})});