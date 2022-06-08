function clip() {
  // width of the banner container
  var contWidth = 425;
  // height of the banner container
  var contHeight = 90;

  var id1 = document.getElementById('slideA');
  var id2 = document.getElementById('slideB');

  id1.style.left = parseInt(id1.style.left)-1 + 'px';
  
  document.getElementById('slideCont').style.width = contWidth + "px";
  document.getElementById('slideCont').style.clip = 'rect(auto,'+ contWidth +'px,' + contHeight +'px,auto)';
  id2.style.display = '';
  if(parseFloat(id1.style.left) == -(contWidth))  {
   id1.style.left = '0px';
  }
  setTimeout(clip,25)
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

addLoadEvent(function() {
  clip();
});