<div class="container">
    <h2 class="text-center font-weight-bold">Aturan Pendakian Gunung Ciremai</h2>
    <hr>
    <?= $this->session->flashdata('message') ?>

    <p class="text-justify mb-3"><?= $interface[0]['tentang'] ?> </p>
    <hr>

    <form action="<?= base_url('c_interface/update_tentang') ?>" method="post">
        <div class="row">
            <div class="col text-center">
                <textarea name="tentang" id="tentang" cols="100" rows="5" placeholder="Tulis informasi perusahaan terupdate..."></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-info">Update</button>
        </div>

    </form>

</div>