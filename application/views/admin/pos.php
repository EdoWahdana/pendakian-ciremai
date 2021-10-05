<div class="container">
    <h2 class="text-center font-weight-bold">Update Info Pos</h2>
    <hr>
    <?= $this->session->flashdata('message_pos') ?>
    
    <div class="container text-center">
        <img src="<?= base_url('assets/images/pos/') . $pos[0]['gambar'] ?>" alt="Gambar Pos" class="img-fluid img-responsive img-thumbnail mb-3" width="300">
    </div>

    <form action="<?= base_url('c_pos/update_pos') ?>" method="post" enctype="multipart/form-data">
        <div class="custom-file">
			<input type="hidden" name="id_pos" value="<?= $_GET['id_pos'] ?>">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="gambar_pos" id="gambar_pos" value="<?= $pos[0]['gambar'] ?>">
				<label class="custom-file-label" id="customLabel" for="gambar_pos">Pilih Gambar</label>
			</div>

			<textarea class="form-control my-3" name="deskripsi" id="deskripsi" cols="100" rows="5" placeholder="Tulis deskripsi terbaru pos tersebut..."><?= $pos[0]['deskripsi'] ?></textarea>

            <button type="submit" name="submit" class="btn btn-secondary">Update</button>
        </div>
    </form>
</div>

<script>
    var element = document.getElementById("gambar_pos");

    element.addEventListener("change", (e) => {
        var fileName = e.target.files[0].name;
        document.getElementById("customLabel").innerHTML = fileName;
    });
</script>