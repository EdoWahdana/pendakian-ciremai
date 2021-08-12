<?php 
    if($this->session->userdata('nama') == "")
        redirect('c_home');
?>

<form action="<?= base_url('c_order/daftar_pendaki') ?>" method="post">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="font-weight-bold text-center my-3">Konfirmasi Data Pendaki</h3>
        </div>
    </div>
    <input type="hidden" name="id_customer" id="id_customer" value="<?= $this->session->userdata('id') ?>">
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Tanggal Naik</label>
            <div class="col-sm-4">
                <input type="hidden" id="tanggal_naik" name="tanggal_naik" class="form-control" value="<?= $tanggal_naik ?>">
                <input disabled type="text" class="form-control" value="<?= indonesian_date($tanggal_naik); ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Tanggal Turun</label>
            <div class="col-sm-4">
                <input type="hidden" id="tanggal_turun" name="tanggal_turun" class="form-control" value="<?= $tanggal_turun ?>">
                <input disabled type="text" class="form-control" value="<?= indonesian_date($tanggal_turun); ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Nama Lengkap</label>
            <div class="col-sm-4">
                <input readonly type="text" id="nama" name="nama" class="form-control" value="<?= $this->session->userdata('nama') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Alamat</label>
            <div class="col-sm-4">
                <textarea readonly name="alamat" id="alamat" cols="47"> <?= $this->session->userdata('alamat') ?> </textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-4">
                <input readonly type="text" id="jk" name="jk" class="form-control" value="<?= $this->session->userdata('jk') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">Jenis Identitas</label>
            <div class="col-sm-4">
                <input readonly type="text" id="jenis_identitas" name="jenis_identitas" class="form-control" value="<?= $this->session->userdata('jenis_identitas') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">No. <?= $this->session->userdata('jenis_identitas') ?></label>
            <div class="col-sm-4">
                <input readonly type="text" id="no_identitas" name="no_identitas" class="form-control" value="<?= $this->session->userdata('no_identitas') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">No. Handphone</label>
            <div class="col-sm-4">
                <input readonly type="text" id="no_handphone" name="no_handphone" class="form-control" value="<?= $this->session->userdata('no_handphone') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 offset-sm-3 control-label">E-mail</label>
            <div class="col-sm-4">
                <input readonly type="text" id="email" name="email" class="form-control" value="<?= $this->session->userdata('email') ?>">
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <input type="checkbox" name="setuju" id="setuju"> <p class="text-info">Saya yakin dengan data ini dan bersedia untuk melanjutkan ke tahap konfirmasi pembayaran.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-info btn-md" name="lanjut" id="lanjut" value="Lanjutkan">
            </div>
        </div>
    </div>
</div>
</form>

<hr class="mt-4" style="border-width: 5px;">

<script>
    if($('#setuju').prop('checked')) {
        $('#lanjut').removeAttr('disabled');
    } else 
        $('#lanjut').attr('disabled');
</script>



<!-- Ini fungsi untuk menambahkan jumlah data secara dinamis -->

<!-- <div id="content">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <input disabled type="submit"id="submit" class="btn btn-block btn-info" value="Upload Identitas Pendaki">
            </div>
        </div>
    </div>
</div> -->

<!-- <script>
    $(document).ready(function (){
        var no = 0;
        $('#tambahData').click(function() {
            $('#submit').removeAttr('disabled');
            no = no + 1;
            $('.no_pendaki').attr('id', 'no_pendaki' + no);
            $('#no_pendaki' + no).text(no); 
            $('#content').append(`
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="display-5 font-weight-bold text-center text-muted my-3">Identitas Pendaki <span class="no_pendaki"></span> </h5>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-4">
                            <input type="text" id="nama" name="nama[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">Alamat</label>
                        <div class="col-sm-4">
                            <textarea id="alamat" name="alamat[]" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <select name="jk[]" id="jk" class="form-control">
                                <option selected value="L" >Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">Jenis Identitas</label>
                        <div class="col-sm-4">
                            <select name="jenis_identitas[]" id="jenis_identitas" class="form-control">
                                <option selected value="KTP">KTP</option>
                                <option value="KTM">KTM</option>
                                <option value="KK">KK</option>
                                <option value="SIM">SIM</option>
                                <option value="Passport">Passport</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">No. Identitas</label>
                        <div class="col-sm-4">
                            <input type="text" id="no_identitas" name="no_identitas[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">No. Handphone</label>
                        <div class="col-sm-4">
                            <input type="text" id="no_handphone" name="no_handphone[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 offset-sm-3 control-label">E-mail</label>
                        <div class="col-sm-4">
                            <input type="text" id="email" name="email[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-4" style="border-width: 5px;">
            `)
        });
    });
</script> -->