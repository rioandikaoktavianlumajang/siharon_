<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Penyebab</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($laporan_error as $data_laporan_error) {
        ?>
            <tr>
                <td width="20"><?php echo $no++; ?></td>
                <td><?php echo $data_laporan_error->upload_file; ?></td>
                <td><?php echo $data_laporan_error->penyebab; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(' #example').DataTable();
    });
</script>