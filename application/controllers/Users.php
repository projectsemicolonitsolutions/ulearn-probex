<?php
/**
 *
 */
class Users extends CI_Controller
{

  function __construct()
  {
    parent:: __construct();
    if (!$this->session->userdata('admin')) {
			redirect(base_url());
		}
  }

  public function updateAdmin($admin_no = NULL)
  {
    $data = array(
      'admin_no' => $admin_no
    );
    $result = $this->qb->selectAdminRow($data);
    $array_data = array(
      'result' => $result
    );
    $this->load->view('edit_admin', $array_data);
  }

  public function updateTeacher($teacher_no = NULL)
  {
    $data = array(
      'teacher_no' => $teacher_no
    );
    $result = $this->qb->selectTeacherRow($data);
    $q = $this->qb->selectDepartment();
    $array_data = array(
      'result' => $result,
      'q' => $q
    );
    $this->load->view('edit_teacher', $array_data);
  }

  public function updateStudent($student_no = NULL)
  {
    $data = array(
      'student_no' => $student_no
    );
    $result = $this->qb->selectStudentRow($data);
    $q = $this->qb->selectDepartment();
    $r= $this->qb->selectSection();
    $array_data = array(
      'result' => $result,
      'q' => $q,
      'r' => $r
    );
    $this->load->view('edit_student', $array_data);
  }

  public function downloadForm()
  {
    //load our new PHPExcel library
    $this->load->library('excel');
    //activate worksheet number 1
    $this->excel->setActiveSheetIndex(0);
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('Teacher Account Form');
    //set cell A1 content with some text
    $this->excel->getActiveSheet()->setCellValue('A1', 'Teacher Number');
    $this->excel->getActiveSheet()->setCellValue('B1', 'First Name');
    $this->excel->getActiveSheet()->setCellValue('C1', 'Middle Name');
    $this->excel->getActiveSheet()->setCellValue('D1', 'Last Name');
    $this->excel->getActiveSheet()->setCellValue('E1', 'Email Address');
    $this->excel->getActiveSheet()->setCellValue('F1', 'Contact Number');
    $this->excel->getActiveSheet()->setCellValue('G1', 'Department');
    //make the font become bold
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    //set aligment to center for that merged cell (A1 to D1)
    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $filename='Teacher Account Form.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache

    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
    //if you want to save it as .XLSX Excel 2007 format
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');
  }

  public function downloadFormStudent()
  {
    //load our new PHPExcel library
    $this->load->library('excel');
    //activate worksheet number 1
    $this->excel->setActiveSheetIndex(0);
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('Student Account Form');
    //set cell A1 content with some text
    $this->excel->getActiveSheet()->setCellValue('A1', 'Student LRN Number');
    $this->excel->getActiveSheet()->setCellValue('B1', 'First Name');
    $this->excel->getActiveSheet()->setCellValue('C1', 'Middle Name');
    $this->excel->getActiveSheet()->setCellValue('D1', 'Last Name');
    $this->excel->getActiveSheet()->setCellValue('E1', 'Email Address');
    $this->excel->getActiveSheet()->setCellValue('F1', 'Contact Number');
    $this->excel->getActiveSheet()->setCellValue('G1', 'Department');
    $this->excel->getActiveSheet()->setCellValue('H1', 'Section');
    //make the font become bold
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    //set aligment to center for that merged cell (A1 to D1)
    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $filename='Student Account Form.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache

    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
    //if you want to save it as .XLSX Excel 2007 format
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');
  }

  public function importTeacher()
  {
    $this->load->library('excel');
    if (isset($_FILES['file']['name'])) {
      $teacher_no="";
      $first_name="";
      $middle_name="";
      $last_name="";
      $email_add="";
      $contact_no="";
      $department_id="";
      $path = $_FILES['file']['tmp_name'];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row=2; $row<=$highestRow; $row++) {
          $teacher_no = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $first_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $middle_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $last_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $email_add = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $contact_no = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $department_id = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $dataImport[] = array(
            'user_id' => $teacher_no,
            'teacher_no' => $teacher_no,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email_add' => $email_add,
            'contact_no' => $contact_no,
            'department_id' => $department_id,
            'account_status' => '1'
          );
          $dataImportAccount[] = array(
            'user_id' => $teacher_no,
            'username' => $teacher_no,
            'password' => $teacher_no,
            'acct_status' => 1,
            'acct_id' => '2018002'
          );
        }
      }
      $this->qb->importTeacherData($dataImport, $dataImportAccount);
      $url = base_url('users/teacher/');
      echo "<script>
              alert('Successfully added!');
              window.location.href = '$url';
            </script>";
    }
  }

  public function importStudent()
  {
    $this->load->library('excel');
    if (isset($_FILES['file']['name'])) {
      $student_no="";
      $first_name="";
      $middle_name="";
      $last_name="";
      $email_add="";
      $contact_no="";
      $department_id="";
      $section_id="";
      $path = $_FILES['file']['tmp_name'];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row=2; $row<=$highestRow; $row++) {
          $student_no = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $first_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $middle_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $last_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $email_add = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $contact_no = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $department_id = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $section_id = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
          $dataImport2[] = array(
            'user_id' => $student_no,
            'student_no' => $student_no,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email_add' => $email_add,
            'contact_no' => $contact_no,
            'department_id' => $department_id,
            'section_id' => $section_id,
            'account_status' => '1'
          );
          $dataImportAccount2[] = array(
            'user_id' => $student_no,
            'username' => $student_no,
            'password' => $student_no,
            'acct_status' => 1,
            'acct_id' => '2018003'
          );
        }
      }
      $this->qb->importStudentData($dataImport2, $dataImportAccount2);
      $url = base_url('users/student');
      echo "<script>
              alert('Successfully added!');
              window.location.href = '$url';
            </script>";
    }
  }

  public function updateData()
  {
    $admin_no = $this->input->post('admin_no');
    $user_id = $this->input->post('user_id');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $middle_name = $this->input->post('middle_name');
    $email_add = $this->input->post('email_add');
    $contact_no = $this->input->post('contact_no');
    $password = $this->input->post('password');
    $dataUpdate = array(
      'user_id' => $user_id,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'middle_name' => $middle_name,
      'email_add' => $email_add,
      'contact_no' => $contact_no,
      'password' => $password,
      'admin_no' => $admin_no
    );
    $result = $this->qb->updateAdminData($dataUpdate);
    $url = base_url('users/updateAdmin/'.$admin_no);
    echo "<script>
            alert('Successfully updated row!');
            window.location.href = '$url';
          </script>";
  }

  public function updateDataStudent()
  {
    if (isset($_POST['update'])) {
      $student_no = $this->input->post('student_no');
      $user_id = $this->input->post('user_id');
      $first_name = $this->input->post('first_name');
      $last_name = $this->input->post('last_name');
      $middle_name = $this->input->post('middle_name');
      $email_add = $this->input->post('email_add');
      $contact_no = $this->input->post('contact_no');
      $password = $this->input->post('password');
      $department_id = $this->input->post('department_id');
      $section_id = $this->input->post('section_id');
      $dataUpdate = array(
        'user_id' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'middle_name' => $middle_name,
        'email_add' => $email_add,
        'contact_no' => $contact_no,
        'password' => $password,
        'department_id' => $department_id,
        'section_id' => $section_id,
        'student_no' => $student_no
      );
      $result = $this->qb->updateStudentData($dataUpdate);
      $url = base_url('users/updateStudent/'.$student_no);
      // echo "<script>
      //         alert('Successfully updated row!');
      //         window.location.href = '$url';
      //       </script>";
      echo $user_id;
    }
  }

  public function updateDataTeacher()
  {
    $teacher_no = $this->input->post('teacher_no');
    $user_id = $this->input->post('user_id');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $middle_name = $this->input->post('middle_name');
    $email_add = $this->input->post('email_add');
    $contact_no = $this->input->post('contact_no');
    $password = $this->input->post('password');
    $department_id = $this->input->post('department_id');
    $dataUpdate = array(
      'user_id' => $user_id,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'middle_name' => $middle_name,
      'email_add' => $email_add,
      'contact_no' => $contact_no,
      'password' => $password,
      'teacher_no' => $teacher_no,
      'department_id' => $department_id
    );
    $result = $this->qb->updateTeacherData($dataUpdate);
    $url = base_url('users/updateTeacher/'.$teacher_no);
    echo "<script>
            alert('Successfully updated row!');
            window.location.href = '$url';
          </script>";
  }

  public function archiveAdmin($user_id = NULL)
  {
    $this->qb->archiveAdminData($user_id);
    $url = base_url('admin');
    echo "<script>
            alert('Successfully archived row!');
            window.location.href = '$url';
          </script>";
  }

  public function addAdminAccount()
  {
    $this->load->view('add-admin');
  }

  public function addTeacherAccount()
  {
    $result = $this->qb->departmentTables();
    $q = array('result' => $result);
    $this->load->view('add_teacher', $q);
  }

  public function addStudent()
  {
    $r = $this->qb->departmentTables();
    $s = $this->qb->sectionTables();
    $t = $this->qb->teacherTables();
    $ar = array(
      'r' => $r,
      's' => $s,
      't' => $t 
    );
    $this->load->view('add_student', $ar);
  }

  public function processAdd()
  {
    $admin_no = $this->input->post('admin_no');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $middle_name = $this->input->post('middle_name');
    $email_add = $this->input->post('email_add');
    $contact_no = $this->input->post('contact_no');
    $url = base_url('users/addAdminAccount');

      $insertData = array(
        'admin_no' => $admin_no,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'middle_name' => $middle_name,
        'email_add' => $email_add,
        'contact_no' => $contact_no
      );
      $this->qb->addAdminData($insertData);
      echo "<script>
              alert('Successfully added Admin Data!');
              alert('Username and password is: $admin_no ');
              window.location.href = '$url';
            </script>";

  }

  public function processAddTeacher()
  {
    $teacher_no = $this->input->post('teacher_no');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $middle_name = $this->input->post('middle_name');
    $email_add = $this->input->post('email_add');
    $contact_no = $this->input->post('contact_no');
    $department= $this->input->post('department');
    $url = base_url('users/addTeacherAccount');

      $insertData = array(
        'user_id' => $teacher_no,
        'password' => $teacher_no,
        'teacher_no' => $teacher_no,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'middle_name' => $middle_name,
        'email_add' => $email_add,
        'contact_no' => $contact_no,
        'department' => $department
      );
      if ($this->qb->addTeacherData($insertData)) {
        echo "<script>
                alert('Successfully added Teacher Data');
                alert('Username and password is: $teacher_no');
                window.location.href = '$url';
              </script>";
      }
      else {
        echo "<script>
                alert('Failed');
                window.location.href = '$url';
              </script>";
      }


  }

  public function processAddStudent()
  {
    $user_id = $this->input->post('user_id');
    $password = $this->input->post('password');
    $teacher_no = $this->input->post('teacher_no');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $middle_name = $this->input->post('middle_name');
    $email_add = $this->input->post('email_add');
    $contact_no = $this->input->post('contact_no');
    $department= $this->input->post('department');
    $url = base_url('users/addTeacherAccount');

      $insertData = array(
        'user_id' => $user_id,
        'password' => $password,
        'teacher_no' => $teacher_no,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'middle_name' => $middle_name,
        'email_add' => $email_add,
        'contact_no' => $contact_no,
        'department' => $department
      );
      if ($this->qb->addTeacherData($insertData)) {
        echo "<script>
                alert('Successfully added Teacher Data');
                window.location.href = '$url';
              </script>";
      }
      else {
        echo "<script>
                alert('Failed');
                window.location.href = '$url';
              </script>";
      }


  }

  public function admin()
  {
    $result = $this->qb->adminTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('admin_accounts', $q);
  }

  public function teacher()
  {
    $result = $this->qb->teacherTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('teacher_accounts', $q);
  }

  public function student()
  {
    $result = $this->qb->studentTables();
    $q = array(
      'result' => $result
    );
    $this->load->view('student_accounts', $q);
  }
}
