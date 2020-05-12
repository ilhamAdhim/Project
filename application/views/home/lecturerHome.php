<div class="container">
  <nav class="breadcrumb">
    <a class="breadcrumb-item" href="#">Dashboard</a>
    <a class="breadcrumb-item" href="#"><?=$title?></a>
    <span class="breadcrumb-item active"></span>
  </nav>

  <div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <div class="container card-text">
        <div class="container">
          <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
              <h5 class="mb-3"><?=$info[0]->name?> </h5>
              <hr>
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                  <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                  <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
              </ul>

              <div class="tab-content py-4">
                <!-- INSIDE PROFILE TAB -->
                <?php $this->load->view('home/lecturers/profileLec'); ?>

                <!-- INSIDE MESSAGES TAB -->
                <?php $this->load->view('home/lecturers/messageLec');?>

                <!-- INSIDE EDIT TAB -->
                <?php $this->load->view('home/lecturers/editLec');?>

                <!-- end of main container -->
              </div>

              <!-- JADWAL AJAR DOSEN -->
              <!-- <hr> -->

              <!-- <h1 id="schedule">Time Schedule</h1>
              <?php $this->load->view('home/lecturers/schedule'); ?> -->



              <!-- PENGAJAR MATA KULIAH  -->
              <hr>
              <h2 id="subjects"> Pengajar Mata Kuliah </h2>
              <br>

              <?php $this->load->view('home/lecturers/subjects'); ?>


              <!-- RESEARCH GROUP -->
              <hr>
              <h2 id="researchGroup"> Research Group </h2>

              <?php $this->load->view('home/lecturers/researchGroup');?>

              <hr>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
