<section >
    <div class="banner-main">
    <img src="<?= base_url('assets/') ?>images/ciremai1.png" alt="#"/>
    <div class="container">
        <div class="text-bg">
            <h1>Pendakian<br><strong class="white">Gunung Ciremai</strong></h1>
            <div class="container">
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
                <span> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span>
            </div>
        </div>
    </div>
    </div>
    <div class="bg">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                    <img src="<?= base_url('assets/') ?>icon/travel-icon2.png" alt="images">
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
                <h2>Select Offers For Traveling</h2>
                <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
                <i><img src="<?= base_url('assets/') ?>icon/travel-icon.png" alt="icon"/></i>
                <h3>Different Countrys</h3>
                <p> going to use a passage of Lorem Ipsum, you need to be </p>
                <div class="read-more">
                <a  href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
                <i><img src="<?= base_url('assets/') ?>icon/travel-icon2.png" alt="icon"/></i>
                <h3>Mountains Tours</h3>
                <p> going to use a passage of Lorem Ipsum, you need to be </p>
                <div class="read-more">
                <a  href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
                <i><img src="<?= base_url('assets/') ?>icon/travel-icon3.png" alt="icon"/></i>
                <h3>Bus Tours</h3>
                <p> going to use a passage of Lorem Ipsum, you need to be </p>
                <div class="read-more">
                <a  href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <div class="traveling-box">
                <i><img src="<?= base_url('assets/') ?>icon/travel-icon4.png" alt="icon"/></i>
                <h3>Summer Rest</h3>
                <p> going to use a passage of Lorem Ipsum, you need to be </p>
                <div class="read-more">
                <a  href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- end traveling -->