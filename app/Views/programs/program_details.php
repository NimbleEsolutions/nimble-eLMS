	<?= view('home/dash_header'); 
		use App\Models\HomeModel;
	?>
	<style type="text/css">
	    .c-video{
	    	/*width: 50%;*/
	    	/*min-width: 800px;*/
	    	position: relative;
	    	overflow: hidden;
	    }
	    .c-video:hover .controls{
	    	transform: translateY(0);
	    }
	    .controls{
	    	display: flex;
	    	position:absolute;
	    	bottom: 0;
	    	width: 100%;
	    	flex-wrap: wrap;
	    	background: rgb(0,0,0);
	    	/*transform: translateY(100%) translateY(-5px);*/
	    	transition: all 0.2s;
	    }
	    .buttons button {
	    	background: none;
	    	border:0;
	    	outline: 0;
	    	cursor: pointer;
	    }

	    .buttons{
	    	padding: 0px 10px 2px;
	    }
	    .buttons #play-pause:before {
	     	content: '\f144';
	     	font-family: 'Font Awesome 5 Free';
	     	width: 30px;
	     	height: 30px;
	     	display: inline-block;
	     	font-size: 28px;
	     	color: #fff;
	     	-webkit-font-smoothing:antialiased;
	    }

	    .buttons #back-play {
	     	content: '\f2ea';
	     	font-family: 'Font Awesome 5 Free';
	     	width: 30px;
	     	height: 30px;
	     	display: inline-block;
	     	font-size: 28px;
	     	color: #fff;
	     	-webkit-font-smoothing:antialiased;
	    }

	    .buttons #play-pause.play:before{
	    	content: '\f144';
	    }
	    .buttons #play-pause.pause:before{
	    	content: '\f28b';
	    }
	    .orange-bar{
	    	height: 8px;
	    	top: 0;
	    	left: 0;
	    	width: 100%;
	    	background: #000;
	    }
	    .orange-juice{
	    	height: 5px;
	    	background-color: orange;
	    }
	    #camera{
	    	width: 350px; height: 350px; border: 1px solid #000;
	    }
	</style>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> <?php echo $module[0]['topic_'.session()->get('language').'_name']; ?> </h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item active">Program Details</li>
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
							<div class="card-body p-0">
								<div class="row" style="padding: 2%;">
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="c-video">
											<video class="video" style="width:100%;">
												<source src="<?=base_url() ?>/public/dist/video/1_1_Purpose_and_Audience.mp4" type="">
											</video>
											<div class="controls">
												<div class="orange-bar">
													<div class="orange-juice"></div>
												</div>
												<div class="buttons">
													<button id="play-pause"></button>
													<button id="back-play"><i class="fas fa-undo-alt"></i></button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="bottom: 0px;">
										<h3>Instructions:</h3><hr>
										<ol type="number">
											<li></li>
											<li></li>
											<li></li>
										</ol>
										<?php if(empty($topic_ass)){ ?>
										<center><a href="<?= site_url("programs/topic_assignment/".str_replace(" ", "_", strtolower($module[0]['topic_'.session()->get('language').'_name']))."");?>"><span class="btn btn-primary">Go to Assessment</span></a></center>
										<?php } ?>
									</div>
								</div>
							</div>
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