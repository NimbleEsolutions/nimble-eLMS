<?= view('home/dash_header'); ?>
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
						<li class="breadcrumb-item active">Assignment Stage Details</li>
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
				<div class="col-md-6">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Create Assignment Stages</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" id="createAssignment" method="post" action="<?= site_url('assignment/stage_details'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Stage Name (English) <span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter stage name ..." name="stage_eng_name">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>स्टेजचे नाव ( हिंदी मध्ये ) <span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter stage name ..." name="stage_hin_name">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>स्टेजचे नाव ( मराठी मध्ये ) <span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter stage name ..." name="stage_mar_name">
										</div>
									</div>									
								</div>								
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Create Stage</button>
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
							<h3 class="card-title">Assignment Stages Details</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="text-align: center;">#</th>
										<th>Stage Name</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach ($stages as $key) { ?>
									<tr>
										<td style="text-align: center;"><?= $i++; ?></td>
										<td><?= $key['stage_eng_name'].' / '.$key['stage_hin_name'].' / '.$key['stage_mar_name']; ?></td>
										<td style="text-align: center;">
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-pen-nib" title="Edit Stage"></i></span>
											</a>&nbsp
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-trash-alt" title="Delete Stage"></i></span>
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