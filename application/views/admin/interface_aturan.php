<div class="container">
    <h2 class="text-center font-weight-bold">Aturan Pendakian Gunung Ciremai</h2>
    <hr>
    <?= $this->session->flashdata('message_aturan') ?>
	
	<div class="container text-center mb-3">
        <img src="<?= base_url('assets/images/banner/') . $aturan[0]['gambar'] ?>" alt="Gambar Header" class="img-fluid img-responsive img-thumbnail mb-3" width="300">
    </div>

    <pre class="text-justify mb-3"><?= $aturan[0]['tentang'] ?> </pre>
    <hr>

    <form class="mb-3" action="<?= base_url('c_interface/update_aturan') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col text-center">
				<textarea name="aturan_hidden" id="aturan_hidden" style="display: none;"><?= $aturan[0]['tentang'] ?></textarea>
			
				<textarea name="aturan" id="aturan" cols="100" rows="10" placeholder="Tulis aturan pendakian terupdate..."><?= $aturan[0]['tentang'] ?></textarea>
				
				<div class="custom-file mt-3">
					<input type="file" class="custom-file-input" name="gambar" id="gambar" value="<?= $aturan[0]['gambar'] ?>">
					<label class="custom-file-label" id="customLabel" for="gambar">Pilih Gambar</label>
				</div>
            </div>
            <button type="submit" name="submit" class="btn btn-info">Update</button>
        </div>

    </form>
</div>

<script>
    var element = document.getElementById("gambar");

    element.addEventListener("change", (e) => {
        var fileName = e.target.files[0].name;
        document.getElementById("customLabel").innerHTML = fileName;
    });
</script>