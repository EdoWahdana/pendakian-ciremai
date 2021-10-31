<?php 
    if($this->session->userdata('nama') == "")
        redirect('c_home');
?>

	<style>
		ol.with-number {
			margin: 0;
			padding: 0;
		}
		
		ol.with-number > li{
			display: block;
			margin-bottom: .5em;
			margin-left: 2em;
		}
		
		ol.with-number > li::before{
			display: inline-block;
		}
	</style>

    <div class="row mt-4">
        <div class="col-sm-7 border-right">
            <h5 class="font-weight-bold text-center my-3" style="font-size: 20px;">Booking Status</h5>
            <div class="row">
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Status
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left mb-3">
                    <?php if($data_order[0]['status_order'] == 0 && $data_order[0]['bukti_pembayaran'] == '')
                            echo '<p class="font-weight-bold text-warning">Belum melakukan pembayaran</p>';
                        else if($data_order[0]['status_order'] == 0 && $data_order[0]['bukti_pembayaran'] != '')
                            echo '<p class="font-weight-bold text-info">Menunggu Konfirmasi</p>';
                        else if($data_order[0]['status_order'] == 1 && $data_order[0]['bukti_pembayaran'] != '')
                            echo '<p class="font-weight-bold text-success">Booking Pendakian Dikonfirmasi</p>';
                        else if($data_order[0]['status_order'] == 2 && $data_order[0]['bukti_pembayaran'] != '')
                            echo '<p class="font-weight-bold text-danger">Booking Pendakian Ditolak</p>';
                        else
                            echo 'GAGL';
                    ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Harga
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left mb-3">
                    <p class="font-weight-bold h6">Rp <?= number_format($data_order[0]['harga'],0, ',', '.') ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Kode Booking
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left">
                    <p class="font-weight-bold"><?= $data_order[0]['kode_order'] ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Tanggal Naik
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left">
                    <p class="font-weight-bold"><?= indonesian_date($data_order[0]['tanggal_naik']) ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Tanggal Turun
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left">
                    <p class="font-weight-bold"><?= indonesian_date($data_order[0]['tanggal_turun']) ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Nama
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left">
                    <p class="font-weight-bold"><?= $this->session->userdata('nama') ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Alamat
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-4 text-left">
                    <p class="font-weight-bold"><?= $this->session->userdata('alamat') ?>
                </div>
                <div class="col-sm-4 offset-sm-1 my-1 text-right">
                    Jenis Identitas
                </div>
                <div class="col-sm-1" style="max-width: 4%;">
                    :
                </div>
                <div class="col-sm-2 text-left">
                    <p class="font-weight-bold"><?= $this->session->userdata('jenis_identitas') ?>
                </div>
                <div class="col-sm-12 text-center mt-3">
                    <a class="btn btn-info btn-sm" href="<?= base_url('c_home/pesanan') ?>">Lihat daftar pesanan</a>
                </div>
            </div>        
        </div>
        <div class="col-sm-5">
            <h5 class="font-weight-bold text-center my-3" style="font-size: 20px;">Intruksi Pembayaran</h5>
			<pre style="max-width: 500px; overflow-wrap: break-word; overflow: auto;">
Ketentuan Pembayaran:
<b>*</b>Harap Melakukan Pembayaran dengan Benar dan Teliti.
<b>*</b>Pihak Pos Pendakian tidak bertanggung jawab atas kesalahan 
 transfer atau kesalahan nominal transfer.
<b>*</b>Setelah Melakukan Pembayaran, Uang Tidak dapat 
 refund / dikembalikan.
			</pre>
            <h4 style="font-size: 15px;">Pembayaran via Transfer</h4>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/') ?>logo_bri.png" class="img" width="50">
                    <p class="font-weight-bold">TNGC Kuningan</p>
                    <p class="font-weight-bold">981 9913 3881</p>
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/') ?>logo_bca.png" class="img" width="60">
                    <p class="font-weight-bold">TNGC Kuningan</p>
                    <p class="font-weight-bold">981 9913 3881</p>
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/') ?>logo_mandiri.png" class="img" width="70">
                    <p class="font-weight-bold">TNGC Kuningan</p>
                    <p class="font-weight-bold">981 9913 3881</p>
                </div>
            </div>
            <hr>
            <h4 style="font-size: 15px;">Pembayaran via Dompet Digital</h4>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/') ?>logo_dana.png" class="img" width="100">
                    <p class="font-weight-bold">TNGC Kuningan</p>
                    <p class="font-weight-bold">981 9913 3881</p>
                </div>
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/images/') ?>logo_ovo.png" class="img" width="70">
                    <p class="font-weight-bold">TNGC Kuningan</p>
                    <p class="font-weight-bold">981 9913 3881</p>
                </div>
            </div>
        </div>
    </div>
	
	<hr class="container mt-4" style="border: 1px solid #c4c4c4;" />
	
	<div class="row my-4 px-4">
		<div class="col-sm-4">
			<h5 class="font-weight-bold text-center my-3" style="font-size: 15px;">Tata Cara pembayaran melalui Mesin ATM : </h5>
			<ol class="list-group with-number">
				<li class="list-group-item">Masukkan kartu ATM</li>
				<li class="list-group-item">Pilih bahasa, sebaiknya pilih "Bahasa Indonesia" agar lebih mudah dipahami</li>
				<li class="list-group-item">Masukkan nomor PIN ATM anda</li>
				<li class="list-group-item">Pilih Transaksi lainnya, lalu pilih transfer</li>
				<li  class="list-group-item">Pada pilihan bank tujuan transfer, pilih Bank sesuai tujuan</li>
				<li class="list-group-item">Masukkan kode Bank dan nomor rekening tujuan</li>
				<li class="list-group-item">Pastikan kembali kode Bank, nomor rekening dan nominal transfer benar</li>
				<li class="list-group-item">Pilih benar dan konfirmasi kebenaran data a/n TNGC</li>
				<li class="list-group-item">Tunggu hingga muncul keterangan transaksi anda berhasil</li>
				<li class="list-group-item">Ambil kembali kartu ATM anda</li>
			</ol>
		</div>
		<div class="col-sm-4">
			<h5 class="font-weight-bold text-center my-3" style="font-size: 15px;">Tata Cara pembayaran melalui Mobile Banking : </h5>
			<ol class="list-group with-number">
				<li class="list-group-item">Login ke Mobile Banking dengan memasukkan User ID dan Password</li>
				<li class="list-group-item">Pilih menu "Transfer" lalu pilih tujuan Bank</li>
				<li class="list-group-item">Setelah itu lalu masukkan rekening tujuan dan email penerima jika ada</li>
				<li class="list-group-item">Masukkan nominal yang ingin ditransfer, tambahkan keterangan transfer jika ada, lalu pilih "Lanjut"</li>
				<li class="list-group-item">Setelah itu kamu akan diarahkan untuk memasukkan Password, jika sudah benar klik "Lanjut"</li>
				<li class="list-group-item">Tunggu hingga transaksi berhasil</li>
			</ol>
		</div>
		<div class="col-sm-4">
			<h5 class="font-weight-bold text-center my-3" style="font-size: 15px;">Tata Cara pembayaran melalui Dompet Digital : </h5>
			<ol class="list-group with-number">
				<li class="list-group-item">Masuk ke aplikasi E-Wallet</li>
				<li class="list-group-item">Masukkan PIN E-Wallet anda</li>
				<li class="list-group-item">Pilih menu Transfer</li>
				<li class="list-group-item">Pilih menu ke Rekening Bank</li>
				<li class="list-group-item">Pilih Bank tujuan, nomor rekening dan keterangan transfer</li>
				<li class="list-group-item">Pilih lanjutkan, dan konfirmasi kebenaran data a/n TNGC</li>
				<li class="list-group-item">Pilih "Kirim"</li>
				<li class="list-group-item">Tunggu hingga muncul pemberitahuan transfer berhasil</li>
			</ol>
		</div>
	</div>