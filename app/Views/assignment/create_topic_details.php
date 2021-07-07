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
					<h1 class="m-0 text-dark"> </h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Assignment Topic Details</li>
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
				<div class="col-md-12">
					<!-- general form elements disabled -->
					<div class="card card-primary" id="create_assignment" style="display: none;">
						<div class="card-header">
							<h3 class="card-title">Create Assignment Topics</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" id="createAssignment" method="post" action="<?= site_url('assignment/topic_details'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Topic Name ( English )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="topic_eng_name">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>विषयांचे नाव ( हिंदी मध्ये )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="topic_hin_name">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>विषयांचे नाव ( मराठी मध्ये )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="topic_mar_name">
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Topic Video Link ( English Topic )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module link ..." name="topic_eng_video_link">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>विषयांची विडिओ लिंक ( हिंदी विषयांची)<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module link ..." name="topic_hin_video_link">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>विषयांची विडिओ लिंक ( मराठी विषयांची )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module link ..." name="topic_mar_video_link">
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Module <span class="mandatory"> * </span></label>
											<select class="form-control" name="topic_module_id">
												<option value="" selected="" disabled="">Please select Module</option>
												<?php foreach ($modules as $key) { ?>
													<option value="<?= $key['mod_id'] ?>"><?= $key['mod_eng_name'].' / '.$key['mod_hin_name'].' / '.$key['mod_mar_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Topic Passing Score<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter topic score..." name="topic_passing_score">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Questions/Assignment<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="No. of Questions for Assignment" name="topic_assignment_quetions">
										</div>
									</div>								
								</div>								
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Create Topic</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-12">
					<!-- general form elements disabled -->
					<div class="card card-default">
						<div class="card-header">
							<h3 class="card-title">Assignment Topic Details</h3>
							<div class="card-tools">
								<span class="btn btn-primary btn-xs" id="assignment_details"><i class="fas fa-plus fa-xs"></i> New Topic</span>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="text-align: center;">#</th>
										<th>Module </th>
										<th>Topic Name</th>
										<th><center>Passing Score</center></th>
										<th><center>Question/Assignment</center></th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach ($topics as $key) { 
										$module = (new HomeModel())->getData(array('mod_id'=>$key['topic_module_id']),'jinlms_module');
									?>
									<tr>										
										<td style="text-align: center;"><?= $i++; ?></td>
										<td><?= $module[0]['mod_eng_name']; ?></td>
										<td><?= $key['topic_eng_name']; ?></td>
										<td><center><?= $key['topic_passing_score']; ?></center></td>
										<td><center><?= $key['topic_assignment_quetions']; ?></center></td>
										<td style="text-align: center;">
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-pen-nib" title="Edit Topic"></i></span>
											</a>&nbsp
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-trash-alt" title="Delete Module"></i></span>
											</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					<!-- /.card -->
					</div>
					
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	<div class="p-3">
		<h5>Title</h5>
		<p>Sidebar content</p>
	</div>
</aside>
<!-- /.control-sidebar -->
<?= view('assignment/assignment_footer'); ?>