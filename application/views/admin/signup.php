<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Ciremai | Register Page</title>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/admin.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/styles.css">
</head>
<body>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('c_admin') ?>"><img src="<?= base_url('assets/'); ?>images/tngc.png" class="img-fluid img-responsive"></a>
        </div>
        <div class="col-md-6">
            <?= $this->session->flashdata('message_admin_register'); ?>
            <div class="card card-login shadow-lg mx-auto mb-5">
            <div class="card-header text-center my-4">
                <h3 class="text-fluid">Register Admin Baru</h3>
            </div>
            <div class="card-body">
                <form class="user" method="post" action="<?= site_url('c_admin/register_admin'); ?>">
                <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Fullname" autofocus="autofocus">
                    <?= form_error('name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus="autofocus">
                    <?= form_error('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <?= form_error('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                    <input type="password" id="c_password" name="c_password" class="form-control" placeholder="Confirm Password">
                    <?= form_error('c_password'); ?>
                    </div>
                </div>
                <button class="btn btn-secondary btn-block" type="submit">Register</button>
                </form>
                <hr />
            </div>
            </div>
        </div>
    </div>
  </div>

</body>
</html>