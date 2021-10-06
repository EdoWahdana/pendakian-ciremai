<style>
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>

<section>
    <div class="banner-main">
    <img src="<?= base_url('assets/images/banner/') . $interface[0]['gambar'] ?>" alt="#"/>
    <div class="container">
        <div class="text-bg">
            <h1>Pendakian<br><strong class="white">Gunung Ciremai</strong></h1>
			<p class="text-white" style="font-size: 30px"> JALUR PALUTUNGAN </p>
            <div class="container mt-3">
                <form id="periode" class="main-form" method="post" action="<?= site_url('c_home/booking'); ?>">
                <h3>Temukan Jadwal</h3>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <label >Pilih Bulan</label>
                                <select name="bulan" id="bulan" class="form-control">
                                    <option selected disabled>- Bulan -</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <label >Pilih Tahun</label>
                                <select name="tahun" id="tahun" class="form-control">
                                    <option selected value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <input type="submit" class="btn btn-secondary" value="Cek Kuota Pendakian">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- about -->
<div id="about" class="about mt-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="titlepage">
                <h2>Tentang Gunung Ciremai</h2>
                <span> <?= $interface[0]['tentang'] ?> </span>
            </div>
        </div>
    </div>
    </div>
    <div class="bg">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                    <img src="<?= base_url('assets/images/banner/') . $interface[1]['gambar'] ?>" class="img-fluid img-thumbnail" alt="images" width="700px">
                  </div>
               </div>
            </div>
         </div>
</div>
<!-- end about -->

<!-- traveling -->
<div id="travel" class="traveling">
    <div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="titlepage">
                <h2>Peraturan Pendakian</h2>
                <span class="text-justify"><pre><?= $interface[1]['tentang'] ?></pre></span>
            </div>
        </div>
    </div>
	
	<div class="titlepage">
		<h2>Pos Pendakian</h2>
	</div>
	</div>
	
	<div class="container-fluid">
    <div class="row ml-4">
		<?php foreach ($pos as $p) { ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 my-2 mx-auto">
			<div class="card shadow" style="width: 18rem;">
			  <img src="<?= base_url('assets/images/pos/') . $p['gambar'] ?>" class="img-fluid card-img-top" alt="icon" />
			  <div class="card-body">
				<h4 class="card-title text-center font-weight-bold" style="margin: 0;">Pos <?= $p['id_pos'] ?> - <?= $p['nama_pos'] ?></h4>
			  </div>
			</div>
        </div>
		<?php } ?>
    </div>
    </div>
</div>
<!-- end traveling -->