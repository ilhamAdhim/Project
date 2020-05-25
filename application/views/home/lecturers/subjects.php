<div class="row mx-auto">
  <!-- SUBJECTS -->
<?=var_dump($subject)?>
<br><br>
<br>
<br>
<?=var_dump($isDownloadable)?>
  <!-- If the lecturer teach more than one subject -->
  <?php if(!empty($subject) && count($subject) != 1){ ?>
    <div class="container">
      <div class="card-deck">  
      <!-- Count variable will be used to access the array of isDownloadable variable -->
      <?php $count = -1?>
        <?php foreach ($subject as $key => $value) { ?>
        <?php $count++;?>
          <div class="card">
            <div class="text-center">
              <img class="card-img-top" src="<?=base_url()?>assets/images/docx.png" style="height:150px;width:150px;"alt="">
            </div>
            <div class="card-body">
              <hr>
                <h5 class="card-text pull-left" style="font-size:1.2em"><center><?=$value->subject ?></center></h5>
                <br>
                <p class="card-text pull-right"> <?=$value->class?> </p>
            </div>

            <div class="card-footer">
            <div class="d-flex flex-row justify-content-center">
              <div class="p-2 flex-fill">
                  <div class="dropdown mx-auto text-center">
                  <!-- Dropdown upload -->
                      <!-- <input type="hidden" name="filename" value="<?=$value->class?>"> -->
                        <button  class="btn btn-primary dropdown-toggle" style="width:9em" data-toggle="dropdown"> 
                            Upload
                        </button>
                          <form action="lec_home/uploadContract" method="POST">
                          <ul class="dropdown-menu">
                            <!-- <li><a href="#">Action</a></li> -->
                          <?php if($isDownloadable[$count]){ ?>
                            <div class="alert alert-success" role="alert">
                              <strong>Update the contract file</strong>
                            </div>
                          <?php } else{ ?>
                            <div class="alert alert-warning" role="alert">
                              <strong>Be the first to upload</strong>
                            </div>
                          <?php } ?>
                            <li class="mx-auto p-2"><input type="file" name="filename" id="filename"></li>
                            <hr>
                            <li class="text-center"> <input type="submit" class="btn btn-info" value="Submit"> </li>
                          </form> 
                          </ul>
            
                  </div>
                </div>
                <?php if($isDownloadable[$count]){ ?>
                  <div class="p-2 text-center flex-fill">
                    <form action="lec_home/downloadContract" method="POST">
                      <input type="hidden" name="subject_code" value="<?=$value->subject_code?>">
                      <input type="hidden" name="code" value="<?=$this->session->userdata('code')?>">
                      <input class="btn btn-secondary" type="submit" value="Download">
                    </form>
                <?php } ?> 
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- Reset -->
      <?php $count = -1?>
    </div>
  <!-- If the lecturer teach only one subject -->
  <?php } elseif(!empty($subject) && count($subject) == 1){ ?>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-text pull-left"><center> <?=$subject[0]->subject?></center></h5>
          <p class="card-text pull-right"> <?=$subject[0]->class ?></p>
        </div>

        <div class="card-footer ">
        <form action="lec_home/uploadContract" method="POST">
          <input type="hidden" name="filename" value="<?=$value->class?>">
          <input class="btn btn-info" type="submit" value="Upload">
        </form>
        <form action="lec_home/downloadContract" method="POST">
          <input type="hidden" name="filename" value="<?=$value->class?>">
          <input class="btn btn-secondary" type="submit" value="Download">
        </form>
        </div>
      </div>
    </div>

  <?php } else{ ?>
    <div class="mx-auto"> 
      <strong> You are not teaching anything </strong>
    </div>
  <?php } ?>
  </div>
</div>

<script>

$('.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});</script>