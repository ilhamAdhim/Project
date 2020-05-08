<!-- <div class="container"> -->
    <div class="row mt-3">
        <div class="col-md-9 mr-1 card p-4">
            <h3>Data <?=$title?></h3>
            <hr>
            <?php if($response['data'] != null){ ?>
                <table class="table-striped table table-bordered" id="data-read">
                    <thead>
                        <tr>
                            <!-- Column Name -->
                            <?php foreach ($response['data'][0] as $key => $value) { ?>
                            <th> <?=$key?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $col = -1;
                            foreach ($response['data'] as $cl) { ?>
                        <tr>
                            <?php foreach($cl as $key){ ?>
                                <?php $col++;?>
                                <form action="subjectsRPSSAP/downloadFile" method="post">
                                    <td> 

                                    <?php if($col != 0) { ?>
                                        <input type="hidden" name="type" value="<?=$col?>">
                                        <input type="hidden" name="filename" value="<?=$key?>">
                                        
                                            <input type="submit" class="normal" value="<?=$key?>">
                                        
                                    <?php } else{ ?>
                                        <?=$key?>
                                    <?php } ?>
                                    </td>
                                </form>
                            
                            <?php } ?>

                            <?php $col = -1;?>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            <?php }else{ ?>
                <h3><center>No entry in <?=$title?></center></h3>
            <?php } ?>
            <hr>

            <!-- Load view content_bottom for buttons export and import -->

            <?php $this->load->view('home/admins/content_bottom', $title); ?>
        </div>
    </div>

<!-- </div> -->

<style>

.normal{
    font-family:inherit;
    background-color:inherit;
    border:0;
    padding:0
}


input[type='submit']:hover{
    
}


</style>