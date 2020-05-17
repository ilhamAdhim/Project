<div class="col-md-2 card">
    <button class="btn btn-info mt-4" style="height: 8em;" data-toggle="modal" data-target="#create">
        <span class="ml-2"><i class="fa fa-plus mr-2" style="font-size: 2.2em;"></i> </span>
        <br> Create
    </button>
    <br>
    <button class="btn btn-info" style="height: 8em;" data-toggle="modal" data-target="#update">
        <span class="ml-2"><i class="fa fa-refresh mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
        <br> Update
    </button>
    <br>
    <button class="btn btn-info mb-4" style="height: 8em;" data-toggle="modal" data-target="#delete">
        <span class="ml-2"><i class="fa fa-trash-o mr-2" style="font-size: 2.2em;" aria-hidden="true"></i> </span>
        <br> Delete
    </button>
    <hr>

    <?php if($title == 'Subjects RPS SAP' || $title == 'Lecture Contract'){ ?>
        <form action="<?=str_replace(' ','',$title)?>/uploadFile" method="post" enctype="multipart/form-data">
            <input name="userfile" id="userfile" type="file" />
            <input class="btn btn-info" type="submit" value="Upload docx file" disabled />
        </form>
        <hr>
    <?php } ?>


  <!--   <?php if($error){ ?>
        <?=$error?>
    <?php } ?> -->
</div>