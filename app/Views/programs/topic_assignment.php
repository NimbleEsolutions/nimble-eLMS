	<?= view('home/dash_header'); 
		use App\Models\HomeModel;
	?>
	<style type="text/css">
		.answer p{
			padding-left: 2.5rem;
		}
		.card-body .row{
			margin-bottom: 1rem;
		}
	</style>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> <?php echo $topic[0]['topic_'.session()->get('language').'_name']." Assignment"; ?> </h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item active">Topic Assignment</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<form role="form" id="createProfile" method="post" action="<?= site_url('programs/submit_topic_assignment'); ?>">
								<div class="card-body">
								<?php $i = 1; foreach ($topic_ass as $ass) { ?>
									<div class="row">
										<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
										<div class="col-lg-8 col-md-2 col-sm-8 col-xs-8">
											<input type="text" name="ans_topic_id" class="form-control hidden" value="<?= $topic[0]['topic_id']; ?>">
											<input type="text" name="ass_question_id[]" class="form-control hidden" value="<?= $ass['ass_id']; ?>">
											<p class="quetion">Que.<?= "".$i++." ) ".$ass['ass_'.session()->get('language').'_question']." ?"; ?></p>
											<span class="answer">
												<?php $que_options = explode(",", $ass['ass_'.session()->get('language').'_options'].'');
													foreach ($que_options as $options) { ?>
													<p>
														<input type="radio" name="ass_answer[<?= $ass['ass_id']; ?>]" value="<?= $options;?>" required> &nbsp &nbsp &nbsp &nbsp<?= $options;?>
													</p>
												<?php } ?>
											</span>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align: right;">
											<p class="quetion"><?= "( ".$ass['ass_question_mark']." Marks )"; ?></p>
										</div>
										<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
									</div>
								<?php } ?>
								</div>
								<div class="card-footer">
									<div class="row">
									<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
									<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="text-align: right;">
										<button type="submit" class="btn btn-primary">Submit Assignment</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</div>
									<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?= view('programs/program_footer'); ?>