// Initialize Whimsy Mosaic

jQuery(document).ready(function($){
    
    var $container = $( "#mosaic" );
  
    $container.imagesLoaded( function() { // Load posts after all images have finished loading.  
    
      $container.masonry({
        
        itemSelector: ".post",
        gutter:32
        
    });
      
  });
    
});