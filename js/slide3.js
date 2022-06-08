function vk_slideshow(time){
  var idset =setInterval('slide()', time);
  var liarr =$('#slide ul li');
  
  var str='';
  for(var i=0; i<liarr.length; i++){
   str+='<a></a>';
  }
  controlNav.append(str);
  controlNav.children().each(function(index){
   $(this).click(function(){
    wideget(index);clearInterval(idset);
    idset =setInterval('slide()', time);
   });
  }).eq(0).addClass('active');
  
 
}