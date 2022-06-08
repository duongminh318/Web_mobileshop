function fadeElem(currElem,nextElem){
  currElem.removeClass('current').find('img') .css({'z-index':'50'}) .end() .find('p') .css({'z-index':'50'});
  nextElem.addClass('current').find('img') .css({'opacity': '0','z-index':'100'}) .animate({opacity: 1}, 700, function(){
   currElem.find('img') .css({'z-index': '0'});
  }).end().find('p') .css({'height':'0','z-index':'100'}) .animate({height: 50},500, function(){
   currElem.find('p') .css({'z-index': '0'});
  });
}