<div class="container">
    <h2 class="text-center font-weight-bold">Aturan Pendakian Gunung Ciremai</h2>
    <hr>
    <?= $this->session->flashdata('message_aturan') ?>

    <pre class="text-justify mb-3"><?= $aturan[0]['tentang'] ?> </pre>
    <hr>

    <form class="mb-3" action="<?= base_url('c_interface/update_tentang') ?>" method="post">
        <div class="row">
            <div class="col text-center">
                <textarea name="aturan" id="aturan" cols="100" rows="5" placeholder="Tulis aturan pendakian terupdate..."></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-info">Update</button>
        </div>

    </form>

</div>