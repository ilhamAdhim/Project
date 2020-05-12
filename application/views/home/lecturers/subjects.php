<div class="row mx-auto">
  <!-- SUBJECTS -->
  <?php if(!empty($subject)){ ?>
    <div class="container">
      <div class="card-deck">  
        <?php foreach ($subject as $key => $value) { ?>
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
              <h5 class="card-title"><?=$value->subject_code ?></h5>
              <p class="card-text "><?=$value->subject ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php }else{ ?>
    <center> <strong> You are not teaching anything </strong> </center>
  <?php } ?>
</div>