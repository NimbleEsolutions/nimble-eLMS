<?php 
    namespace App\Controllers;
	use CodeIgniter\Controller;
	use App\Models\HomeModel;

	class Programs extends Controller
	{
		function program_deatils()
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"programs" => (new HomeModel())->getData(array('mod_isDelete'=>0),'jinlms_module'),
			];

			return view('programs/user_program', $data);
		}

		function program_module_deatils($program)
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"module" => db_connect()->query("SELECT * FROM jinlms_topic WHERE topic_".session()->get('language')."_name LIKE '%".str_replace("_", " ", $program)."%' AND topic_isDelete = 0")->getResultArray(),
			];
			$data['topic_ass'] = (new HomeModel())->getData(array('ans_topic_id'=>$data['module'][0]['topic_id'],'ans_user_id'=>session()->get('id')),'jinlms_ass_answers');

			return view('programs/program_details', $data);
		}

		function topic_assignment_deatils($topic)
		{
			$data = [
				'success' => session()->getFlashdata('success'),
				'info' => session()->getFlashdata('info'),
				'error' => session()->getFlashdata('error'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
				"topic" => (new HomeModel)->getData("topic_".session()->get('language')."_name LIKE '%".str_replace("_", " ", $program)."%' AND topic_isDelete = 0",'jinlms_topic'),
			];
			$data["topic_ass"] = (new HomeModel())->getData(array("ass_topic_id"=>$data['topic'][0]['topic_id'],'ass_isDelete'=>0),'jinlms_topic_ass_questions');

			return view('programs/topic_assignment', $data);
		}

		function submit_topic_assignment_details()
		{
			if($this->request->getMethod() == 'post'){
				for ($i=0; $i < count($this->request->getVar('ass_question_id')); $i++) { 
					$ass_question = (new HomeModel())->getData(array('ass_id'=>$this->request->getVar('ass_question_id')[$i]),'jinlms_topic_ass_questions');
					if($ass_question[0]['ass_'.session()->get('language').'_correct_answer'] == $this->request->getVar('ass_answer')[$this->request->getVar('ass_question_id')[$i]]){
						$ans_status = 1;
						$ans_marks = $ass_question[0]['ass_question_mark'];
					}else{
						$ans_status = 2;
						$ans_marks = 0;
					}
					$questions_answer = [
						"ans_topic_id" => $this->request->getVar('ans_topic_id'),
						"ans_user_id" => session()->get('id'),
						"ans_quetions_id" => $this->request->getVar('ass_question_id')[$i],
						"ans_quetions_answer" => $this->request->getVar('ass_answer')[$this->request->getVar('ass_question_id')[$i]],
						"ans_status" => $ans_status,
						"ans_marks" => $ans_marks,
						"ans_flag" => 2,
					];
					(new HomeModel())->insertData($questions_answer,'jinlms_ass_answers');
				}
			}
			session()->setFlashdata('success',"Assignment submitted successfully.");
			return redirect()->route('programs');
		}
	}
?>