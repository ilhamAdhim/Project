
<div class="tab-pane fade" id="edit">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="" data-target="#ed_profile" data-toggle="tab" class="nav-link active">Edit Personal
        Information </a>
    </li>
    <li class="nav-item">
      <a href="" data-target="#ed_subjects" data-toggle="tab" class="nav-link">Edit Subjects </a>
    </li>
    <li class="nav-item">
      <a href="" data-target="#ed_password" data-toggle="tab" class="nav-link">Edit Password </a>
    </li>
  </ul>
  <div class="tab-content py-4">
    <!-- Edit Personal Information -->
    <div class="tab-pane active" id="ed_profile">
      <form method="POST" action="lec_home/editData">
      <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Code</label>
          <div class="col-lg-9">
            <input class="form-control" required readonly name="code" type="text" value="<?=$info[0]->code?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">NIP</label>
          <div class="col-lg-9">
            <input class="form-control" required readonly name="nip" type="text" value="<?=$info[0]->NIP?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">NIDN</label>
          <div class="col-lg-9">
            <input class="form-control" required readonly name="nidn" type="text" value="<?=$info[0]->NIDN?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Username</label>
          <div class="col-lg-9">
            <input class="form-control" required name="username" type="text" value=<?=$username[0]->username?>>
          </div>
        </div>  
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Email</label>
          <div class="col-lg-9">
            <input class="form-control" name="email" type="email" placeholder="email@gmail.com">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
          <div class="col-lg-9">
            <input class="form-control" name="phone" type="text" placeholder="Phone Number">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Address</label>
          <div class="col-lg-9">
            <input class="form-control" name="street" type="text" value="" placeholder="Street">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"></label>
          <div class="col-lg-9">
            <input type="submit" class="btn btn-primary" value="Save Changes">
            <input type="reset" class="btn btn-danger" value="Reset">
          </div>
        </div>
      </form>
    </div>


    <!-- Edit Subjects Information -->
    <div class="tab-pane fade" id="ed_subjects">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong> Your request will be processed by admin's approval </strong>
      </div>
      <script>
        $(".alert").alert();
      </script>

    </div>

  <!-- Edit Password -->
  <div class="tab-pane fade" id="ed_password">
    <form role="form" method="post" action="lec_home/changePassword">
      <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Password</label>
          <div class="col-lg-9">
            <input class="form-control" type="password" placeholder="Set new password...">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
          <div class="col-lg-9">
            <input class="form-control" type="password" placeholder="Re-type new password...">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label"></label>
          <div class="col-lg-9">
            <input type="button" class="btn btn-primary" value="Save Changes">
            <input type="reset" class="btn btn-danger" value="Reset">
          </div>
        </div>

        <script>
          $(".alert").alert();
        </script>

      </div>
    </form>
  </div>

</div>
</div>
</div>
<div class="col-lg-4 order-lg-1 text-center">
  <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
  <h6 class="mt-2">Upload a different photo</h6>
  <label class="custom-file">
    <input type="file" id="file" class="custom-file-input">
    <span class="custom-file-control btn btn-info">Choose file</span>
  </label>
</div>
</div>