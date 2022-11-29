var mitch_home_url = $("body").attr("data-mitch-home-url");
var mitch_ajax_url = $("body").attr("data-mitch-ajax-url");
var mitch_logged_in = $("body").attr("data-mitch-logged-in");
var mitch_current_lang = $("body").attr("data-mitch-current-lang");
$(document).on('click', '.close-app', function () {
  $(this).parent().parent().removeClass('active');
  $('.main-header').removeClass('mobile-top');
});

if ($('body').hasClass('rtl')) {
  var is_ar = true;
} else {
  var is_ar = false;
}

$('.checkbox-section .checkbox-inline').on('click', function () {
  $(this).toggleClass('active');
});

$('.burger').on('click', function () {
  $(this).toggleClass('active');
  $('.panel').toggleClass('active');
})
// $(' .mobile-nav li.has-menu').on('click', function () {
//     $(this).addClass('active');
//     $(".sub-menu").slideDown();
// })
// $(' .mobile-nav li.has-menu.active').on('click', function () {
//     $(this).removeClass('active');
//     $(".sub-menu").slideUp();
// })

$(document).on('click', '.mobile-nav li.has-menu:not(.active)', function () {
  $('.mobile-nav li.has-menu').addClass('active');
  $(".sub-menu").slideUp();

  $(this).addClass('active');
  $(".sub-menu").slideDown();
});

$(document).on('click', '.mobile-nav li.has-menu.active', function () {
  $('.sub-menu').slideUp();
  $(this).removeClass('active');
});

$(window).bind("load", function () {
  $('.review-list').slick({
    lazyLoad: 'progressive',
    rtl: is_ar,
    slidesToShow: 6,
    slidesToScroll: 6,
    arrows: true,
    infinite: false,
    speed: 500,
    prevArrow: '<div class="slick-prev-button"><span></span></div>',
    nextArrow: '<div class="slick-next-button"><span></span></div>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 999,
        // settings: "unslick",
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 767,
        // settings: "unslick",
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

$('.custom-switch .option').on('click', function (e) {
  // $('.form-row.show').removeClass('show');
  // $('.form-row').each(function(i, obj) {
  // 	if($(this).hasClass('show')){
  // 	  $(this).hide()
  // 	}
  // });
  var target = $(this).attr('data-target');
  console.log('hena ' + target);
  $('.custom-switch .option').removeClass('active')
  $(this).addClass('active');
  $(".products").attr("data-cat", target);
  $(".spinner").show();
  $(".products").attr("data-page", 1);
  $(".spinner").attr("data-page", 1);
  $posts_per_page = 8;
  get_products_ajax_count('test');
  setTimeout(() => {
    get_products_ajax("filter", "desktop");
  }, 200);
  // $('.blogs .form-row').removeClass('show');
  // $('#' + target).addClass('show');

  e.preventDefault();
})

// $('.option.all').on('click', function (e) {
// 	$('.form-row ').show();


// })
//ajax

jQuery(window).scroll(function () {
  if ($(".spinner").is(":visible")) {
    if ($(".product_widget").length) {
      Footeroffset = jQuery(".product_widget").last().offset().top;
    }
    winPosBtn = jQuery(window).scrollTop();
    winH = jQuery(window).outerHeight();
    if (winPosBtn + winH > Footeroffset + 5) {
      get_products_ajax("loadmore");
      //console.log("read");
    }
  }
});

$posts_per_page = 8;
$loading_more = false;
var jqxhr_add_get_products_ajax = { abort: function () { } };
function get_products_ajax(action, view = "") {
  //console.log("called get_products_ajax");
  // jqxhr_add_get_products_ajax.abort();
  var ajax_url = mitch_ajax_url;
  $count = $(".products").attr("data-count");
  $page = $(".products").attr("data-page");
  $posts = $(".products").attr("data-posts");
  $order = $(".products").attr("data-sort");
  $cat = $(".products").attr("data-cat");
  $lang = $(".products").attr("data-lang");

  if (($loading_more || $posts_per_page >= $posts) && action == "loadmore") {
    // console.log("khalstt " + $posts);
    return;
  }
  $loading_more = true;
  jqxhr_add_get_products_ajax = $.ajax({
    type: "POST",
    url: ajax_url,
    data: {
      action: "get_products_ajax",
      count: $count,
      page: $page,
      order: $order,
      cat: $cat,
      fn_action: action,
      lang: $lang,
    },
    success: function (posts) {
      get_products_ajax_count(action);
      $loading_more = false;
      if (action == "loadmore") {
        $(".products").append(posts);
        $(".products").attr("data-page", parseInt($page) + 1);
        $(".spinner").attr("data-page", parseInt($page) + 1);
        //console.log($(".products").attr("data-page"));
        $posts_per_page += parseInt($count);
        $posts = $(".products").attr("data-posts");
        //console.log("$posts_per_page", $posts_per_page);
        //console.log("$posts", $posts);
        if ($posts_per_page >= $posts) {
          /// Begin of get out of stock products function
          $(".spinner").hide();
        } else {
          if ($posts_per_page < $posts) {
            $(".spinner").show();
          }
        }
      } else {
        $(".products").html(posts);
        if (parseInt($page) % 2 == 0 && $posts_per_page < $posts) {
          $(".spinner").show();
        } else if (parseInt($page) % 2 == 1 && $posts_per_page < $posts) {
          $(".spinner").show();
        } else if ($posts_per_page >= $posts) {
          // console.log('hereeeeeeee '+$posts_per_page+' - '+$posts);
          /// Begin of get out of stock products function
          $(".spinner").hide();
        }
      }
    },
  });
}
var jqxhr_add_get_products_ajax_count = { abort: function () { } };
function get_products_ajax_count(view) {
  jqxhr_add_get_products_ajax_count.abort();
  // console.log('get_products_ajax_count');
  var ajax_url = mitch_ajax_url;
  $count = $(".products").attr("data-count");
  $page = $(".products").attr("data-page");
  $posts = $(".products").attr("data-posts");
  $order = $(".products").attr("data-sort");
  $cat = $(".products").attr("data-cat");
  $lang = $(".products").attr("data-lang");

  setTimeout(function () {
    jqxhr_add_get_products_ajax_count = $.ajax({
      type: "POST",
      url: ajax_url,
      data: {
        action: "get_products_ajax_count",
        count: $count,
        page: $page,
        order: $order,
        cat: $cat,
        lang: $lang,
      },
      success: function (posts) {
        // console.log('posts', posts);
        if ($posts_per_page >= parseInt(posts)) {
          $(".spinner").addClass("hide");
        } else if (parseInt(posts) == 0) {
          $(".spinner").removeClass("hide");
        } else {
          $(".spinner").removeClass("hide");
        }
        $(".products").attr("data-posts", posts);
        $(".spinner").attr("data-posts", posts);
      },
    });
  });
}


if (mitch_current_lang == "en") {
  $(".wpml-ls-native").html("عربي");
}

$(document).on('click', '.close-app', function () {
  $(this).parent().parent().parent().removeClass('active');
  $('main-header').removeClass('mobile-top');
});
