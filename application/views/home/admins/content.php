
THIS IS <?=$title?>
      <!-- $data is acquired from each controller -->
      <div class="row mt-3">
          <div class="col-md-9 mr-1 card">
       <!-- <?=var_dump($data[0])?>  -->
              Data table here
              <table class="table-striped table table-bordered" id="data-read">
                  <thead>
                      <tr>
                          <!-- <th>#</th> -->
                          <?php foreach ($data[0] as $key => $value) { ?>
                              <th> <?=$key?> </th>
                          <?php } ?>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                      foreach ($data as $cl) { ?>
                        <tr>
                          <?php foreach($cl as $key){ ?>
                            <td> <?=$key?> </td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
          <div class="col-md-2 card">
              <button class="btn btn-info mt-4" style="height: 8em;" data-toggle="modal" data-target="#Create">
                  <span class="ml-2"><i class="fa fa-plus mr-2" style="font-size: 2.2em;"></i> </span> <br> Create
              </button>
              <br>
              <button class="btn btn-info" style="height: 8em;" data-toggle="modal" data-target="#Update">
                  <span class="ml-2"><i class="fa fa-refresh mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
                  <br> Update
              </button>
              <br>
              <button class="btn btn-info mb-4" style="height: 8em;" data-toggle="modal" data-target="#Delete">
                  <span class="ml-2"><i class="fa fa-trash-o mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
                  <br> Delete
              </button>
          </div>
      </div>
      
      <!-- Target is used to access the modal, title as indicator, and val is the data given based on each controller -->
      
      <?php
      
      $this->load->view('home/admins/modals', ['target' => 'Create' , 'title' => $title, 'val' => $data]);
      
      $this->load->view('home/admins/modals', ['target' => 'Update' , 'title' => $title, 'val' => $data]);
      
      $this->load->view('home/admins/modals', ['target' => 'Delete' , 'title' => $title, 'val' => $data]);
      
      ?>
      
      
      