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
              <li class="breadcrumb-item"><a href="<?=base_url();?>section-head-data">Home</a></li>
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
          <a href="<?=base_url();?>section-head-notice">
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
          <a href="<?=base_url();?>section-head-upload-notes">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-file-invoice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Upload Notes</span>
                <span class="info-box-text subheading">Today Notes Upload :- <?=$total_notes;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-head-upload-hw">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-book-reader"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Upload Home Work Upload</span>
                <span class="info-box-text subheading">Today Home Work Upload :- <?=$total_home_work;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-head-student-gate-pass">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-house-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Student Gate Pass</span>
                <span class="info-box-text subheading">Today Total GatePass :- <?=$total_gate_pass;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
        
          <!-- /.col -->
        <!-- </div>
      </div> -->
      <!-- /.container-fluid -->


<!-- 2nd Row -->

<!-- <div class="container-fluid">
        <div class="row"> -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-head-student-master">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Student Master</span>
                <span class="info-box-text subheading" >Total Student :- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>sectionhead-student-attendance-register">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa-solid fa-calendar"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Attendance Register</span>
                <span class="info-box-text subheading">Total Student :- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-wise-period-master">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Set Section Periods</span>
                <span class="info-box-text subheading">Total  Student :- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-time-table">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-calendar-days"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-bold">Set Time Table</span>
                <span class="info-box-text subheading">Total Student:- <?=$total_student;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
          <a href="<?=base_url();?>section-head-student-leave-request">
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
      </div><!-- /.container-fluid -->


  </div>
  <!-- /.content-wrapper -->
