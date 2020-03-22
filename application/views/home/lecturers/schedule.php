<table class="table table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>

            <th width="20%">
                <center> Monday </center>
            </th>
            <th width="20%">
                <center> Tuesday </center>
            </th>
            <th width="20%">
                <center> Wednesday </center>
            </th>
            <th width="20%">
                <center> Thursday </center>
            </th>
            <th width="20%">
                <center> Friday </center>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php for ($i=1; $i <= 9; $i++) { ?>
            <td><?=$i?></td>
            <?php for ($j=0; $j < 5 ; $j++) { ?>
            <td>
                <div class="alert-success">
                    <center> Mengajar </center>
                </div>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>