<div class="container">
    <h3 class="font-weight-bold text-center my-3">Login Pendaki Ciremai</h3>
    <?= $this->session->flashdata('message') ?>
    <div class="text-black my-3">
        <form action="<?= base_url('c_auth/login') ?>" method="post" class="mainform">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label >E-mail</label>
                        <input class="form-control" type="text" name="email">
                        <?= form_error('email'); ?>
                    </div>
                    <div class="col-md-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password">
                        <?= form_error('password'); ?>
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn btn-warning" name="login" value="Login">
                        or
                        <a href="<?= base_url('c_auth/register') ?>"><span class="badge badge-info">Register</span></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>