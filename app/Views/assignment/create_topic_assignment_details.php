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
						<li class="breadcrumb-item active">Topic Assignments Details</li>
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
				<div class="col-md-12" id="create_assignment" style="display: none;">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Create Topics Assignments</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" id="createAssignment" method="post" action="<?= site_url('assignment/topic_assignment_details'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Topic <span class="mandatory"> * </span></label>
											<select class="form-control" name="ass_topic_id">
												<option value="" selected="" disabled="">Please select topic</option>
												<?php foreach ($topics as $key) { ?>
													<option value="<?= $key['topic_id'] ?>"><?= $key['topic_eng_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Question Answer Type <span class="mandatory"> * </span></label>
											<select class="form-control" name="ass_ans_type">
												<option value="" disabled="">Please select type</option>
												<option value="1">Input - text</option>
												<option value="2">Input - Checkbox</option>
												<option value="3" selected="">Input - Radio</option>
												<option value="4">TextArea</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Question Difficulty Level <span class="mandatory"> * </span></label>
											<select class="form-control" name="ass_question_difficulty_level">
												<option value="" disabled="">Please select priority</option>
												<option value="1">High</option>
												<option value="2" selected="">Medium</option>
												<option value="3">Low</option>
											</select>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Question ( English )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Question..." name="ass_eng_question"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>प्रश्न ( हिंदी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Question..." name="ass_hin_question"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>प्रश्न ( मराठी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Question..." name="ass_mar_question"></textarea>
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Options ( English )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Option with (,) Seprated" name="ass_eng_options"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>पर्याय ( हिंदी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Option with (,) Seprated" name="ass_hin_options"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>पर्याय ( मराठी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Option with (,) Seprated" name="ass_mar_options"></textarea>
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Correct Answer ( English )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Correct Option" name="ass_eng_correct_answer"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>योग्य पर्याय ( हिंदी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Correct Option" name="ass_hin_correct_answer"></textarea>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>योग्य पर्याय ( मराठी )<span class="mandatory"> * </span></label>
											<textarea class="form-control" placeholder="Enter Correct Option" name="ass_mar_correct_answer"></textarea>
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Correct Answer Marks <span class="mandatory"> * </span></label>
											<input type="text" class="form-control" placeholder="Enter Correct Answer Marks" name="ass_question_mark">
										</div>
									</div>							
								</div>								
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Create Assignment</button>
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
							<h3 class="card-title">Topic Assignment Details</h3>
							<div class="card-tools">
								<span class="btn btn-primary btn-xs" id="assignment_details"><i class="fas fa-plus fa-xs"></i> New Assignment</span>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="text-align: center;">#</th>
										<th>Topic </th>
										<th>Question</th>
										<th>Options</th>
										<th style="text-align: center;">Correct Option</th>
										<th style="text-align: center;">Difficulty Level</th>
										<th style="text-align: center;">Mark</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach (array_reverse($assignments) as $key) { 
										$topic = (new HomeModel())->getData(array('topic_id'=>$key['ass_topic_id'],'topic_isDelete'),'jinlms_topic')
									?>
									<tr>
										<td style="text-align: center;"><?= $i++; ?></td>
										<td><?= $topic[0]['topic_eng_name']; ?></td>
										<td><?= $key['ass_eng_question']; ?></td>
										<td><?= $key['ass_eng_options']; ?></td>
										<td style="text-align: center;"><?= $key['ass_eng_correct_answer']; ?></td>
										<td style="text-align: center;"><?= $key['ass_question_difficulty_level']; ?></td>
										<td style="text-align: center;"><?= $key['ass_question_mark']; ?></td>
										<td style="text-align: center;">
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-pen-nib" title="Edit Question"></i></span>
											</a>&nbsp
											<a href="">
												<span class="btn btn-icon btn-xs"><i class="fa fa-trash-alt" title="Delete Question"></i></span>
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