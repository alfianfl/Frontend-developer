 $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        auto:true,
        pauseOnHover: true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });

 $(document).ready(function() {
    $('#autoWidth2').lightSlider({
        autoWidth:true,
        auto:true,
        pauseOnHover: true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });


  $(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready
   console.log("document is ready");
     
   
     $( ".box" ).hover(
     function() {
       $(this).addClass('shadow').css('cursor', 'pointer'); 
     }, function() {
       $(this).removeClass('shadow');
     }
   );
     
   // document ready  
   });