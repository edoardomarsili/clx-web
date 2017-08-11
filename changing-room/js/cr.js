window.onload = function() {
      var video = document.getElementById('video'),
      
          /* person */
          person = document.getElementById('face-detect'),
          p_ctx = person.getContext('2d');

          /* clothe */
          /*
          clothe = document.getElementById('clothe'),
          c_ctx = clothe.getContext('2d'),
          imageObj = new Image();
          clothe_canvas = new Image();

      clothe_canvas.onload = function() {
        c_ctx.drawImage(imageObj, 10, 10, 200, 137);
      };
      clothe_canvas.src = 'http://cestlux.localhost.local/changing-room/images/DSC_9331.jpg';
      */
      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      tracking.track('#video', tracker, { camera: true });

      tracker.on('track', function(event) {
        p_ctx.clearRect(0, 0, person.width, person.height);

        event.data.forEach(function(rect) {
          p_ctx.strokeStyle = '#a64ceb';
          p_ctx.strokeRect(rect.x, rect.y, rect.width, rect.height);
          p_ctx.font = '11px Helvetica';
          p_ctx.fillStyle = "#fff";
          p_ctx.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
          p_ctx.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
        });
      });

      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
      gui.add(tracker, 'stepSize', 1, 5).step(0.1);
    };

/* closet */
$(function(){
  $('#open-closet').on('click', function(){
    $('#face-detect, #video').addClass('blur')
    $('closet').animate({
      width: "290px",
      height: "280px"
    }, 1200, function(){
      $('closet div.closet-container').removeClass('contracted').addClass('expanded')
      $('.closet-picker').fadeIn()
    })
  })
})