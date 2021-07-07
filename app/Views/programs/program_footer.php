<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		<!-- Anything you want -->
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2021-2022 <a href="https://nimble-esolutions.com/">Nimble e-Solutions</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url(); ?>/public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>/public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?= base_url(); ?>/public/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
    $(window).on('load',function() {
        $(".loader").fadeOut("slow");
    });
</script>
<script type="text/javascript">
	$(document).ready(function () {
		<?php if(isset($success)): ?>
			toastr.success("<?php echo $success; ?>");
		<?php endif; ?>
		<?php if(isset($info)): ?>
			toastr.info("<?php echo $info; ?>");
		<?php endif; ?>
		<?php if(isset($error)): ?>
			toastr.error("<?php echo $error; ?>");
		<?php endif; ?>	

		// Video Controllers
		var video = document.querySelector('.video');
	    var juice = document.querySelector('.orange-juice');
	    var btn = document.getElementById('play-pause');
	    var revise = document.getElementById('back-play');
	    // video.play();

	    function togglePlayPause() {
	        if(video.paused){
	            btn.className = "pause";
	            video.play();
	        }else{
	            btn.className = "play";
	            video.pause();
	        }
	    }

	    btn.onclick = function(){
	        togglePlayPause()
	    }

	    revise.onclick = function(){
	    	var curret = video.currentTime;
	    	if(curret > 5){
	    		var curretTime = video.currentTime - 5;
	    		video.currentTime = curretTime;
	    	}
	    }

	    video.addEventListener('timeupdate', function(){
	    	var juicePos = video.currentTime / video.duration;
	    	juice.style.width = juicePos * 100 + "%";
	    	if(video.ended){
	    		btn.className = 'play';
	    	}
	    });	
	});
</script>
</body>
</html>
