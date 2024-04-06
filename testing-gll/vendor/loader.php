<style>
/* This only works with JavaScript, 
   if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
</style>
<script>
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$("#loader").animate({
			top: -200
		}, 1500);
	});
</script>
<img src="images/loading.gif" id="loader">