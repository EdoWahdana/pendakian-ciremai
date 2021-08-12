<div class="container">
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
        </div>        
    </div>
    <div class="row">
        <div class="col">
            <h5 class="display-4 text-center">Service Setting</h5>
            <div class="table-responsive">
                <table class="table table-hover table-bordered border border-dark">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sub-Judul</th>
                        <th scope="col">URL</th>
                        <th scope="col">Warna</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($semua_service as $index => $ss) : ?>
                        <tr class="text-center">
                            <td><?= $index+1 ?></td>
                            <td><?= $ss['judul_service'] ?></td>
                            <td><?= $ss['sub_judul_service'] ?></td>
                            <td><?= $ss['url_service'] ?></td>
                            <td><?= $ss['warna_service'] ?></td>
                            <td><img src="<?= base_url('assets/') ?>images/services/<?= $ss['img_service'] ?>" class="img-thumbnail img-fluid" width="150"></td>
                            <td><?= ($ss['is_active']==1 ? 'Aktif' : 'Tidak Aktif'); ?></td>
                            <td>
                                <a href="<?= site_url('c_dashboard/edit_service/'.$ss['id_service']) ?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <button type="button" class="btn btn-tuku mt-5" data-toggle="modal" data-target="#modalTambahService">
                    Tambah Service
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Service -->
<div class="modal fade" id="modalTambahService" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Isi Data Service Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('c_services/tambah_service'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_service">Judul Service</label>
                <input type="text" class="form-control" name="judul_service" id="judul_service" placeholder="Masukkan judul service" required>
            </div>
            <div class="form-group">
                <label for="subjudul_service">Sub-Judul Service</label>
                <input type="text" class="form-control" name="subjudul_service" id="subjudul_service" placeholder="Masukkan sub-judul service" required>
            </div>
            <div class="form-group">
                <label for="url_service">URL Service</label>
                <input type="text" class="form-control" name="url_service" id="url_service" placeholder="Masukkan URL service" required>
            </div>
            <div class="form-group">
                <label>Warna Service</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="warna_service" id="service_green" value="green">
                    <label class="form-check-label" for="service_green">Green</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="warna_service" id="service_blue" value="blue">
                    <label class="form-check-label" for="service_blue">Blue</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="warna_service" id="service_white" value="white">
                    <label class="form-check-label" for="service_white">White</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="warna_service" id="service_red" value="red">
                    <label class="form-check-label" for="service_red">Red</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="warna_service" id="service_yellow" value="yellow">
                    <label class="form-check-label" for="service_yellow">Yellow</label>
                </div>
            </div>
            <div class="form-group">
                    <label>Gambar Service</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar_service" id="gambar_service" required>
                        <label class="custom-file-label" for="gambar_service" id="label_gambar_service">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aktif_service" id="aktif_service" value="aktif">
                <label class="form-check-label" for="aktif_service">
                    Sebagai Service Aktif?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" value="Tambah Service">
        </div>
        </form>
        </div>
    </div>
    </div>
<!-- End of Modal Section -->