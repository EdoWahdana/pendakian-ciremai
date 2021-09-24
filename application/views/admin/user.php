<div class="container">
    <h2 class="text-center font-weight-bold">Daftar User</h2>
    <hr>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="mainTable">
                <thead class="text-center">
                    <tr>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Jenis Identitas</th>
                        <th>No Identitas</th>
                        <th>No Handphone</th>
                        <th>Email</th>
                        <th>Foto Identitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($customers as $user) {
                    ?>
                    <tr>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['jk'] ?></td>
                        <td><?= $user['alamat'] ?></td>
                        <td><?= $user['jenis_identitas'] ?></td>
                        <td><?= $user['no_identitas'] ?></td>
                        <td><?= $user['no_handphone'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><a href="<?= base_url('assets/uploaded/') . $user['foto_identitas'] ?>" target="blank"><span class="badge badge-info badge-sm">Lihat Gambar</span></a></td>
                        <td><a href="<?= base_url('c_customer/delete?id=') . $user['id_customer'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('c_customer/delete') ?>">
            <input type="hidden" name="id_user" value="">
        </form>
        <p>Anda yakin ingin menghapus user ini?</p>
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('c_customer/delete') ?>" class="btn btn-primary">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event){
      $("#mainTable").DataTable();
    });
</script>