THIS IS RESEARCH GROUP
<div class="row mt-3">
    <div class="col-md-9 mr-1 card">

        Data table here

        <table class="table-striped table table-bordered" id="data-read">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Research</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    foreach ($researchGroup as $rs) { ?>
                <tr>
                    <td> <?= $no++; ?></td>
                    <td> <?= $rs->research; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-2 card">
        <button class="btn btn-info mt-4" style="height: 8em;" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="ml-2"><i class="fa fa-plus mr-2" style="font-size: 2.2em;"></i> </span> <br> Create
        </button>
        <br>
        <button class="btn btn-info" style="height: 8em;" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="ml-2"><i class="fa fa-refresh mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
            <br> Update
        </button>
        <br>
        <button class="btn btn-info mb-4" style="height: 8em;" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="ml-2"><i class="fa fa-trash-o mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
            <br> Delete
        </button>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>