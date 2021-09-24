<?php 
    if($this->session->userdata('nama') == "")
        redirect('c_home');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p class="display-4 font-weight-bold text-center my-3">Pesanan Saya</p>
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
    <hr>
    <br>

    <div class="row">
        <div class="col-sm-12">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Naik</th>
                        <th>Tanggal Turun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach($order as $o) {
                    ?>
                    <tr>
                        <td><?= ++$no ?></td>
                        <td><?= $o['kode_order'] ?></td>
                        <td><?= indonesian_date($o['tanggal_naik']) ?></td>
                        <td><?= indonesian_date($o['tanggal_turun']) ?></td>
                        <td>
                            <?php if($o['status_order'] == 0 && $o['bukti_pembayaran'] == '')
                                    echo '<a href="'.base_url('c_order/status?order=' . $o['kode_order']).'" class="text-warning">Belum melakukan pembayaran</p>';
                                  else if($o['status_order'] == 0 && $o['bukti_pembayaran'] != '')
                                    echo '<p class="text-info">Menunggu Konfirmasi';
                                  else if($o['status_order'] == 1 && $o['bukti_pembayaran'] != '')
                                    echo '<p class="text-success">Booking Pendakian Dikonfirmasi</p>';
                                  else if($o['status_order'] == 2 && $o['bukti_pembayaran'] != '')
                                    echo '<p class="text-danger">Booking Pendakian Ditolak</p>';
                            ?>
                        </td>
                        <td>
                            <?php if($o['bukti_pembayaran'] == '') {?>
                                <button data-id="<?= $o['id_order'] ?>" class="btn btn-sm btn-info" onclick="$('#id_order').val($(this).data('id')); $('#uploadModal').modal('show');"><i class="fa fa-upload"></i> Upload bukti</button></td>
                            <?php } else { ?>
                                <a href="<?= base_url('assets/bukti/') . $o['bukti_pembayaran'] ?>" target="blank"><span class="badge badge-info">Lihat Bukti</span></a>
                            <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="uploadModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">Upload Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="text-dark" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('c_order/upload_bukti') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <input type="hidden" name="id_order" id="id_order">
                    <input type="file" name="foto_bukti" id="foto_bukti" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>