<div class="row">

    <!-- GROUP RESEARCH -->
    <?php if(!empty($group_research)){
              foreach ($group_research as $gr => $value) { ?>
    <div class="col-sm-4">
        <li> <?=$value->research?> : <?=$value->priority?></li>
    </div>
    <?php } 
            } else{ ?>

    <div class="text align-self-center">
        <strong> You are not included in any group research </strong>
    </div>

    <?php } ?>

</div>