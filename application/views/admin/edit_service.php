<div class="container">
    <div class="row">
        <div class="col">
            <h5 class="display-4 text-center">Edit Service</h5>
            <form method="post" action="<?= site_url('c_services/edit'); ?>" enctype="multipart/form-data">
    <?php foreach($service_by_id as $s) : ?>

                <input type="hidden" name="id_service" value="<?= $s['id_service'] ?>">
                <div class="form-group">
                    <label for="judul_service">Judul Service</label>
                    <input type="text" class="form-control" name="judul_service" id="judul_service" value="<?= $s['judul_service'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="subjudul_service">Sub-Judul Service</label>
                    <input type="text" class="form-control" name="subjudul_service" id="subjudul_service" value="<?= $s['sub_judul_service'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="url_service">URL Service</label>
                    <input type="text" class="form-control" name="url_service" id="url_service" value="<?= $s['url_service'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Warna Service</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="warna_service" id="service_green" value="green" <?= ($s['warna_service']=='green' ? 'checked' : '') ?> >
                        <label class="form-check-label" for="service_green">Green</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="warna_service" id="service_blue" value="blue" <?= ($s['warna_service']=='blue' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="service_blue">Blue</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="warna_service" id="service_white" value="white" <?= ($s['warna_service']=='white' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="service_white">White</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="warna_service" id="service_red" value="red" <?= ($s['warna_service']=='red' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="service_red">Red</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="warna_service" id="service_yellow" value="yellow" <?= ($s['warna_service']=='yellow' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="service_yellow">Yellow</label>
                    </div>
                </div>
                <div class="form-group">
                        <label>Gambar Service</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar_service_edit" id="gambar_service_edit" onchange="img_name(this, 'label_gambar_service', 'img_preview')">
                            <label class="custom-file-label" for="gambar_service_edit" id="label_gambar_service">Choose file</label>
                        </div>
                        <input type="hidden" name="gambar_service_hidden" id="gambar_service_hidden" value="<?= $s['img_service'] ?>">
                    </div>
                    Preview Gambar Yang Sudah Diupload: <br>
                    <img src="<?= base_url('assets/') ?>images/services/<?= $s['img_service'] ?>" class="img-thumbnail" id="img_preview" width="200px">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="aktif_service" id="aktif_service" value="aktif" <?= ($s['is_active']==1 ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="aktif_service">
                        Sebagai Service Aktif?
                    </label>
                </div>
            </div>
                <input type="submit" class="btn btn-secondary btn-sm mb-3" value="Edit Service">
        
    <?php endforeach; ?>            
            </form>
        </div>
    </div>
</div>