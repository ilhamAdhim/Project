<div class="row mx-auto">

<!-- SUBJECTS -->
<?php if(!empty($subject)){
   foreach ($subject as $key => $value) { ?>
   <div class="col-sm-4">
       <li> <?=$value->subject ?> </li>
   </div>
   <?php }
 } else{ ?>
   <center> <strong> You are not teaching anything </strong> </center>
 <?php } ?>
   
</div>