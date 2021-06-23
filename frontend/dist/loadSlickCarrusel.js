var setInitSlide = {
  post: false,
  member: false,
  events: false,
  sesiones: false,
  project: false
};
document.addEventListener('DOMContentLoaded', function () {
  var $slidePost = $('.bfg-slide-post');
  var $slideEvent = $('.bfg-slide-event');
  var $slideMember = $('.bfg-slide-member');

  // SLIDE POST
  $slidePost.on('init', function(event){
    $(this).siblings().removeClass('active');
  });
  $slidePost.on('afterChange', function(event, slick, currentSlide){
      if(!setInitSlide.post) {
        $(this).find('.slick-prev-bfg').removeClass('hide');
      }
      setInitSlide.post = true;
  });

  function loadSlider(selector) {
    
    $('.' + selector).slick({
      variableWidth: true,
      dots: false,
      slidesToShow: 5,
      slidesToScroll: 5,
      nextArrow: '<button type="button" class="slick-next-bfg profile_bit_action__link"> <i class="bb-icon-angle-right"></i> </button>',
      prevArrow: '<button type="button" class="slick-prev-bfg hide profile_bit_action__link"">  <i class="bb-icon-angle-left"></i></button>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          dots: false,
          centerMode: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          centerMode: true
        }
      }
    ]
    });

  }
  loadSlider('bfg-slide-post');
  
  
  // SLIDE EVENT
  $slideEvent.on('afterChange', function(event, slick, currentSlide){
    if(!setInitSlide.events) {
        $(this).find('.slick-prev-bfg').removeClass('hide');
      }
      setInitSlide.events = true;
  });
  $slideEvent.on('init', function(event){
    $(this).siblings().removeClass('active');
  });
  
  function loadSlideEvent() {
    $slideEvent.slick({
      variableWidth: true,
      dots: false,
      slidesToShow: 5,
      slidesToScroll: 3,
      nextArrow: '<button type="button" class="slick-next-bfg profile_bit_action__link"> <i class="bb-icon-angle-right"></i> </button>',
      prevArrow: '<button type="button" class="slick-prev-bfg hide profile_bit_action__link"">  <i class="bb-icon-angle-left"></i></button>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          dots: false,
          centerMode: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          centerMode: true
        }
      }
    ]
    });
    
  }
  loadSlideEvent();

  $slideMember.on('afterChange', function(event, slick, currentSlide){
    if(!setInitSlide.member) {
        $(this).find('.slick-prev-bfg').removeClass('hide');
      }
      setInitSlide.member = true;
  });
  $slideMember.on('init', function(event){
    $(this).siblings().removeClass('active');
  });
  
  function loadSlideMember() {
    $slideMember.slick({
      variableWidth: true,
      dots: false,
      slidesToShow: 5,
      slidesToScroll: 3,
      nextArrow: '<button type="button" class="slick-next-bfg profile_bit_action__link"> <i class="bb-icon-angle-right"></i> </button>',
      prevArrow: '<button type="button" class="slick-prev-bfg hide profile_bit_action__link"">  <i class="bb-icon-angle-left"></i></button>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          dots: false,
          centerMode: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          centerMode: true
        }
      }
    ]
    });
  }
  loadSlideMember();


  $('.bfg-slide-sesiones').on('afterChange', function(event, slick, currentSlide){
    if(!setInitSlide.sesiones) {
      $(this).find('.slick-prev-bfg').removeClass('hide');
    }
    setInitSlide.sesiones = true;
  });
  $('.bfg-slide-sesiones').on('init', function(event){
    $(this).siblings().removeClass('active');
    // left
  });
  function loadSliderSesiones() {
    $('.bfg-slide-sesiones').slick({
      variableWidth: true,
      slidesToShow: 5,
      slidesToScroll: 3,
      centerMode: false,
      infinite: true,
      centerPadding: '60px',
      nextArrow: '<button type="button" class="slick-next-bfg profile_bit_action__link"> <i class="bb-icon-angle-right"></i> </button>',
      prevArrow: '<button type="button" class="slick-prev-bfg hide profile_bit_action__link"">  <i class="bb-icon-angle-left"></i></button>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          dots: false,
          centerMode: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          centerMode: true
        }
      }
    ]
    });

  }
  loadSliderSesiones();


  // Proyectos
  $('.bfg-slide-proyectos').on('afterChange', function(event, slick, currentSlide){
    if(!setInitSlide.project) {
      $(this).find('.slick-prev-bfg').removeClass('hide');
    }
    setInitSlide.project = true;
  });
  $('.bfg-slide-proyectos').on('init', function(event){
    $(this).siblings().removeClass('active');
  });
  function loadSlideProject() {
    $('.bfg-slide-proyectos').slick({
      variableWidth: true,
      dots: false,
      slidesToShow: 5,
      slidesToScroll: 3,
      centerMode: false,
      nextArrow: '<button type="button" class="slick-next-bfg profile_bit_action__link button-arrow-short"> <i class="bb-icon-angle-right"></i> </button>',
      prevArrow: '<button type="button" class="slick-prev-bfg hide profile_bit_action__link button-arrow-short"">  <i class="bb-icon-angle-left"></i></button>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          dots: false,
          centerMode: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          centerMode: true
        }
      }
    ]
    });
  }
  loadSlideProject();
});