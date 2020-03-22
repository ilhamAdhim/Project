<div class="tab-pane fade" id="edit">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="" data-target="#ed_profile" data-toggle="tab" class="nav-link active">Edit Personal
        Information </a>
    </li>
    <li class="nav-item">
      <a href="" data-target="#ed_subjects" data-toggle="tab" class="nav-link">Edit Subjects </a>
    </li>
  </ul>
  <div class="tab-content py-4">
    <!-- Edit Personal Information -->
    <div class="tab-pane active" id="ed_profile">
      <form role="form">
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Username</label>
          <div class="col-lg-9">
            <input class="form-control" required name="user" type="text" value=<?=$username?>>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">NIP</label>
          <div class="col-lg-9">
            <input class="form-control" required readonly name="nip" type="text" value="<?=$NIP?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">NIDN</label>
          <div class="col-lg-9">
            <input class="form-control" required readonly name="nidn" type="text" value="<?=$NIDN?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Email</label>
          <div class="col-lg-9">
            <input class="form-control" name="email" type="email" value="email@gmail.com">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
          <div class="col-lg-9">
            <input class="form-control" name="phone" type="text" value="Phone Number">
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
          <div class="col-lg-6">
            <input class="form-control" name="city" type="text" value="" placeholder="City">
          </div>
          <div class="col-lg-3">
            <input class="form-control" name="state" type="text" value="" placeholder="State">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
          <div class="col-lg-9">
            <select id="user_time_zone" class="form-control" size="0">
              <option value="Hawaii">(GMT-10:00) Hawaii</option>
              <option value="Alaska">(GMT-09:00) Alaska</option>
              <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)
              </option>
              <option value="Arizona">(GMT-07:00) Arizona</option>
              <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp;
                Canada)</option>
              <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central
                Time (US &amp; Canada)</option>
              <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)
              </option>
              <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
            </select>
          </div>
        </div>

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