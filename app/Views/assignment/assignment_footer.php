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

		$(document).on('click','#assignment_details',function(){
			$('#create_assignment').toggle();
		});

		bsCustomFileInput.init();

		$('#createAssignment').validate({
			rules: {				
				stage_eng_name: {
					required: true
				},
				// stage_hin_name: {
				// 	required: true
				// },
				// stage_mar_name: {
				// 	required:true,
				// },
				mod_eng_name: {
					required: true
				},
				// mod_hin_name: {
				// 	required: true
				// },
				// mod_mar_name: {
				// 	required:true,
				// },
				mod_passing_score: {
					required: true,
					digits:true	
				},
				mod_stage_id: {
					required: true
				},
				topic_eng_name: {
					required: true
				},
				// topic_hin_name: {
				// 	required: true
				// },
				// topic_mar_name: {
				// 	required:true,
				// },
				topic_eng_video_link: {
					required: true
				},
				// topic_hin_video_link: {
				// 	required: true
				// },
				// topic_mar_video_link: {
				// 	required:true,
				// },
				topic_module_id: {
					required: true
				},
				topic_assignment_quetions:{
					required:true,
					digits:true
				},
				topic_passing_score: {
					required: true,
					digits:true	
				},
				ass_topic_id:{
					required:true
				},
				ass_ans_type:{
					required:true
				},
				ass_question_difficulty_level:{
					required:true
				},
				ass_eng_question:{
					required:true
				},
				ass_eng_options:{
					required:true
				},
				ass_eng_correct_answer:{
					required:true
				},
				ass_question_mark:{
					required:true,
					digits:true,
					minlength:1,
					maxlength:2
				},
			},
			messages: {
				
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>
</body>
</html>
