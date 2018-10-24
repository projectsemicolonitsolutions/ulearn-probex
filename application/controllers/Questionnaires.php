<?php
/**
 *
 */
class Questionnaires extends CI_Controller
{

  public function __construct()
	{
		parent:: __construct();
    if (!$this->session->userdata('admin')) {
			redirect(base_url());
		}
	}

  public function multipleChoice()
  {
    $result = $this->qb->multipleChoiceTables();
    $arrayData = array(
      'result' => $result
    );
    $this->load->view('multiple_choice', $arrayData);
  }

  public function addMultipleChoice()
  {
    $result = $this->qb->selectCategoryMC();
    $result2 = $this->qb->selectTopicMC();
    $array_data = array(
      'result' => $result,
      'result2' => $result2
    );
    $this->load->view('add_multiple', $array_data);
  }

  public function processAddMultipleChoice()
  {

    $question_no = $this->input->post('question_no');
    $test_question = $this->input->post('test_question');
    $category = $this->input->post('category');
    $topic = $this->input->post('topic');
    $question_choice = $this->input->post('question_choice');
    $question_choice1 = $this->input->post('question_choice1');
    $question_choice2 = $this->input->post('question_choice2');
    $question_choice3 = $this->input->post('question_choice3');
    $question_choice4 = $this->input->post('question_choice4');
    $question_answer = "";
    switch ($question_choice) {
      case 'A':
        $question_answer = $question_choice1;
        break;
      case 'B':
        $question_answer = $question_choice2;
        break;
      case 'C':
        $question_answer = $question_choice3;
        break;
      case 'D':
        $question_answer = $question_choice4;
        break;
    }

    $insert_data = array(
      'question_no' => $question_no,
      'test_question' => $test_question,
      'category' => $category,
      'topic' => $topic,
      'question_choice1' => $question_choice1,
      'question_choice2' => $question_choice2,
      'question_choice3' => $question_choice3,
      'question_choice4' => $question_choice4,
      'question_answer' => $question_answer,
    );

    $this->qb->insertMC($insert_data);
    $url = base_url('questionnaires/addMultipleChoice');
    echo "<script>
            alert('Successfully added multiple choice!');
            window.location.href = '$url';
          </script>";
  }

  public function fillInTheBlank()
  {
    $result = $this->qb->fillInTheBlankTables();
    $arrayData = array(
      'result' => $result
    );
    $this->load->view('fill-blank', $arrayData);
  }

}
