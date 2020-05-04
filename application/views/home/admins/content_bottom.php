<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="ml-4">
                <h4>Upload excel file</h4> <br>
                <p>Input data faster</p>
            </div>
            <div class="mt-3  align-items-center">

                <form action="<?=str_replace(' ','',$title)?>/upload" method="post" enctype="multipart/form-data">
                    <input name="file" id="fileInput" type="file" />
                    <input class="btn btn-info" type="submit" value="Upload file" disabled />
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <h4>Get Excel Data</h4> <br>
            <p>Get template of CSV or Export the whole data </p>
            <div class="mt-3 pull-left align-items-center">
                <form method="post" action="<?=str_replace(' ','',$title)?>/template">
                    <input type="submit" name="template" class="btn btn-success" value="CSV Template" />
                </form>
            </div>
            <div class="mt-3 pull-right align-items-center">
                <form method="post" action="<?=str_replace(' ','',$title)?>/export">
                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(
        function () {
            $('input:file').change(
                function () {
                    if ($(this).val()) {
                        $('input:submit').attr('disabled', false);
                    }
                }
            );
        });
</script>


</div>
        <!-- Load view content_aside for buttons CRUD    -->

<?php $this->load->view('home/admins/content_aside'); ?>


</div>