<?php 
    if($this->session->userdata('nama') == "")
        redirect('c_home');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <p class="display-4 font-weight-bold text-center my-3">Edit Profil</p>
        </div>
    </div>
    <hr>
    <br>

    <form action="<?= base_url('c_auth/edit_profil') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Nama
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input type="hidden" name="id" id="id" value="<?= $this->session->userdata('id') ?>">
            <input class="form-control" type="text" name="nama" id="nama" value="<?= $this->session->userdata('nama') ?>">
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Tanggal Lahir
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $this->session->userdata('tanggal_lahir') ?>">
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Alamat
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <textarea class="form-control" type="text" name="alamat" id="alamat"><?= $this->session->userdata('alamat') ?></textarea>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Jenis Identitas
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <select name="jenis_identitas" id="jenis_identitas" class="form-control">
                <option value="KTP" <?= $this->session->userdata('jenis_identitas') == 'KTP' ? 'selected="selected"' : '' ?>>KTP</option>
                <option value="KTM" <?= $this->session->userdata('jenis_identitas') == 'KTM' ? 'selected="selected"' : '' ?>>KTM</option>
                <option value="KK" <?= $this->session->userdata('jenis_identitas') == 'KK' ? 'selected="selected"' : '' ?>>KK</option>
                <option value="SIM" <?= $this->session->userdata('jenis_identitas') == 'SIM' ? 'selected="selected"' : '' ?>>SIM</option>
                <option value="Passport" <?= $this->session->userdata('jenis_identitas') == 'Passport' ? 'selected="selected"' : '' ?>>Passport</option>
            </select>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            No. Identitas
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input class="form-control" type="text" name="no_identitas" id="no_identitas" value="<?= $this->session->userdata('no_identitas') ?>">
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            No. Handphone
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input class="form-control" type="text" name="no_handphone" id="no_handphone" value="<?= $this->session->userdata('no_handphone') ?>">
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Email
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input class="form-control" type="text" name="email" id="email" value="<?= $this->session->userdata('email') ?>">
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Foto Identitas
        </div>
        <div class="col-sm-2">
            :
        </div>
        <div class="col-sm-4 text-left">
            <input type="hidden" name="hidden_foto_identitas" id="hidden_foto_identitas" value="<?= $this->session->userdata('foto_identitas') ?>">
            <input type="file" class="form-control" name="foto_identitas" id="foto_identitas">
        </div>
        <div class="col-sm-6 offset-sm-5 my-3">
            <button type="submit" class="btn btn-info text-center" name="simpan"><i class="fa fa-check"></i> Simpan</button>
        </div>
    </div>
    </form>
</div>