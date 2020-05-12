<div class="row mx-auto">
  <!-- SUBJECTS -->

  <!-- If the lecturer teach more than one subject -->
  <?php if(!empty($subject) && count($subject) != 1){ ?>
    <div class="container">
      <div class="card-deck">  
        <?php foreach ($subject as $key => $value) { ?>
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
              <h5 class="card-title"><center><?=$value->subject ?></center></h5>
              <p class="card-text"><?=$value->class ?></p>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td><center>RPS</center></td>
                    <td><center>SAP</center></td>     
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-6">
                          <button class="btn btn-info">
                            <i class="fa fa-download" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-secondary">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                          </button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col-sm-6">
                          <button class="btn btn-info">
                            <i class="fa fa-download" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-secondary">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <!-- If the lecturer teach only one subject -->
  <?php } elseif(!empty($subject) && count($subject) == 1){ ?>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><center> <?=$subject[0]->subject?></center></h5>
          <p class="card-text"> <?=$subject[0]->class ?></p>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td><center>RPS</center></td>
                <td><center>SAP</center></td>     
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-sm-6">
                      <button class="btn btn-info">
                        <i class="fa fa-download" aria-hidden="true"></i>
                      </button>
                    </div>
                    <div class="col-sm-6">
                      <button class="btn btn-secondary">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="row">
                    <div class="col-sm-6">
                      <button class="btn btn-info">
                        <i class="fa fa-download" aria-hidden="true"></i>
                      </button>
                    </div>
                    <div class="col-sm-6">
                      <button class="btn btn-secondary">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <?php } else{ ?>
    <div class="mx-auto"> 
      <strong> You are not teaching anything </strong>
    </div>
  <?php } ?>
</div>