<div class="container">
    <h2 class="text-center font-weight-bold">Daftar Order Pendakian</h2>
    <hr>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="mainTable">
                <thead class="text-center">
                    <tr>
                        <th>Kode Booking</th>
                        <th>Tanggal Naik</th>
                        <th>Tanggal Turun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($order as $o) {
                    ?>
                    <tr>
                        <td><?= $o['kode_order'] ?></td>
                        <td><?= indonesian_date($o['tanggal_naik']) ?></td>
                        <td><?= indonesian_date($o['tanggal_turun']) ?></td>
                        <td>
                            <?php 
                                if($o['status_order'] == 0)
                                    echo '<p class="text-warning">Belum Dikonfirmasi</p>'; 
                                else if($o['status_order'] == 1)
                                    echo '<p class="text-success">Pesanan Dikonfirmasi</p>';
                                else if($o['status_order'] == 2)
                                    echo '<p class="text-danger">Pesanan Ditolak</p>';
                            ?>
                        </td>
                        <td><a href="<?= base_url('c_order/detail_order') . "?order=" . $o['kode_order'] ?>" class="btn btn-info btn-sm text-white"><i class="fa fa-edit"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event){
        $('#mainTable').DataTable();
    });
</script>