<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/popper.js/umd/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="assets/vendor/aos/aos.js"></script> <!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->

<script>
  $(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 100) {
      $('.stickyNav').fadeIn();
    } else {
      $('.stickyNav').fadeOut();
    }
  });
</script>
<script>
  $('.input-field .input').blur(function() {
    if (!this.value) {
      $(this).removeClass('has-value');
    } else {
      $(this).addClass('has-value');
    }
  });
</script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script>
  function processing(){
    document.getElementById('sendButton').style.display='none'
    document.getElementById('processingBtn').style.display=''
  }
</script>