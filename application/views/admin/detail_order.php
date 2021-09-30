<div class="container">
    <div class="row mt-3">
        <div class="col-sm-6 offset-sm-2 ">
            <h5 class="display-5 text-center my-3">Detail Order</h5>
        </div>
        <div class="col-sm-4">
            <a href="<?= base_url('c_order/konfirmasi_order') . '?order=' . $order[0]['kode_order']?>" class="btn btn-info btn-sm my-2"><i class="fa fa-check"></i> Konfirmasi Pesanan</a>
            <a href="<?= base_url('c_order/tolak_order') . '?order=' . $order[0]['kode_order']?>" class="btn btn-danger btn-sm my-2"><i class="fa fa-times"></i> Tolak Pesanan</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8">
            <div class="container text-center my-3">
                <h5 class="display-5 font-weight-bold my-3">Booking Status</h5>
                <div class="row">
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Status
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['status_order'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Kode Booking
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['kode_order'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Tanggal Naik
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= indonesian_date($order[0]['tanggal_naik']) ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Tanggal Turun
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= indonesian_date($order[0]['tanggal_turun']) ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Nama
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['nama'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Tanggal Lahir
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['tanggal_lahir'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Alamat
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['alamat'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Total harga
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <p class="font-weight-bold"><?= $order[0]['harga'] ?></p>
                    </div>
                    <div class="col-sm-4 offset-sm-1 my-1 text-right">
                        Bukti Pembayaran
                    </div>
                    <div class="col-sm-2">
                        :
                    </div>
                    <div class="col-sm-4 text-left">
                        <?php if($order[0]['bukti_pembayaran'] != '') { ?>
                            <a href="<?= base_url('assets/bukti/') . $order[0]['bukti_pembayaran'] ?>" target="blank"><span class="badge badge-info">Lihat Gambar</span></a>
                        <?php } else { ?>
                            <span class="badge badge-danger">Belum upload gambar</span>
                        <?php } ?>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>