<?php
/**
 * Queries for ulearn
 */
class QueryBuilder extends CI_Model
{

  function __construct()
  {
    parent:: __construct();
    $this->load->database();
  }

  public function loginValidateData($username)
  {
    $this->db->where('username', $username);
    $query = $this->db->get('user_tbl');
    return $query;
  }

  public function getAccessLevel($res_acct_id)
  {
    $this->db->where('acct_id', $res_acct_id);
    $query = $this->db->get('useraccess_tbl');
    return $query;
  }

  public function getAdminInfo($res_user)
  {
    $this->db->where('user_id', $res_user);
    $q = $this->db->get('admininfo_tbl');
    return $q;
  }

  public function getTeacherInfo($res_user)
  {
    $this->db->where('user_id', $res_user);
    $q = $this->db->get('teacherinfo_tbl');
    return $q;
  }

  public function adminCount()
  {
    return $this->db->count_all_results('admininfo_tbl');
  }

  public function teacherCount()
  {
    $query = $this->db->get('teacherinfo_tbl');
    return $query->num_rows();
  }

  public function studentCount()
  {
    $query = $this->db->get('studentinfo_tbl');
    return $query->num_rows();
  }

  public function categoryCount()
  {
    $query = $this->db->get('category_tbl');
    return $query->num_rows();
  }

  public function topicCount()
  {
    $query = $this->db->get('categorytopic_tbl');
    return $query->num_rows();
  }

  public function departmentCount()
  {
    $query = $this->db->get('department_tbl');
    return $query->num_rows();
  }

  public function sectionTables()
  {
    return $this->db->get('section_tbl');
  }

  public function announcementTables()
  {
    return $this->db->get('announcement_tbl');
  }

  public function assignmentTables()
  {
    return $this->db->get('assignment_tbl');
  }

  public function contentTables()
  {
    return $this->db->get('categorytopic-content_tbl');
  }

  public function progressTables()
  {
    return $this->db->get('categorytopic-content_tbl');
  }

  public function topicTables()
  {
    return $this->db->get('categorytopic_tbl');
  }

  public function categoryTables()
  {
    return $this->db->get('category_tbl');
  }

  public function departmentTables()
  {
    return $this->db->get('department_tbl');
  }

  public function adminTables()
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a INNER JOIN admininfo_tbl AS b ON a.user_id = b.user_id'
    );
  }

  public function teacherTables()
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a INNER JOIN teacherinfo_tbl AS b ON a.user_id = b.user_id'
    );
  }

  public function studentTables()
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a INNER JOIN studentinfo_tbl AS b ON a.user_id = b.user_id'
    );
  }

  public function multipleChoiceTables()
  {
    return $this->db->get('multiple_question_tbl');
  }

  public function fillInTheBlankTables()
  {
    return $this->db->get('fill_question_tbl');
  }

  public function selectCategoryMC()
  {
    return $this->db->query('
      SELECT cat_id, cat_tinker FROM category_tbl
    ');
  }

  public function selectTopicMC()
  {
    return $this->db->query('
      SELECT * FROM categorytopic_tbl
    ');
  }

  public function insertMC($insert_data)
  {
    return $this->db->query('
      INSERT INTO multiple_question_tbl
      (
        question_no,
        cat_id,
        topic_id,
        test_question,
        question_choice1,
        question_choice2,
        question_choice3,
        question_choice4,
        question_answer,
        question_status
      )
      VALUES
      (
        "'.$insert_data['question_no'].'",
        "'.$insert_data['category'].'",
        "'.$insert_data['topic'].'",
        "'.$insert_data['test_question'].'",
        "'.$insert_data['question_choice1'].'",
        "'.$insert_data['question_choice2'].'",
        "'.$insert_data['question_choice3'].'",
        "'.$insert_data['question_choice4'].'",
        "'.$insert_data['question_answer'].'",
        1
      )
    ');
  }

  public function selectAdminRow($data)
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a
       INNER JOIN admininfo_tbl AS b
       ON a.user_id = b.user_id
       WHERE admin_no ="'.$data['admin_no'].'"'
    );
  }

  public function selectTeacherRow($data)
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a
       INNER JOIN teacherinfo_tbl AS b
       ON a.user_id = b.user_id
       WHERE teacher_no ="'.$data['teacher_no'].'"'
    );
  }

  public function selectStudentRow($data)
  {
    return $this->db->query(
      'SELECT * fROM user_tbl AS a
       INNER JOIN studentinfo_tbl AS b
       ON a.user_id = b.user_id
       WHERE student_no ="'.$data['student_no'].'"'
    );
  }

  public function selectDepartment()
  {
    return $this->db->get('department_tbl');
  }

  public function selectSection()
  {
    return $this->db->get('section_tbl');
  }

  public function updateAdminData($dataUpdate)
  {
    $this->db->set('first_name', $dataUpdate['first_name']);
    $this->db->set('last_name', $dataUpdate['last_name']);
    $this->db->set('middle_name', $dataUpdate['middle_name']);
    $this->db->set('email_add', $dataUpdate['email_add']);
    $this->db->set('contact_no', $dataUpdate['contact_no']);
    $this->db->where('admin_no', $dataUpdate['admin_no']);
    $this->db->update('admininfo_tbl');
    $this->db->set('password', $dataUpdate['password']);
    $this->db->where('user_id', $dataUpdate['user_id']);
    return $this->db->update('user_tbl');
  }

  public function updateTeacherData($dataUpdate)
  {
    $this->db->set('first_name', $dataUpdate['first_name']);
    $this->db->set('last_name', $dataUpdate['last_name']);
    $this->db->set('middle_name', $dataUpdate['middle_name']);
    $this->db->set('email_add', $dataUpdate['email_add']);
    $this->db->set('contact_no', $dataUpdate['contact_no']);
    $this->db->set('department_id', $dataUpdate['department_id']);
    $this->db->where('teacher_no', $dataUpdate['teacher_no']);
    $this->db->update('teacherinfo_tbl');
    $this->db->set('password', $dataUpdate['password']);
    $this->db->where('user_id', $dataUpdate['user_id']);
    return $this->db->update('user_tbl');
  }

  public function updateStudentData($dataUpdate)
  {
    $this->db->set('first_name', $dataUpdate['first_name']);
    $this->db->set('last_name', $dataUpdate['last_name']);
    $this->db->set('middle_name', $dataUpdate['middle_name']);
    $this->db->set('email_add', $dataUpdate['email_add']);
    $this->db->set('contact_no', $dataUpdate['contact_no']);
    $this->db->set('department_id', $dataUpdate['department_id']);
    $this->db->set('section_id', $dataUpdate['section_id']);
    $this->db->where('student_no', $dataUpdate['student_no']);
    $this->db->update('studentinfo_tbl');
    $this->db->set('password', $dataUpdate['password']);
    $this->db->where('user_id', $dataUpdate['user_id']);
    return $this->db->update('user_tbl');
  }

  public function archiveAdminData($user_id)
  {
    $this->db->set('account_status', "0");
    $this->db->where('user_id', $user_id);
    $this->db->update('admininfo_tbl');
    $this->db->set('acct_status', "0");
    $this->db->where('user_id', $user_id);
    return $this->db->update('user_tbl');
  }

  public function addAdminData($insertData)
  {
    $this->db->query('
      INSERT INTO admininfo_tbl
        (
          user_id,
          admin_no,
          first_name,
          middle_name,
          last_name,
          email_add,
          contact_no,
          account_status
        )
       VALUES(
         "'.$insertData["admin_no"].'",
         "'.$insertData["admin_no"].'",
         "'.$insertData["first_name"].'",
         "'.$insertData["middle_name"].'",
         "'.$insertData["last_name"].'",
         "'.$insertData["email_add"].'",
         "'.$insertData["contact_no"].'",
         "1")

    ');

    return $this->db->query('
      INSERT INTO user_tbl
        (
          user_id,
          username,
          password,
          acct_status,
          acct_id
        )
        VALUES
        (
          "'.$insertData["admin_no"].'",
          "'.$insertData["admin_no"].'",
          "'.$insertData["admin_no"].'",
          1,
          "2018001"
        )
    ');
  }

  public function addTeacherData($insertData)
  {
    $this->db->query('
      INSERT INTO teacherinfo_tbl
        (
          user_id,
          teacher_no,
          first_name,
          middle_name,
          last_name,
          email_add,
          contact_no,
          account_status,
          department_id
        )
       VALUES(
         "'.$insertData["user_id"].'",
         "'.$insertData["teacher_no"].'",
         "'.$insertData["first_name"].'",
         "'.$insertData["middle_name"].'",
         "'.$insertData["last_name"].'",
         "'.$insertData["email_add"].'",
         "'.$insertData["contact_no"].'",
         "1",
         "'.$insertData["department"].'")

    ');

    return $this->db->query('
      INSERT INTO user_tbl
        (
          user_id,
          username,
          password,
          acct_status,
          acct_id
        )
        VALUES
        (
          "'.$insertData["user_id"].'",
          "'.$insertData["user_id"].'",
          "'.$insertData["password"].'",
          1,
          "2018002"
        )
    ');
  }

  public function importTeacherData($dataImport, $dataImportAccount)
  {
    $this->db->insert_batch('teacherinfo_tbl', $dataImport);
    $this->db->insert_batch('user_tbl', $dataImportAccount);
  }

  public function importStudentData($dataImport2, $dataImportAccount2)
  {
    $this->db->insert_batch('studentinfo_tbl', $dataImport2);
    $this->db->insert_batch('user_tbl', $dataImportAccount2);
  }
}
