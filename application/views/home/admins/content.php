<!-- $data is acquired from each controller -->
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
                        <th> <?=$key?> </th>
                        <!-- <th> <?=$key?> </th> -->
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                        foreach ($response['data'] as $cl) { ?>
                    <tr>
                        <?php foreach($cl as $key){ ?>
                        <td> <?=$key?> </td>
                        <?php } ?>
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
        
        

<!-- Target is used to access the modal, title as indicator, and val is the data given based on each controller -->

<?php
      
      $this->load->view('home/admins/modals', ['title' => $title, 'val' => $response['data'] , 'purpose' => 'create']);
      
      $this->load->view('home/admins/modals', ['title' => $title, 'val' => $response['data'] , 'purpose' => 'update']);
      
      $this->load->view('home/admins/modals', ['title' => $title, 'val' => $response['data'] , 'purpose' => 'delete']);
      
?>