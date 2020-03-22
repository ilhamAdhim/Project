<div class="tab-pane active" id="profile">
    <div class="row">
        <div class="col-md-6">
            <h6>Codename</h6>
            <p>
                <?=$code?>
            </p>

            <hr>

            <h6>Status</h6>
            <?php if($status == 'PNS'){ ?>
            <div class="alert alert-success">
                You are a <b> PNS </b>
            </div>
            <?php }else{ ?>
            <div class="alert alert-info">
                You are a <b> <?=$status?> </b>
            </div>
            <?php } ?>

        </div>
        <div class="col-md-6">
            <h6>NIP</h6>
            <p>
                <?=$NIP ? $NIP : 'Not Set' ?>
            </p>

            <hr>

            <h6>NIDN</h6>
            <p>
                <?= $NIDN ? $NIDN : 'Not Set' ?>
            </p>
            <!-- <h6>Recent badges</h6>
                      <a href="#" class="badge badge-dark badge-pill">html5</a> -->

            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
        </div>
        <div class="col-md-12">
            <table class="table table-sm table-hover table-striped">
                <tbody>
                    <thead>
                        <th>Position</th>
                        <th>Year</th>
                    </thead>
                    <?php if(!empty($position)) { ?>
                    <tr>
                        <?php if(is_array($position)){
                              foreach ($position[0] as $ps => $value) { ?>
                        <td> <?=$value?></td>
                        <?php }}else{
                                foreach ($position as $key => $value) { ?>
                        <td> <?=$value->position?> : <?=$value->year?> </td>
                        <?php } ?>
                    </tr>
                    <?php }} ?>

                    <tr>
                        <td> <strong>Lecturer</strong> in Information Technology Division </td>
                        <td>2019</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/row-->
</div>