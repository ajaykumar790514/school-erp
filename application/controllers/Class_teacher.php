<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLass_teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
  
    public function index()
    {
        $this->load->view('erp/login');
    }
 
     public function logout()
     {
        unset($this->session->MLogin);
		session_destroy();
		redirect(base_url());
     }
 
    public function dashboard()
    {
        $id=$_SESSION['MUserId'];
        $data['title']='Class Teacher Dashboard';
        $data['total_notice']=$this->class_teacher_model->count_row_notice('notice_master');
        $data['total_gate_pass']=$this->class_teacher_model->count_row_gatepass();
        $data['total_student']=$this->class_teacher_model->count_row_student($id);
        $data['total_notes']=$this->class_teacher_model->count_row_notes('tb_notes');
        $data['total_home_work']=$this->class_teacher_model->count_row_hw();
        $data['total_subject']  =$this->class_teacher_model->count_row('subject_master');
        $data['total_student_leave']=$this->teacher_model->count_row_student_leave('student_leave');
        $data['roles'] = $this->erp_model->view_role($id);
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/index',$data);
        $this->load->view('erp/class_teacher/footer');
    }
    public function profile($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);  
        $data['title']             = 'My Profile';
        $data['tb_url']            = current_url().'/tb';
        $data['search']            = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/my_profile',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'edit-image':
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
    
            if ($this->input->server('REQUEST_METHOD')=='POST') { 
            $id=$_SESSION['MUserId'];
            $config['file_name'] = rand(10000, 10000000000);    
            $config['upload_path'] = UPLOAD_PATH.'teacher/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
     
            if (!empty($_FILES['file']['name'])) {
     
              //upload doc
              $_FILES['files']['name'] = $_FILES['file']['name'];
              $_FILES['files']['type'] = $_FILES['file']['type'];
              $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'];
              $_FILES['files']['size'] = $_FILES['file']['size'];
              $_FILES['files']['error'] = $_FILES['file']['error'];
     
              if ($this->upload->do_upload('files')) {
                  $image_data = $this->upload->data();
               
                  $fileName = "teacher/" . $image_data['file_name'];
              }
             $file=$data['file'] = $fileName;
              } else {
             $file = $data['file'] = "";
             }
            $data = array(
                'self_pic'       =>$file,
             );
             if ($this->teacher_model->Update('teacher_master',$data,['id'=>$p1])) {
            $return['res'] = 'success';
             $return['msg'] = 'Saved.';
             }
           }
           echo json_encode($return);
            break;
        case 'edit-details':
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
    
            if ($this->input->server('REQUEST_METHOD')=='POST') { 
            $id=$_SESSION['MUserId'];
            $rs = $this->teacher_model->getDataID('teacher_master',$_SESSION['MUserId']);
            $config['file_name'] = rand(10000, 10000000000);    
            $config['upload_path'] = UPLOAD_PATH.'teacher/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
           
            if (!empty($_FILES['adharfile']['name'])) {
              $_FILES['adharfiles']['name'] = $_FILES['adharfile']['name'];
              $_FILES['adharfiles']['type'] = $_FILES['adharfile']['type'];
              $_FILES['adharfiles']['tmp_name'] = $_FILES['adharfile']['tmp_name'];
              $_FILES['adharfiles']['size'] = $_FILES['adharfile']['size'];
              $_FILES['adharfiles']['error'] = $_FILES['adharfile']['error'];
     
              if ($this->upload->do_upload('adharfiles')) {
                  $image_data = $this->upload->data();
               
                  $fileName = "teacher/" . $image_data['file_name'];
              }
             $aadhaar_file_front=$data['adharfile'] = $fileName;
              } else {
             $aadhaar_file_front = $rs->adharfile;
             }

             if (!empty($_FILES['adhaarfile_back']['name'])) {
                $_FILES['adhaarfile_backs']['name'] = $_FILES['adhaarfile_back']['name'];
                $_FILES['adhaarfile_backs']['type'] = $_FILES['adhaarfile_back']['type'];
                $_FILES['adhaarfile_backs']['tmp_name'] = $_FILES['adhaarfile_back']['tmp_name'];
                $_FILES['adhaarfile_backs']['size'] = $_FILES['adhaarfile_back']['size'];
                $_FILES['adhaarfile_backs']['error'] = $_FILES['adhaarfile_back']['error'];
       
                if ($this->upload->do_upload('adhaarfile_backs')) {
                    $image_data = $this->upload->data();
                 
                    $fileName = "teacher/" . $image_data['file_name'];
                }
               $aadhaar_file_back=$data['adhaarfile_back'] = $fileName;
                } else {
               $aadhaar_file_back = $rs->adhaarfile_back;
               }

               if (!empty($_FILES['panfile']['name'])) {
                $_FILES['panfiles']['name'] = $_FILES['panfile']['name'];
                $_FILES['panfiles']['type'] = $_FILES['panfile']['type'];
                $_FILES['panfiles']['tmp_name'] = $_FILES['panfile']['tmp_name'];
                $_FILES['panfiles']['size'] = $_FILES['panfile']['size'];
                $_FILES['panfiles']['error'] = $_FILES['panfile']['error'];
       
                if ($this->upload->do_upload('panfiles')) {
                    $image_data = $this->upload->data();
                 
                    $fileName = "teacher/" . $image_data['file_name'];
                }
               $pan_file=$data['panfile'] = $fileName;
                } else {
               $pan_file = $rs->panfile;
               }

               if (!empty($_FILES['bank_passbook']['name'])) {
                $_FILES['bank_passbooks']['name'] = $_FILES['bank_passbook']['name'];
                $_FILES['bank_passbooks']['type'] = $_FILES['bank_passbook']['type'];
                $_FILES['bank_passbooks']['tmp_name'] = $_FILES['bank_passbook']['tmp_name'];
                $_FILES['bank_passbooks']['size'] = $_FILES['bank_passbook']['size'];
                $_FILES['bank_passbooks']['error'] = $_FILES['bank_passbook']['error'];
       
                if ($this->upload->do_upload('bank_passbooks')) {
                    $image_data = $this->upload->data();
                 
                    $fileName = "teacher/" . $image_data['file_name'];
                }
               $bank_file=$data['bank_passbook'] = $fileName;
                } else {
               $bank_file =$rs->bank_passbook;
               }

            $data = array(
                'username'     => $this->input->post('username'),
                'email'     => $this->input->post('email'),
                'name'     => $this->input->post('name'),
                'father_name'     => $this->input->post('father_name'),
                'phone'     => $this->input->post('phone'),
                'joindate'     =>$this->input->post('joindate'),
                'teaching_qualification' =>$this->input->post('teaching_qualification'),
                'address'       =>$this->input->post('address'),
                'adhaar'       =>$this->input->post('adhaar'),
                'pan'       =>$this->input->post('pan'),
                'account_holder_name'       =>$this->input->post('account_holder_name'),
                'account_number'       =>$this->input->post('account_number'),
                'bank'       =>$this->input->post('bank'),
                'ifsc'       =>$this->input->post('ifsc'),
                'adharfile'       =>$aadhaar_file_front,
                'adhaarfile_back'       =>$aadhaar_file_back,
                'panfile'       =>$pan_file,
                'bank_passbook'       =>$bank_file,
             );
             if ($this->teacher_model->Update('teacher_master',$data,['id'=>$p1])) {
            $return['res'] = 'success';
             $return['msg'] = 'Saved.';
             }
           }
           echo json_encode($return);
        break; 
        case 'change-password':
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
    
            if ($this->input->server('REQUEST_METHOD')=='POST') { 
            $id=$_SESSION['MUserId'];
         
            if($this->input->post('password')==$this->input->post('cpassword')){
                $data = array(
                    'password'     => $this->input->post('password'),
                 );
             if ($this->teacher_model->Update('teacher_master',$data,['id'=>$p1])) {
            $return['res'] = 'success';
             $return['msg'] = 'Update.';
             }
            }else
            {
                $return['res'] = 'error';
                $return['msg'] = 'Sorry! Password & Confirm Password does not match.';
            }
           }
           echo json_encode($return);
        break;    
     
            default:
        # code...
        break;
        }
    }

    public function my_notice($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);  
        $data['title']             = 'Notice Board';
        $data['tb_url']            = current_url().'/tb';
        $data['search']            = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/my_notice',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'tb':
          
            $this->load->library('pagination');
            $config = array();
            $config["base_url"]     = base_url()."class-teacher-notice/tb";
            $config["total_rows"]   = count($this->class_teacher_model->my_totice());
            $data['total_rows']     = $config["total_rows"];
            $config["per_page"]     = 10;
            $config["uri_segment"]  = 2;
            $config['attributes']   = array('class' => 'pag-link ');
            $this->pagination->initialize($config);
            $data['links']          = $this->pagination->create_links();
            $data['page']           = $page = ($p1!=null) ? $p1 : 0;
            $data['search']         = $this->input->post('search');
            $data['rows']           = $this->class_teacher_model->my_totice($config["per_page"],$page);
            $page                       = 'erp/class_teacher/tb_notice';
            $this->load->view($page, $data); 
            break;
     
            default:
        # code...
        break;
        }
    }  

    public function upload_notes($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $data['menu_id'] = $this->uri->segment(2);
        $id=$_SESSION['MUserId'];
         $data['roles'] = $this->erp_model->view_role($id);
        $data['title']          = 'Upload Notes';
        $data['tb_url']            = current_url().'/tb';
        $data['search']           = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/upload_notes',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'tb':
           $tea_id=$id=$_SESSION['MUserId'];
            $this->load->library('pagination');
            $config = array();
            $config["base_url"]     = base_url()."class-teacher-upload-notes/tb";
            $config["total_rows"]   = count($this->class_teacher_model->upload_notes($tea_id));
            $data['total_rows']     = $config["total_rows"];
            $config["per_page"]     = 10;
            $config["uri_segment"]  = 2;
            $config['attributes']   = array('class' => 'pag-link ');
            $this->pagination->initialize($config);
            $data['links']          = $this->pagination->create_links();
            $data['page']           = $page = ($p1!=null) ? $p1 : 0;
            $data['search']         = $this->input->post('search');
            $data['delete_url']         = base_url().'class-teacher-upload-notes/delete/';
            $data['update_url']       =base_url().'class-teacher-upload-notes/update/';
            $data['new_url']         = base_url().'class-teacher-upload-notes/create/';
            $data['rows']           = $this->class_teacher_model->upload_notes($tea_id,$config["per_page"],$page);
            $page                       = 'erp/class_teacher/tb_upload_notes';
            $this->load->view($page, $data); 
            break;
        case 'create':
        
        $data['action_url']         = base_url().'class-teacher-upload-notes/save/'.$p1;
        $page           = 'erp/class_teacher/create_upload_notes';
        $data['map']    =$this->class_teacher_model->SST_MAP($p1);
        $data['form_id']            = uniqid();
        $this->load->view($page, $data);
        break;


        case 'save':
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';

        if ($this->input->server('REQUEST_METHOD')=='POST') { 
        $id=$_SESSION['MUserId'];
        $config['file_name'] = rand(10000, 10000000000);    
        $config['upload_path'] = UPLOAD_PATH.'notes/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if (!empty($_FILES['file']['name'])) {
 
          //upload doc
          $_FILES['files']['name'] = $_FILES['file']['name'];
          $_FILES['files']['type'] = $_FILES['file']['type'];
          $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'];
          $_FILES['files']['size'] = $_FILES['file']['size'];
          $_FILES['files']['error'] = $_FILES['file']['error'];
 
          if ($this->upload->do_upload('files')) {
              $image_data = $this->upload->data();
           
              $fileName = "notes/" . $image_data['file_name'];
          }
         $file=$data['file'] = $fileName;
          } else {
         $file = $data['file'] = "";
         }
        $data = array(
            'sst_id'     => $this->input->post('sst_id'),
            'sec_id'     => $this->input->post('sec_id'),
            'sub_id'     => $this->input->post('sub_id'),
            'tea_id'     => $this->input->post('tea_id'),
            'sub_name'     => $this->input->post('sub_name'),
            'status'     =>1,
            'created_by' =>$id,
            'file'       =>$file,
            'date' =>date('Y-m-d'),
         );
         $count = $this->erp_model->Counter('tb_notes', array('sst_id'=>$this->input->post('sst_id'),'sec_id'=>$this->input->post('sec_id'),'sub_id'=>$this->input->post('sub_id'),'tea_id'=>$this->input->post('tea_id'),'date'=>date('Y-m-d'),'is_deleted'=>'NOT_DELETED'));
        if($count==0){
         if ($this->erp_model->Save('tb_notes',$data)) {
        $return['res'] = 'success';
         $return['msg'] = 'Saved.';
         }
        }else
        {
            $return['res'] = 'error';
            $return['msg'] = 'Today this subject notes already uploaded.';
        }
       }
       echo json_encode($return);
        break;
            default:
        # code...
        break;
        }
    }   
  
	public function change_status()
	{
		if ($this->input->is_ajax_request()) {
			$data = explode(',',$_POST['data']);
			$id 	= $data[0];
			$tb 	= $data[1];
			$id_column  = $data[2];
			$val_column  = $data[3];
			$update = array($val_column => $_POST['value'] );
			$cond = [$id_column => $id];
			$column = "column='$id_column'";
			
			$this->erp_model->Update($tb,$update,$cond);
			$status = $this->erp_model->getRow($tb,$cond)->$val_column;

			if ($status==1) {
				echo "<span class='changeStatus'  data-toggle='change-status' value='0' data='".$_POST['data']."' title='Click for chenage status' ><i class='fa-regular fa-circle-check' style='color:green'></i></span>";
			} 
			else{
				echo "<span class='changeStatus' data-toggle='change-status' value='1' data='".$_POST['data']."'  title='Click for chenage status'><i class='fa-solid fa-circle-xmark' style='color:red'></i></span>";
			}	
		}
	}
    public function view_notes($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);         
        $data['title']             = 'All Uploaded Notes';
        $data['tb_url']            = current_url().'/tb';
        $data['search']            = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/view_notes',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'tb':
          $tea_id = $id=$_SESSION['MUserId'];
            $this->load->library('pagination');
            $config = array();
            $config["base_url"]     = base_url()."class-teacher-view-notes/tb";
            $config["total_rows"]   = count($this->class_teacher_model->view_notes($tea_id));
            $data['total_rows']     = $config["total_rows"];
            $config["per_page"]     = 10;
            $config["uri_segment"]  = 2;
            $config['attributes']   = array('class' => 'pag-link ');
            $this->pagination->initialize($config);
            $data['links']          = $this->pagination->create_links();
            $data['page']           = $page = ($p1!=null) ? $p1 : 0;
            $data['search']         = $this->input->post('search');
            $data['delete_url']         = base_url().'class-teacher-view-notes/delete/';
            $data['update_url']       =base_url().'class-teacher-view-notes/create/';
            $data['rows']           = $this->class_teacher_model->view_notes($tea_id,$config["per_page"],$page);
            $page                       = 'erp/class_teacher/tb_view_notes';
            $this->load->view($page, $data); 
            break;
            case 'delete':
                $return['res'] = 'error';
                $return['msg'] = 'Not Deleted!';
                if ($p1!=null) {
                if($this->erp_model->_delete('tb_notes',['id'=>$p1])){
                        $saved = 1;
                        $return['res'] = 'success';
                        $return['msg'] = 'Successfully deleted.';
                    }
                }
                echo json_encode($return);
            break;
            case 'create':
        
                $data['action_url']         = base_url().'class-teacher-view-notes/save/'.$p1;
                $page           = 'erp/class_teacher/update_notes';
                $data['form_id']            = uniqid();
                $this->load->view($page, $data);
            break;
            case 'save':
                $id = $p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
        
                if ($this->input->server('REQUEST_METHOD')=='POST') { 
                    $config['file_name'] = rand(10000, 10000000000);    
                    $config['upload_path'] = UPLOAD_PATH.'notes/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
             
                    if (!empty($_FILES['file']['name'])) {
             
                      //upload doc
                      $_FILES['files']['name'] = $_FILES['file']['name'];
                      $_FILES['files']['type'] = $_FILES['file']['type'];
                      $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'];
                      $_FILES['files']['size'] = $_FILES['file']['size'];
                      $_FILES['files']['error'] = $_FILES['file']['error'];
             
                      if ($this->upload->do_upload('files')) {
                          $image_data = $this->upload->data();
                       
                          $fileName = "notes/" . $image_data['file_name'];
                      }
                     $file=$data['file'] = $fileName;
                      } else {
                     $file = $data['file'] = "";
                     }
                 $data = array(
                 'file'     => $file,
                  );
                 if ($this->erp_model->UpdateData('tb_notes',$data,$p1)) {
                 $return['res'] = 'success';
                  $return['msg'] = 'Saved.';
                             
                  
             }
                }
                
                echo json_encode($return);
                break;
            default:
        # code...
        break;
        }
    }   
    public function upload_hw($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $data['menu_id'] = $this->uri->segment(2);
        $id=$_SESSION['MUserId'];
         $data['roles'] = $this->erp_model->view_role($id);
        $data['title']          = 'Upload Home Work';
        $data['tb_url']            = current_url().'/tb';
        $data['search']           = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/upload_hw',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'tb':
           $tea_id=$id=$_SESSION['MUserId'];
            $this->load->library('pagination');
            $config = array();
            $config["base_url"]     = base_url()."class-teacher-upload-hw/tb";
            $config["total_rows"]   = count($this->class_teacher_model->upload_notes($tea_id));
            $data['total_rows']     = $config["total_rows"];
            $config["per_page"]     = 10;
            $config["uri_segment"]  = 2;
            $config['attributes']   = array('class' => 'pag-link ');
            $this->pagination->initialize($config);
            $data['links']          = $this->pagination->create_links();
            $data['page']           = $page = ($p1!=null) ? $p1 : 0;
            $data['search']         = $this->input->post('search');
            $data['delete_url']         = base_url().'class-teacher-upload-hw/delete/';
            $data['update_url']       =base_url().'class-teacher-upload-hw/update/';
            $data['new_url']         = base_url().'class-teacher-upload-hw/create/';
            $data['rows']           = $this->class_teacher_model->upload_notes($tea_id,$config["per_page"],$page);
            $page                       = 'erp/class_teacher/tb_hw';
            $this->load->view($page, $data); 
            break;
        case 'create':
        
        $data['action_url']         = base_url().'class-teacher-upload-hw/save/'.$p1;
        $page           = 'erp/class_teacher/create_hw';
        $data['map']    =$this->class_teacher_model->SST_MAP($p1);
        $data['topic']    =$this->class_teacher_model->view_data('subject_topic_master');
        $data['form_id']            = uniqid();
        $this->load->view($page, $data);
        break;


        case 'save':
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';

        if ($this->input->server('REQUEST_METHOD')=='POST') { 
        $id=$_SESSION['MUserId'];
        $config['file_name'] = rand(10000, 10000000000);    
        $config['upload_path'] = UPLOAD_PATH.'home_work/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if (!empty($_FILES['file']['name'])) {
 
          //upload doc
          $_FILES['files']['name'] = $_FILES['file']['name'];
          $_FILES['files']['type'] = $_FILES['file']['type'];
          $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'];
          $_FILES['files']['size'] = $_FILES['file']['size'];
          $_FILES['files']['error'] = $_FILES['file']['error'];
 
          if ($this->upload->do_upload('files')) {
              $image_data = $this->upload->data();
           
              $fileName = "home_work/" . $image_data['file_name'];
          }
         $file=$data['file'] = $fileName;
          } else {
         $file = $data['file'] = "";
         }
        $data = array(
            'sst_id'     => $this->input->post('sst_id'),
            'sec_id'     => $this->input->post('sec_id'),
            'sub_id'     => $this->input->post('sub_id'),
            'sub_name'     => $this->input->post('sub_name'),
            'topic_id'     => $this->input->post('topic'),
            'home_work'     => $this->input->post('hw'),
            'status'     =>1,
            'created_by' =>$id,
            'hw_file'       =>$file,
            'hw_date' =>$this->input->post('date'),
         );
         $count = $this->erp_model->Counter('t_student_hw', array('sst_id'=>$this->input->post('sst_id'),'sec_id'=>$this->input->post('sec_id'),'sub_id'=>$this->input->post('sub_id'),'hw_date'=>date('Y-m-d'),'is_deleted'=>'NOT_DELETED','status'=>'1'));
        if($count==0){
         if ($this->erp_model->Save('t_student_hw',$data)) {
        $return['res'] = 'success';
         $return['msg'] = 'Saved.';
         }
        }else
        {
            $return['res'] = 'error';
            $return['msg'] = 'Today this subject home work already uploaded.';
        }
       }
       echo json_encode($return);
        break;
        case 'view_hw':
            $data['menu_id'] = $this->uri->segment(2);
            $id=$_SESSION['MUserId'];
             $data['roles'] = $this->erp_model->view_role($id);
            $data['title']          = 'View Home Work';
            $data['rows']    =$this->class_teacher_model->view_hw($p1);
            $this->load->view('erp/class_teacher/header',$data);
            $this->load->view('erp/class_teacher/view_hw',$data);
            $this->load->view('erp/class_teacher/footer');
        break; 
        case 'submit-check':
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
        
                if ($this->input->server('REQUEST_METHOD')=='POST') { 
                $data = array(
                    'teacher_status'     => $this->input->post('check'),
                    'teacher_check'     => $this->input->post('remark'),
                 );
                 if ($this->class_teacher_model->Updates('stu_hw_submit',$data,['hw_submit_date'=>$this->input->post('hw_date'),'student_id'=>$this->input->post('stu_id')])) {
                $return['res'] = 'success';
                 $return['msg'] = 'Checked.';
                 }
               }
               echo json_encode($return);
                
        break;    
            default:
        # code...
        break;
        }
    }   

    public function student_gatepass($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
        case null:
        $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);
        $data['title']          = 'Student Gate Pass';
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/stu_gate_pass',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'search_data':
        $id=$_SESSION['MUserId'];
        $searchTerm = $this->input->post('searchTerm');
        $data = $this->class_teacher_model->search_data($id,$searchTerm);
        echo json_encode($data);
        break;  
        
        case 'createpass':
        $id=$_SESSION['MUserId'];
        $data['roles']          = $this->erp_model->view_role($id);
        $data['title']          = 'Student Gate Pass';
        $data['student']        = $this->class_teacher_model->get_student_row($p1);
        $data['rows']           = $this->class_teacher_model->get_pass($p1);
        $data['action_url']     = base_url().'class-teacher-student-gate-pass/save/'.$p1;
        $data['delete_url']     = base_url().'class-teacher-student-gate-pass/delete/';
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/gate_pass',$data);
        $this->load->view('erp/class_teacher/footer');
        break;   
       
        case 'save':
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';
        if ($this->input->server('REQUEST_METHOD')=='POST') { 
        $id=$_SESSION['MUserId'];
        $data = array(
            'stu_id'     => $this->input->post('stu_id'),
            'reason'     => $this->input->post('reason'),
            'status'     =>1,
            'created_by' =>$id,
            'class_teacher_check'=>'1',
            'type'       =>'class_teacher',
            'date' =>$this->input->post('date'),
         );
         $count = $this->erp_model->Counter('student_gate_pass', array('stu_id'=>$this->input->post('stu_id'),'date'=>$this->input->post('date'),'is_deleted'=>'NOT_DELETED','status'=>'1'));
        if($count==0){
         if ($this->erp_model->Save('student_gate_pass',$data)) {
        $return['res'] = 'success';
         $return['msg'] = 'Successfully created.';
         }
        }else
        {
            $return['res'] = 'error';
            $return['msg'] = 'Today this student gate pass already created.';
        }
       }
       echo json_encode($return);
     break;
     case 'delete':
        $return['res'] = 'error';
        $return['msg'] = 'Not Deleted!';
        if ($p1!=null) {
        if($this->erp_model->_delete('student_gate_pass',['id'=>$p1])){
                $saved = 1;
                $return['res'] = 'success';
                $return['msg'] = 'Successfully deleted.';
            }
        }
        echo json_encode($return);
    break;
            default:
        # code...
        break;
        }
    }   

    public function student_master($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
        case null:
        $data['menu_id'] = $this->uri->segment(2);
        $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);
        $data['title']          = 'Section Wise Total No. of Student';
        $data['student']         = $this->class_teacher_model->class_wise_student($id);
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/student_master',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        
        case 'section':
          $id=$_SESSION['MUserId'];
          $data['roles'] = $this->erp_model->view_role($id);
          $data['title']          = 'Section Wise Total No. of Student';
          $data['student']         = $this->class_teacher_model->section_student($p1);
          $this->load->view('erp/class_teacher/header',$data);
          $this->load->view('erp/class_teacher/student_list',$data);
          $this->load->view('erp/class_teacher/footer');
        break;  
        
            default:
        # code...
        break;
        }
    } 
    public function subject_topic($action=null,$p1=null,$p2=null,$p3=null)
    {
        switch ($action) {
            case null:
        $data['menu_id'] = $this->uri->segment(2);
        $id=$_SESSION['MUserId'];
         $data['roles'] = $this->erp_model->view_role($id);
         $data['subject']         = $this->class_teacher_model->view_data('subject_master');
        $data['title']          = 'Subject Topic Master';
        $data['new_url']         = base_url().'class-subject-topic-master/create ';
        $data['tb_url']            = current_url().'/tb';
        $data['search']           = $this->input->post('search');
        $this->load->view('erp/class_teacher/header',$data);
        $this->load->view('erp/class_teacher/subject_topic',$data);
        $this->load->view('erp/class_teacher/footer');
        break;
        case 'tb':
            if(!empty($_POST['subject'])){
                $subject =   $data['subject'] = $_POST['subject'] ;
                 
               }else{
                   $subject =  $data['subject'] = '' ;
               }
            $this->load->library('pagination');
            $config = array();
            $config["base_url"]     = base_url()."class-subject-topic-master/tb";
            $config["total_rows"]   = count($this->class_teacher_model->subject_topic_master($subject));
            $data['total_rows']     = $config["total_rows"];
            $config["per_page"]     = 10;
            $config["uri_segment"]  = 2;
            $config['attributes']   = array('class' => 'pag-link ');
            $this->pagination->initialize($config);
            $data['links']          = $this->pagination->create_links();
            $data['page']           = $page = ($p1!=null) ? $p1 : 0;
            $data['search']         = $this->input->post('search');
            $data['delete_url']         = base_url().'class-subject-topic-master/delete/';
            $data['update_url']       =base_url().'class-subject-topic-master/create/';
            $data['rows']           = $this->class_teacher_model->subject_topic_master($subject,$config["per_page"],$page);
            $page                       = 'erp/class_teacher/tb_topic';
            $this->load->view($page, $data); 
            break;
        case 'create':
        $data['remote']     = base_url().'subject_remote/subject/';
        $data['action_url']         = base_url().'class-subject-topic-master/save';
        $data['subject']         = $this->class_teacher_model->view_data('subject_master');
        $data['total_data']=0;
        $page               = 'erp/class_teacher/topic_create';
        if ($p1!=null) {
        $data['action_url']         = base_url().'subject-topic-master/save/'.$p1;
        $data['topic']         = $this->class_teacher_model->view_data_id('subject_topic_master',$p1);
        $data['subject']         = $this->class_teacher_model->view_data('subject_master');
        $data['total_data']         = $this->class_teacher_model->count_row_id('subject_topic_master',$p1);
        $page           = 'erp/class_teacher/topic_create';
            }
        $data['form_id']            = uniqid();
        
        $this->load->view($page, $data);
        break;


        case 'save':
        $id = $p1;
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';

        if ($this->input->server('REQUEST_METHOD')=='POST') { 
   	 //doc upload code
     if($p1!=null){
     
         $data = array(
            'sub_id'     => $this->input->post('sub'),
            'topic_name'     => $this->input->post('name'),
          );
         if ($this->erp_model->UpdateData('subject_topic_master',$data,$p1)) {
         $return['res'] = 'success';
          $return['msg'] = 'Saved.';
                     
          }
     }else
     {
        $id=$_SESSION['MUserId'];
        $data = array(
            'sub_id'     => $this->input->post('sub'),
            'topic_name'     => $this->input->post('name'),
            'status'        =>1,
            'created_by'      =>$id,
         );
        if ($this->erp_model->Save('subject_topic_master',$data)) {
        $return['res'] = 'success';
         $return['msg'] = 'Saved.';
                    
         }
     }
	  
        }
        
        echo json_encode($return);
        break;
   
        case 'delete':
            $return['res'] = 'error';
            $return['msg'] = 'Not Deleted!';
            if ($p1!=null) {
            if($this->erp_model->_delete('subject_topic_master',['id'=>$p1])){
                    $saved = 1;
                    $return['res'] = 'success';
                    $return['msg'] = 'Successfully deleted.';
                }
            }
            echo json_encode($return);
            break;
            default:
        # code...
        break;
        }
    
}
    
public function student_attendance_register($action=null,$p1=null,$p2=null,$p3=null)
{
    switch ($action) {
    case null:
    $data['menu_id'] = $this->uri->segment(2);
    $id=$_SESSION['MUserId'];
    $data['roles'] = $this->erp_model->view_role($id);
    $data['title']          = 'Student Attendance Register';
    $data['tb_url']            = current_url().'/tb';
    $data['search']           = $this->input->post('search');
    $data['sections']         = $this->class_teacher_model->find_section($id);
    if(!empty($_POST['section'])){ 
        $data['section'] = $section = $_POST['section'];
        $data['Attmonth'] = $attDate = $_POST['Attmonth'];
            
            }
            else{ 
            $data['section'] = $section = '0';
        $data['Attmonth'] = $Attmonth = date('m');
            }
    $data['student']         = $this->class_teacher_model->attendance_student($section);        
    $this->load->view('erp/class_teacher/header',$data);
    $this->load->view('erp/class_teacher/student_attendance_register',$data);
    $this->load->view('erp/class_teacher/footer');
    break;
      case 'tb':
       if(!empty($_POST['section'])){ 
        $data['section'] = $section = $_POST['section'];
        $data['Attmonth'] = $Attmonth = $_POST['Attmonth'];
       }
       else{ 
         $data['section'] = $section = '0';
        $data['Attmonth'] = $Attmonth = date('m');
            }
        $tea_id=$id=$_SESSION['MUserId'];
        $data['rows']           = $this->class_teacher_model->view_attendance($section,$Attmonth);
        $page                       = 'erp/class_teacher/tb_attendance';
        $this->load->view($page, $data); 
        break;
        default:
    # code...
    break;
    }
} 

public function time_table($action=null,$p1=null,$p2=null,$p3=null)
{
    switch ($action) {
        case null:
    $data['menu_id'] = $this->uri->segment(2);
    $id=$_SESSION['MUserId'];
     $data['roles'] = $this->erp_model->view_role($id);
    $data['title']          = 'My Time Table';
    $data['tb_url']            = current_url().'/tb';
    $data['new_url']            = current_url().'/create';
    $data['search']           = $this->input->post('search');
    $data['section']         = $this->class_teacher_model->find_section($id);
    $this->load->view('erp/class_teacher/header',$data);
    $this->load->view('erp/class_teacher/timetable_master',$data);
    $this->load->view('erp/class_teacher/footer');
    break;
    case 'tb':
        $tea_id=$id=$_SESSION['MUserId'];
        if(!empty($_POST['section']))
        {
           $section =  $data['section'] = $_POST['section'];
        }
        else
        {
           $section =  $data['section']= '';
        }
        $data['section_name']   = $this->class_teacher_model->view_data_id('section_master',$section);
        $data['period']         = $this->class_teacher_model->view_period_data('section_periods');
        $page                       = 'erp/class_teacher/tb_timetable';
        $this->load->view($page, $data); 
        break;
   
        default:
    # code...
    break;
    }
}

public function teacher_student_leave_request($action=null,$p1=null,$p2=null,$p3=null)
{
    switch ($action) {
    case null:
    $data['menu_id'] = $this->uri->segment(2);
    $id=$_SESSION['MUserId'];
    $data['roles'] = $this->erp_model->view_role($id);
    $data['title']          = 'Student Leave Request';
    $data['tb_url']            = current_url().'/tb';
    $data['search']           = $this->input->post('search');
    $this->load->view('erp/class_teacher/header',$data);
    $this->load->view('erp/class_teacher/student_leave_request',$data);
    $this->load->view('erp/class_teacher/footer');
    break;
    case 'tb':
        $userid=$id=$_SESSION['MUserId'];
        $this->load->library('pagination');
        $config = array();
        $config["base_url"]     = base_url()."class-teacher-student-marks-upload/tb";
        $config["total_rows"]   = count($this->class_teacher_model->getStudentLeave());
        $data['total_rows']     = $config["total_rows"];
        $config["per_page"]     = 10;
        $config["uri_segment"]  = 2;
        $config['attributes']   = array('class' => 'pag-link ');
        $this->pagination->initialize($config);
        $data['links']          = $this->pagination->create_links();
        $data['page']           = $page = ($p1!=null) ? $p1 : 0;
        $data['search']         = $this->input->post('search');
        $data['action_url']         = base_url().'class-teacher-student-leave-request/save';
        $data['reply_url']         = base_url().'class-teacher-student-leave-request/open_model';
        $data['rows']           = $this->class_teacher_model->getStudentLeave($config["per_page"],$page);
        $page                       = 'erp/class_teacher/tb_student_leave';
        $this->load->view($page, $data); 
        break;
        case 'open_model':
        $data['action_url']         = base_url().'class-teacher-student-leave-request/save/'.$p1;
        $page           = 'erp/class_teacher/student_leave_reply';
        $data['row']    = $this->class_teacher_model->getRow('student_leave',['id'=>$p1]);
        $data['form_id']            = uniqid();
        $this->load->view($page, $data);
        break;
        case 'save':
         $return['res'] = 'error';
         $return['msg'] = 'Not Saved!';
         if ($this->input->server('REQUEST_METHOD')=='POST') { 
         $leave_id=$this->input->post('reason');
         $id=$_SESSION['MUserId'];
         $data = array(
             'approval_status'     => $this->input->post('status'),
             'approved_remark'     => $this->input->post('remark'),
             'approved_by'     => $id,
          );
          if ($this->erp_model->Update('student_leave',$data,['id'=>$p1])) {
         $return['res'] = 'success';
          $return['msg'] = 'Status changed.';
          }
        }
        echo json_encode($return);
      break;
     default:
    # code...
    break;
    }
} 

   public function classteacher_student_timetable($action=null,$p1=null,$p2=null,$p3=null)
   { 
       switch ($action) {
           case 'view':
       $data['menu_id'] = $this->uri->segment(2);
       $id=$_SESSION['MUserId'];
        $data['roles'] = $this->erp_model->view_role($id);
       $data['title']          = 'View Section Time Table';
       $data['tb_url']            = current_url().'/tb';
       $data['new_url']            = current_url().'/create';
       $data['search']           = $this->input->post('search');
       $this->load->view('erp/class_teacher/header',$data);
       $this->load->view('erp/class_teacher/section_timetable_master',$data);
       $this->load->view('erp/class_teacher/footer');
       break;
       case 'tb':
           $id=$_SESSION['MUserId'];
           $data['section']=$p1;
           $data['section_name']   = $this->student_model->view_data_id('section_master',$p1);
           $data['period']         = $this->student_model->view_period_data('section_periods');
           $page                       = 'erp/class_teacher/tb_timetable_section';
           $this->load->view($page, $data); 
           break;
      
           default:
       # code...
       break;
       }
   }



}
