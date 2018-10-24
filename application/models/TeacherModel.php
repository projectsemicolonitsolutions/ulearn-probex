<?php
/**
 *
 */
class TeacherModel extends CI_Model
{

  function __construct()
  {
    parent:: __construct();
    $this->load->database();
  }

  public function displayStudents()
  {
    return $this->db->query('
      SELECT * FROM user_tbl AS a
      INNER JOIN studentinfo_tbl AS b
      ON a.user_id = b.user_id'
    );
  }

  public function changePassword($changeData)
  {
    return  $this->db->query('
      UPDATE user_tbl
      SET password = "'.$changeData['new_password'].'",
      check_password = 1
      WHERE user_id = "'.$changeData['user_id'].'"'
    );
  }

  public function skipChange($user_id)
  {
    return $this->db->query('
      UPDATE user_tbl
      SET check_password = 1
      WHERE user_id = "'.$user_id.'"
    ');
  }
}
