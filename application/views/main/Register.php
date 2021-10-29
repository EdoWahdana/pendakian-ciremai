<div class="container">
    <h3 class="font-weight-bold text-center my-3">Register Pendaki Ciremai</h3>
    <?= $this->session->flashdata('message_register') ?>
    <div class="text-black my-3">
        <form action="<?= base_url('c_auth/register') ?>" method="post" class="mainform" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label>Nama <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>" required>
                        <?= form_error('nama'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal Lahir <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>" min="<?= date('Y-m-d', strtotime(date('Y-m-d') . "-50 year")) ?>" max="<?= date('Y-m-d', strtotime(date('Y-m-d') . "-17 year")) ?>" required>
                        <?= form_error('tanggal_lahir'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Alamat <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="3"><?= set_value('alamat') ?></textarea>
                        <?= form_error('alamat'); ?>
                    </div>  
                    <div class="col-md-12">
                        <label>Jenis Kelamin <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option selected value="L" >Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <?= form_error('jk'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Jenis Identitas <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <select name="jenis_identitas" id="jenis_identitas" class="form-control">
                            <option selected value="KTP">KTP</option>
                            <option value="KTM">KTM</option>
                            <option value="KK">KK</option>
                            <option value="SIM">SIM</option>
                            <option value="Passport">Passport</option>
                        </select>
                        <?= form_error('jenis_identitas'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>No Identitas <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input type="text" class="form-control" name="no_identitas" id="no_identitas" value="<?= set_value('no_identitas') ?>" min=10 max=20 required>
                        <?= form_error('no_identitas'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>No Handphone <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input type="text" class="form-control" name="no_handphone" id="no_handphone" value="<?= set_value('no_handphone') ?>" min=10 max=13 required>
                        <?= form_error('no_handphone'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Email <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" required>
                        <?= form_error('email'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Password <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input type="password" class="form-control" name="password" id="password" minlength="5" oninvalid="this.setCustomValidity('Minimal 5 karakter')" oninput="this.setCustomValidity('')" required>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Foto Identitas <span style="color: red;">* <sup>wajib diisi</sup></span></label>
                        <input type="file" class="form-control" name="foto_identitas" id="foto_identitas" required>
                        <?= form_error('foto_identitas'); ?>
                    </div> <br>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-warning" name="register" value="Register">
                        or
                        <a href="<?= base_url('c_home/login') ?>"><span class="badge badge-info">Login</span></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>