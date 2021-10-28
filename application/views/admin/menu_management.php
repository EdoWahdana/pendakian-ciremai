    <div class="container-fluid">
        <!-- Button trigger modal Tambah Menu -->
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-info btn-md rounded-pils mb-2" data-toggle="modal" data-target="#modalTambahMenu">
                    Tambah Menu
                </button>
            </div>   
            <div class="col-6">
                <button type="button" class="btn btn-info btn-md rounded-pils mb-2" data-toggle="modal" data-target="#modalTambahSubMenu">
                    Tambah Sub Menu
                </button>
            </div>   
        </div>

        <?= $this->session->flashdata('message_menu'); ?>

            <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col" width="2%">No</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Icon Menu</th>
                    <th scope="col">Url Menu</th>
                    <th scope="col">Aktif Menu</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Perulangan untuk menampilkan menu pada tabel -->
                <?php foreach($all_menu as $index => $m) : ?>
                    <tr>
                        <th class="text-center" scope="row"><?= $index+1; ?></th>
                        <td><?= $m['nama_menu']; ?></td>
                        <td><?= $m['icon_menu']; ?></td>
                        <td><?= $m['url_menu']; ?></td>
                        <td><?= ($m['is_active']==1 ? 'Aktif' : 'Tidak Aktif'); ?></td>
                        <td class="text-center"><button type="button" data-toggle="modal" data-target="#modal-edit-<?= $m['id_menu']; ?>" class="btn btn-info">Edit</button></td>
                    <?php if($m['is_sub_menu'] == 1) { ?>
                        <td class="text-center"><a href="<?= site_url('c_menu_admin/hapus_menu_submenu/' .$m['id_menu']) ?>" class="btn btn-danger">Hapus</a></td>
                    <?php } else { ?>
                        <td class="text-center"><a href="<?= site_url('c_menu_admin/hapus_menu/' .$m['id_menu']) ?>" class="btn btn-danger">Hapus</a></td>
                    <?php } ?>
                    </tr>
                <!-- Perulangan untuk menampilkan submenu pada tabel -->
                <?php if($m['is_sub_menu'] == 1) {
                        foreach($all_submenu as $index => $sm) : 
                            if($sm['id_menu'] == $m['id_menu']) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><small><?= $sm['nama_sub_menu']; ?></small></td>
                                    <td><small><?= $sm['icon_sub_menu']; ?></small></td>
                                    <td><small><?= $sm['url_sub_menu']; ?></small></td>
                                    <td><small><?= ($sm['is_active']==1 ? 'Aktif' : 'Tidak Aktif'); ?></small></td>
                                    <td><button type="button" data-toggle="modal" data-target="#modal-edit-sub<?= $sm['id_sub_menu']; ?>" class="btn btn-sm btn-info">Edit</button></td>
                                    <td><a href="<?= site_url('c_menu_admin/hapus_submenu/' .$sm['id_sub_menu']) ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                                </tr>
                            <?php endif; ?>

                            <!-- Modal Edit Sub Menu -->
                                <div class="modal fade" id="modal-edit-sub<?= $sm['id_sub_menu']; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sub Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" action="<?= site_url('c_menu_admin/edit_submenu/'.$sm['id_sub_menu']); ?>">
                                            <div class="form-group">
                                                <label for="nama_submenu">Nama Sub Menu</label>
                                                <input type="text" class="form-control" name="nama_submenu" id="nama_submenu_<?= $sm['id_sub_menu'] ?>" value="<?= $sm['nama_sub_menu'] ?>" required>
                                            </div>            
                                            <div class="form-group">
                                                <label for="icon_submenu">Icon Sub Menu</label>
                                                <input type="text" class="form-control" name="icon_submenu" id="icon_submenu_<?= $sm['id_sub_menu'] ?>" value="<?= $sm['icon_sub_menu'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="url_submenu">Url Menu</label>
                                                <input type="text" class="form-control" name="url_submenu" id="url_submenu_<?= $sm['id_sub_menu'] ?>" value="<?= $sm['url_sub_menu'] ?>" required>
                                            </div>
                                            <div class="form-check">
                                                <?php if( $m['is_active'] == 1 ) { ?>
                                                    <input class="form-check-input" type="checkbox" name="aktif_submenu" id="aktif_submenu_<?= $sm['id_sub_menu']; ?>" value="aktif" checked="checked">
                                                <?php } else { ?>
                                                    <input class="form-check-input" type="checkbox" name="aktif_submenu" id="aktif_submenu_<?= $sm['id_sub_menu']; ?>" value="aktif">
                                                <?php } ?>
                                                <label class="form-check-label" for="aktif_submenu_<?= $sm['id_sub_menu']; ?>">
                                                    Sebagai Sub Menu Aktif?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-secondary" value="Edit Sub Menu">
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- End of Modal Edit Sub Menu -->
                        <?php endforeach;   }   ?>


                    <!-- Modal Edit Menu -->
                        <div class="modal fade" id="modal-edit-<?= $m['id_menu']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="<?= site_url('c_menu_admin/edit_menu/'.$m['id_menu']); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_menu" id="nama_menu_<?= $m['id_menu']; ?>"  value="<?= $m['nama_menu']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="icon_menu" id="icon_menu_<?= $m['id_menu']; ?>"  value="<?= $m['icon_menu']; ?>" required>
                                </div>
                                <div class="form-check">
                                    <?php if( $m['is_sub_menu'] == 1 ) { ?>
                                        <input class="form-check-input" type="checkbox" name="sub_menu" id="sub_menu_<?= $m['id_menu']; ?>" value="ada" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" name="sub_menu" id="sub_menu_<?= $m['id_menu']; ?>" value="ada">
                                    <?php } ?>                                    
                                    <label class="form-check-label" for="sub_menu_<?= $m['id_menu']; ?>">
                                        Apakah ada Sub-Menu?
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="url_menu" id="url_menu_<?= $m['id_menu']; ?>" value="<?= $m['url_menu']; ?>" required>
                                </div>
                                <div class="form-check">
                                    <?php if( $m['is_active'] == 1 ) { ?>
                                        <input class="form-check-input" type="checkbox" name="aktif_menu" id="aktif_menu<?= $m['id_menu']; ?>" value="aktif" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" name="aktif_menu" id="aktif_menu<?= $m['id_menu']; ?>" value="aktif">
                                    <?php } ?>
                                    <label class="form-check-label" for="aktif_menu<?= $m['id_menu']; ?>">
                                        Sebagai Menu Aktif?
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-secondary" value="Edit Menu">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    <!-- End of Modal Edit Menu -->

                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        <!-- End of Table Section -->
    </div>




<!-- Modal Tambah Menu -->
    <div class="modal fade" id="modalTambahMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Isi Data Menu Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('c_menu_admin/tambah_menu'); ?>">
            <div class="form-group">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Masukkan nama menu" required>
            </div>
            <div class="form-group">
                <label for="icon_menu">Icon Menu</label>
                <input type="text" class="form-control" name="icon_menu" id="icon_menu" placeholder="Masukkan class icon fontawesome" required>
            </div>
            <label for="url_menu">Url Menu</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <small class="mr-1">SubMenu ? </small> <input type="checkbox" name="sub_menu" id="sub_menu" value="ada">
                    </div>
                </div>
                <input type="text" class="form-control" name="url_menu" id="url_menu" placeholder="Masukkan nama controller dan methodnya" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aktif_menu" id="aktif_menu" value="aktif">
                <label class="form-check-label" for="aktif_menu">
                    Sebagai Menu Aktif?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" value="Tambah Menu">
        </div>
        </form>
        </div>
    </div>
    </div>   
<!-- End of Modal Tambah Menu -->



<!-- Modal Tambah Sub Menu -->
    <div class="modal fade" id="modalTambahSubMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Isi Data Sub Menu Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= site_url('c_menu_admin/tambah_submenu'); ?>">
            <div class="input-group mb-3">
                <select class="custom-select" name="id_menu_submenu" id="id_menu_submenu">
                    <option disabled selected>Pilih Menu untuk ditambahkan Sub Menu..</option>
                    <?php foreach($menu_submenu as $ms) : ?>
                    <option value="<?= $ms['id_menu'] ?>"> <b><?= $ms['nama_menu'] ?></b> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_submenu">Nama Sub Menu</label>
                <input type="text" class="form-control" name="nama_submenu" id="nama_submenu" placeholder="Masukkan nama menu" required>
            </div>            
            <div class="form-group">
                <label for="icon_submenu">Icon Sub Menu</label>
                <input type="text" class="form-control" name="icon_submenu" id="icon_submenu" placeholder="Masukkan class icon fontawesome" required>
            </div>
            <div class="form-group">
                <label for="url_submenu">Url Menu</label>
                <input type="text" class="form-control" name="url_submenu" id="url_submenu" placeholder="Masukkan nama controller dan methodnya" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aktif_submenu" id="aktif_submenu" value="aktif">
                <label class="form-check-label" for="aktif_submenu">
                    Sebagai Sub Menu Aktif?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" value="Tambah Sub Menu">
        </div>
        </form>
        </div>
    </div>
    </div>
<!-- End of Modal Tambah Sub Menu -->



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>