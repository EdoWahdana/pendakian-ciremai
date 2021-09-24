<div class="container">
    <h2 class="text-center font-weight-bold">Data Chat Pendaki</h2>
    <hr>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered text-center" id="mainTable">
                <thead class="text-center">
                    <tr>
                        <th>ID Pendaki</th>
                        <th>Nama Pendaki</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($chat as $o) {
                    ?>
                    <tr>
                        <td><?= $o['id_customer'] ?></td>
                        <td><?= $o['nama'] ?></td>
                        <td><a href="<?= base_url('c_dashboard/chat_by_id') . "?id_customer=" . $o['id_customer'] ?>" class="btn btn-info btn-sm text-white">Mulai Chat <i class="fa fa-comment"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event){
        $('#mainTable').DataTable();
    });
</script>