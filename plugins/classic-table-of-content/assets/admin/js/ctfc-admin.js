(function($){

  $(document).ready(function(){
    $('.ctfc-tab-content>div').hide();
    $('.ctfc-tab-content>div').first().slideDown();
      $('.ctfc-tab-buttons span').click(function(){
        var thisclass=$(this).attr('class');
        $('#ctfc-lamp').removeClass().addClass('#ctfc-lamp').addClass(thisclass);
        $('.ctfc-tab-content>div').each(function(){
          if($(this).hasClass(thisclass)){
            $(this).fadeIn(800);
          }
          else{
            $(this).hide();
          }
        });
      });
  });

 
})(jQuery);
