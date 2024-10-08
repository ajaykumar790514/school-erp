<style>
  .subheading{
 font-size:0.9rem ;
 color:#000;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-4 pb-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url();?>teacher-data">Home</a></li>
              <li class="breadcrumb-item active"><?=$title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- 1st row -->
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-notice">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-chalkboard-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Notice Board</span>
                <span class="info-box-text subheading" >Total New Notice :- <?=$total_notice;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
        
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>upload-notes">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-file-invoice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Upload Notes</span>
                <span class="info-box-text subheading">Today Notes Upload:- <?=$total_notes;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>upload-hw">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-book-reader"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Upload Home Work</span>
                <span class="info-box-text subheading">Today Home Work Upload :- <?=$total_home_work;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-student-gate-pass">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-house-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Student Gate Pass</span>
                <span class="info-box-text subheading">Today Total Gate Pass:- <?=$total_gate_pass;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
        
          <!-- /.col -->
        <!-- </div>
      </div> -->


<!-- 2nd Row -->

<!-- <div class="container-fluid">
        <div class="row"> -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-student-master">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Student  Master</span>
                <span class="info-box-text subheading" >Total Student :- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>student-attendance">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa-solid fa-calendar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Student Attendance</span>
                <span class="info-box-text subheading">Total Student  :- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-student-attendance-register">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-calendar-days"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Attendance Register</span>
                <span class="info-box-text subheading">Total Student:- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- <div class="col-md-3 col-sm-6 col-12">
          <a href="<?=base_url();?>left-student">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-left-long"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Left Student</span>
                <span class="info-box-text subheading">Total Left Student :- <?//=$total_left;?></span>
              </div>
            /.info-box-content
            </div>
            </a>
             /.info-box 
          </div> -->
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>view-teacher-time-table">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-calendar-days"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">My Time Table</span>
                <span class="info-box-text subheading">Total  :- <?//=$total_left;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-student-marks-upload">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Student Marks Upload</span>
                <span class="info-box-text subheading">Total Exam :- <?=$total_exam;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
             <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-attendance">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa-solid fa-clipboard-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">My Attendance</span>
                <?php $rs = $this->teacher_model->get_att_today($_SESSION['MUserId']);?>
                <span class="info-box-text subheading">In <?=@_time($rs->punch_in);?> - Out  <?=@_time($rs->punch_out);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>teacher-student-leave-request">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa-solid fa-person-booth"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-bold">Student Leave Request</span>
                <span class="info-box-text subheading" >Total Student :- <?=$total_student_leave;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>Hrm Chart</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 float-left">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <div class=" col-md-3float-right">
                <table class="table">
                    <tr>
                      <td>Enquiry :-</td>
                      <td><?php echo  $enquery = $this->erp_model->Counter('student_master', array('type'=>'ENQUIRY','regstatus'=>'0' )); ?></td>
                    </tr>
                    <tr>
                      <td>Registered :-</td>
                      <td> <?php echo  $registered = $this->erp_model->Counter('student_master', array('type'=>'REGISTERED','regstatus'=>'1' )); ?></td>
                    </tr>
                    <tr>
                      <td>On Hold :-</td>
                      <td><?php echo  $hold = $this->erp_model->Counter('student_master', array('type'=>'ONHOLD','regstatus'=>'2' )); ?></td>
                    </tr>
                    <tr>
                      <td>Rejected :-</td>
                      <td><?php echo  $rejected = $this->erp_model->Counter('student_master', array('type'=>'REJECTED','regstatus'=>'3' )); ?></td>
                    </tr>
                    <tr>
                      <td>Is Left :-</td>
                      <td><?php echo  $left = $this->erp_model->Counter('student_master', array('IsLeft'=>'1' )); ?></td>
                    </tr>
                </table>
              </div>
                </div>
                
              
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
