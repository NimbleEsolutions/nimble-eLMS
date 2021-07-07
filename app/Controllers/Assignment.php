<?php 
	namespace App\Controllers;
	use CodeIgniter\Controller;
	use App\Models\HomeModel;
	
	class Assignment extends Controller
	{
		function create_stage_details()
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"stages" => (new HomeModel())->getData(array('stage_isDelete'=>0),'jinlms_stage'),
			];

			if($this->request->getMethod() == 'post'){
				$stage = [
					'stage_eng_name' => $this->request->getVar('stage_eng_name'),
					'stage_hin_name' => $this->request->getVar('stage_hin_name'),
					'stage_mar_name' => $this->request->getVar('stage_mar_name'),
				];
				(new HomeModel())->insertData($stage,'jinlms_stage');
				session()->setFlashdata('success','Assignment stage successfully created..!');
				return redirect()->route('assignment/stage_details');
			}
			return view('assignment/create_stage_details', $data);
		}

		function create_module_details()
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"stages" => (new HomeModel())->getData(array('stage_isDelete'=>0),'jinlms_stage'),
				"modules" => (new HomeModel())->getData(array('mod_isDelete'=>0),'jinlms_module'),
			];

			if($this->request->getMethod() == 'post'){
				$stage = [
					'mod_stage_id' => $this->request->getVar('mod_stage_id'), 
					'mod_eng_name' => $this->request->getVar('mod_eng_name'), 
					'mod_hin_name' => $this->request->getVar('mod_hin_name'), 
					'mod_mar_name' => $this->request->getVar('mod_mar_name'),
					'mod_passing_score' => $this->request->getVar('mod_passing_score'),
				];
				(new HomeModel())->insertData($stage,'jinlms_module');
				session()->setFlashdata('success','Assignment module successfully created..!');
				return redirect()->route('assignment/module_details');
			}

			return view('assignment/create_module_details', $data);
		}

		function create_topic_details()
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"modules" => (new HomeModel())->getData(array('mod_isDelete'=>0),'jinlms_module'),
				"topics" => (new HomeModel())->getData(array('topic_isDelete'=>0),'jinlms_topic'),
			];

			if($this->request->getMethod() == 'post'){
				$topic = [
					'topic_eng_name' => $this->request->getVar('topic_eng_name'),
					'topic_hin_name' => $this->request->getVar('topic_hin_name'),
					'topic_mar_name' => $this->request->getVar('topic_mar_name'),
					'topic_eng_video_link' => $this->request->getVar('topic_eng_video_link'),
					'topic_hin_video_link' => $this->request->getVar('topic_hin_video_link'),
					'topic_mar_video_link' => $this->request->getVar('topic_mar_video_link'),
					'topic_module_id' => $this->request->getVar('topic_module_id'),
					'topic_passing_score' => $this->request->getVar('topic_passing_score'),
					'topic_assignment_quetions' => $this->request->getVar('topic_assignment_quetions'),
				];
				(new HomeModel())->insertData($topic,'jinlms_topic');
				session()->setFlashdata('success','Assignment topic successfully created..!');
				return redirect()->route('assignment/topic_details');
			}

			return view('assignment/create_topic_details', $data);
		}

		function create_topic_assignment_details()
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"topics" => (new HomeModel())->getData(array('topic_isDelete'=>0),'jinlms_topic'),
				"assignments" => (new HomeModel())->getData(array('ass_isDelete'=>0),'jinlms_topic_ass_questions'),
			];	

			if($this->request->getMethod() == 'post'){
				$assignment = [
					'ass_topic_id' => $this->request->getVar('ass_topic_id'),
					'ass_ans_type' => $this->request->getVar('ass_ans_type'),
					'ass_question_difficulty_level' => $this->request->getVar('ass_question_difficulty_level'),
					'ass_eng_question' => $this->request->getVar('ass_eng_question'),
					'ass_hin_question' => $this->request->getVar('ass_hin_question'),
					'ass_mar_question' => $this->request->getVar('ass_mar_question'),
					'ass_eng_options' => $this->request->getVar('ass_eng_options'),
					'ass_hin_options' => $this->request->getVar('ass_hin_options'),
					'ass_mar_options' => $this->request->getVar('ass_mar_options'),
					'ass_eng_correct_answer' => $this->request->getVar('ass_eng_correct_answer'),
					'ass_hin_correct_answer' => $this->request->getVar('ass_hin_correct_answer'),
					'ass_mar_correct_answer' => $this->request->getVar('ass_mar_correct_answer'),
					'ass_question_mark' => $this->request->getVar('ass_question_mark'),
				];
				(new HomeModel())->insertData($assignment,'jinlms_topic_ass_questions');
				session()->setFlashdata('success','Assignment successfully created..!');
				return redirect()->route('assignment/topic_assignment_details');
			}	

			return view('assignment/create_topic_assignment_details', $data);
		}
	}
?>