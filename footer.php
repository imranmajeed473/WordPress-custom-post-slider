<!-- header.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />

<!-- footer.php -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<script>
jQuery('#testi-slider').owlCarousel({
  loop:true,
  center: true,
  margin:15,
  responsiveClass:true,
  autoplay:true,
  autoplayTimeout:3000,
  autoplayHoverPause:false,
  responsive:{
   0:{
     items:1,
     nav:true
    },
  600:{
     items:2,
    nav:false
    },
  1000:{
     items:3,
     nav:true,
     loop:true
     }
  }
})
</script>
