<div class="container">
    <h2 class="text-center font-weight-bold">Daftar Pos</h2>
    <hr>
    <?= $this->session->flashdata('message_pos') ?>
	
	<div class="row">
	<?php foreach($pos as $p) { ?>
		<div class="col-sm-3 my-3 mx-4">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="<?= base_url('assets/images/pos/') . $p['gambar'] ?>" alt="Gambar Pos">
			  <div class="card-body">
				<h5 class="card-title">Pos <?= $p['id_pos'] ?></h5>
				<p class="card-text"><?= (strlen($p['deskripsi']) > 120) ? substr($p['deskripsi'], 0, 120)."..." : $p['deskripsi'] ?></p>
				<a href="<?= base_url('c_pos/view_pos_by_id') ?>?id_pos=<?= $p['id_pos'] ?>" class="btn btn-secondary btn-sm my-2">Edit Info</a>
			  </div>
			</div>
		</div>
	<?php } ?>
	</div>
	
</div>
	