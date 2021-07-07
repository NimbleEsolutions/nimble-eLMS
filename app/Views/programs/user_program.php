	<?= view('home/dash_header'); 
		use App\Models\HomeModel;
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> Research Writing </h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item active">Programs</li>
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
								<table class="table table-bordered">
									<thead>
										<tr>
											<th><center>#</center></th>
											<th style="text-align: center;">Program</th>
											<th>Modules</th>
											<th>Submitted On</th>
											<th><center>Score</center></th>
											<th><center>Status</center></th>
											<th><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach ($programs as $module) { 
											$topics = (new HomeModel())->getData(array("topic_module_id"=>$module['mod_id'],"topic_isDelete"=>0),"jinlms_topic");
										?>
											<tr>
												<td rowspan="<?= count($topics)+1; ?>" style="vertical-align: middle;text-align: center;"><center><?= $i++; ?></center></td>
												<td rowspan="<?= count($topics)+1; ?>" style="vertical-align: middle;text-align: center;"><?= $module['mod_'.session()->get("language").'_name']; ?></td>
												<?php foreach ($topics as $topic) { 
													$topic_ass = (new HomeModel())->getData(array('ans_topic_id'=>$topic['topic_id'],'ans_user_id'=>session()->get('id')),'jinlms_ass_answers');
												?>
												<tr>
													<td><a href="<?= site_url('programs/program_details/'.str_replace(" ", "_", strtolower($topic['topic_'.session()->get("language").'_name'])).''); ?>"><?= $topic['topic_'.session()->get("language").'_name'] ?></a></td>
													<td><?php if(!empty($topic_ass)){ echo date('d M Y h:i A', strtotime($topic_ass[0]['ans_createdOn'])); }?></td>
													<td><center><?php if(!empty($topic_ass)){echo array_sum(array_column($topic_ass,'ans_marks'));
													} ?></center></td>
													<td></td>
													<td></td>
												</tr>
												<?php } ?>
											</tr>
										<?php } ?>
									</tbody>
								</table>
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