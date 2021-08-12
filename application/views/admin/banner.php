<div class="container">
    <div class="row">
        <div class="col-md-8 text-center">
            <h5 class="display-4">Banner Setting</h5>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-4 text-center">
            <h5 class="display-4">Preview</h5>
        </div>
    </div>
    <div class="row">   
        <div class="col-md-8">    
            <div class="table-responsive">
                <table class="table table-hover table-bordered border border-dark">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sub-Judul</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Is Active</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($semua_banner as $index => $sb) : ?>
                    <tr>
                        <td><?= $index+1 ?></td>
                        <td><?= $sb['judul_banner'] ?></td>
                        <td><?= $sb['sub_judul_banner'] ?></td>
                        <td><?= $sb['gambar_banner'] ?></td>
                        <td><?= $sb['is_active'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-tuku mt-5" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Banner
            </button>
        </div>
        <div class="col-md-4">
            <!-- Slider Carousel -->
                <div id="mainBanner" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <!-- Perulangan untuk menampilkan indicator -->
                        <?php foreach($banner as $index => $b) : 
                            if($index == 0) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <?php } else { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <?php } endforeach; ?>
                    <!-- End of Perulangan untuk menampilkan indicator -->
                    </ol>
                    <div class="carousel-inner">
                    <!-- Perulangan untuk menampilkan banner dari database -->
                        <?php foreach($banner as $index => $b) : 
                            if($index == 0) { ?>
                            <div class="carousel-item active">
                                <img src="<?= base_url('assets/'); ?>images/banner/<?= $b['gambar_banner'] ?>" class="img-fluid d-block w-100 img-banner">
                                <div class="carousel-caption d-block mt-5 mb-sm-3">
                                    <h5><span class="badge badge-tuku"><?= $b['judul_banner'] ?></span></h5>
                                    <p><span class="badge badge-tuku"><?= $b['sub_judul_banner'] ?></span></p>
                                </div>	
                            </div>
                        <?php  } else { ?>
                            <div class="carousel-item">
                                <img src="<?= base_url('assets/'); ?>images/banner/<?= $b['gambar_banner'] ?>" class="img-fluid d-block w-100 img-banner">
                                <div class="carousel-caption d-block mt-5 mb-sm-3">
                                    <h5><span class="badge badge-tuku"><?= $b['judul_banner'] ?></span></h5>
                                    <p><span class="badge badge-tuku"><?= $b['sub_judul_banner'] ?></span></p>
                                </div>	
                            </div>
                        <?php  } endforeach; ?>
                    <!-- End of Perulangan untuk menampilkan banner dari database -->
                    </div>
                    <a class="carousel-control-prev" href="#mainBanner" role="button" data-slide="prev">
                        <span class="fas fa-arrow-alt-circle-left fa-3x" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#mainBanner" role="button" data-slide="next">
                        <span class="fas fa-arrow-alt-circle-right fa-3x" aria-hidden="true"></span>
                    </a>
                </div>
            <!-- End of Slider Carousel -->
        </div>
    </div>
</div>



<!-- Modal Tambah Banner -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Isi Data Banner Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('c_banner/tambah_banner'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="label-menu">Judul Banner</label>
                <input type="text" class="form-control" name="judul_banner" id="judul_banner" placeholder="Masukkan judul banner" required>
            </div>
            <div class="form-group">
                <label for="icon-menu">Sub-Judul Banner</label>
                <input type="text" class="form-control" name="subjudul_banner" id="subjudul_banner" placeholder="Masukkan sub-judul banner" required>
            </div>
            <div class="form-group">
                <label for="url-menu">Gambar Banner</label>
                <input type="file" class="form-control" name="gambar_banner" id="gambar_banner" placeholder="Upload gambar banner" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aktif_banner" id="aktif_banner" value="aktif">
                <label class="form-check-label" for="aktif_banner">
                    Sebagai Banner Aktif?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" value="Tambah Menu">
        </div>
        </form>
        </div>
    </div>
    </div>
<!-- End of Modal Section -->