<?php 
    if($this->session->userdata('nama') == "")
        redirect('c_home');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <p class="display-4 font-weight-bold text-center my-3">Profil Saya</p>
        </div>
        <div class="col-sm-2 offset-sm-1">
            <a href="<?= base_url('c_home/edit_profil') ?>" class="btn btn-light my-3"><i class="fa fa-edit"></i> Edit Profil</a>
        </div>
        <?= $this->session->flashdata('message') ?>
    </div>
    <hr>
    <br>

    <div class="row">
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Nama
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('nama') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Tanggal Lahir
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('tanggal_lahir') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Alamat
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('alamat') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Jenis Identitas
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('jenis_identitas') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            No. Identitas
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('no_identitas') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            No. Handphone
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('no_handphone') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Email
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <h3 class="font-weight-bold"><?= $this->session->userdata('email') ?></h3>
        </div>
        <div class="col-sm-4 offset-sm-1 my-1 text-right">
            Foto Identitas
        </div>
        <div class="col-sm-1 text-center">
            :
        </div>
        <div class="col-sm-4 text-left">
            <a href="<?= base_url('assets/uploaded/') . $this->session->userdata('foto_identitas') ?>" target="blank"><span class="badge badge-info">Lihat Gambar</span></a>
        </div>
    </div>
</div>