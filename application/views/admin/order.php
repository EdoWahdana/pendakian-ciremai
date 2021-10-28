<div class="container">
    <h2 class="text-center font-weight-bold">Daftar Order Pendakian</h2>
    <hr>
    <?= $this->session->flashdata('message_order_admin') ?>
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
                        <th>Check In</th>
                        <th>Check Out</th>
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
						<td>
							<?php if($o['check_in'] == 0) { ?>
								<button class="btn btn-sm btn-secondary" id="check-in-button" onClick="checkIn('<?= $o['kode_order'] ?>')"> <i class="fa fa-sign-in"></i> Check in </button>
							<?php } else { ?>
								<i class="fa fa-check"></i>
							<?php } ?>
						</td>
						<td>
							<?php if($o['check_out'] == 0) { ?>
								<button class="btn btn-sm btn-secondary" id="check-out-button" onClick="checkOut('<?= $o['kode_order'] ?>')"> <i class="fa fa-sign-out"></i> Check out </button>
							<?php } else { ?>
								<i class="fa fa-check"></i>
							<?php } ?>
						</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(event){
        $('#mainTable').DataTable();
    });
	
	function checkIn(kodeOrder) {
		$.ajax({
			type: "POST",
			dataType: "text",
			url: "<?= base_url('c_order/check_in_customer') ?>",
			data: {
				kode_order: kodeOrder
			},
			success: function() {
				location.reload();
			}
		});
	};

	function checkOut(kodeOrder) {
		$.ajax({
			type: "POST",
			dataType: "text",
			url: "<?= base_url('c_order/check_out_customer') ?>",
			data: {
				kode_order: kodeOrder
			},
			success: function() {
				location.reload();
			}
		});
	};
</script>