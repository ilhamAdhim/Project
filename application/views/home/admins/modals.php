
<!-- <?=var_dump($researchGroup);?> -->
<!-- Modal -->
<div class="modal fade" id="<?=$target?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?=$target?> <?=$title?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <?php form_open('admin_home/');?> -->
                <!-- 
                <form action="" method="post">

                </form> -->
                <?php foreach ($val[0] as $key => $value) { ?>
                    
                    <div class="md-form">
                        <input type="text" class="form-control"  name="<?=$key?>" required="">
                        <label for="<?=$key?>"><?=$key?></label>
                        <div class="invalid-feedback">Oops, you missed this one.</div>
                    </div>
                <?php } ?>
                <!-- <?= form_close();?> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>