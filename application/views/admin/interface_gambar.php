<div class="container">
    <h2 class="text-center font-weight-bold">Gambar Banner</h2>
    <hr>
    <?= $this->session->flashdata('message_gambar') ?>
    
    <div class="container text-center">
        <img src="<?= base_url('assets/images/banner/') . $interface[0]['gambar'] ?>" alt="Gambar Header" class="img-fluid img-responsive img-thumbnail mb-3" width="300">
    </div>

    <form action="<?= base_url('c_interface/update_gambar_tentang') ?>" method="post" enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="customFile">
            <label class="custom-file-label" id="customLabel" for="customFile">Upload gambar</label>

            <button type="submit" name="submit" class="btn btn-info mt-3">Upload</button>
        </div>
    </form>
</div>

<script>
    var element = document.getElementById("customFile");

    element.addEventListener("change", (e) => {
        var fileName = e.target.files[0].name;
        document.getElementById("customLabel").innerHTML = fileName;
    });
</script>