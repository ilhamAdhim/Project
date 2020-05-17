<div class="row mx-auto">
  <!-- SUBJECTS -->

  <!-- If the lecturer teach more than one subject -->
  <?php if(!empty($subject) && count($subject) != 1){ ?>
    <div class="container">
      <div class="card-deck">  
        <?php foreach ($subject as $key => $value) { ?>
          <div class="card">
            <img class="card-img-top" src="<?=base_url()?>assets/images/docx.png" height=300 alt="">
            <div class="card-body">
              <h5 class="card-text pull-left" style="font-size:1.2em"><center><?=$value->subject ?></center></h5>
              <p class="card-text pull-right"> <?=$value->class?> </p>
            </div>
            <div class="card-footer">
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
        <?php } ?>
      </>
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