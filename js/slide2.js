function slide(prev){
  var slides = $('#slide li');
  var currElem = slides.filter('.current');
  var lastElem = slides.filter(':last');
  var firstElem = slides.filter(':first');
  // Xác định phần tử kế tiếp là prev hay next
  var nextElem = (prev)? currElem.prev() : currElem.next();
  if(prev){
   if(firstElem.attr('class') == 'current') nextElem = lastElem;
  }else if(lastElem.attr('class') == 'current')nextElem = firstElem;
  fadeElem(currElem,nextElem);
  widegetStatus(slides);
}