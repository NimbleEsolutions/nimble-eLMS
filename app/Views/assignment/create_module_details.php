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
						<li class="breadcrumb-item"><a href="<?= site_url('home'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Assignment Module Details</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">
			<div class="row" >
				<div class="col-md-6">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Create Assignment Modules</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" id="createAssignment" method="post" action="<?= site_url('assignment/module_details'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Stage <span class="mandatory"> * </span></label>
											<select class="form-control" name="mod_stage_id">
												<option value="" selected="" disabled="">Please select stage</option>
												<?php foreach ($stages as $key) { ?>
													<option value="<?= $key['stage_id'] ?>"><?= $key['stage_eng_name'].' / '.$key['stage_hin_name'].' / '.$key['stage_mar_name'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Module Name ( English )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="mod_eng_name">
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>मॉड्यूलचे नाव ( हिंदी मध्ये  )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="mod_hin_name">	
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>मॉड्यूलचे नाव ( मराठी मध्ये )<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module name ..." name="mod_mar_name">
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Module Passing Score<span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter module score ..." name="mod_passing_score">	
										</div>
									</div>									
								</div>								
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Create Module</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Assignment Modules Details</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="text-align: center;">#</th>
										<th>Stage </th>
										<th>Module Name</th>
										<th><center>Passing Score</center></th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach ($modules as $key) { 
										$stage = (new HomeModel())->getData(array('stage_id'=>$key['mod_stage_id']),'jinlms_stage');
									?>
									<tr>										
										<td style="text-align: center;"><?= $i++; ?></td>
										<td><?= $stage[0]['stage_eng_name']; ?></td>
										<td><?= $key['mod_eng_name'].' / '.$key['mod_hin_name'].' / '.$key['mod_mar_name']; ?></td>
										<td><center><?= $key['mod_passing_score']; ?></center></td>
										<td style="text-align: center;">
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-pen-nib" title="Edit Module"></i></span>
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