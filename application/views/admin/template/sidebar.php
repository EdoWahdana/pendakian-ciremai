<div id="wrapper">

<ul class="sidebar navbar-nav">
 
  <!-- Perulangan untuk menampilkan menu -->
  <?php  foreach ($menu as $m) : 
      if($m['is_sub_menu'] == 1) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= base_url().$m['url_menu'] ?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="<?= $m['icon_menu'] ?>"></i>
            <span><?= $m['nama_menu'] ?></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- Perulangan untuk menampilkan submenu yang sama dengan menu_id -->
            <?php foreach($submenu as $sb) : 
                if($sb['id_menu'] == $m['id_menu']) : 
                    if($sb['nama_sub_menu'] == $aktif) { ?>
              <!-- Seleksi jika submenu active, maka beri class active -->
                      <a class="dropdown-item active" href="<?= base_url().$sb['url_sub_menu'] ?>">
              <?php } else { ?>
                      <a class="dropdown-item" href="<?= base_url().$sb['url_sub_menu'] ?>">
              <?php } ?>
                        <span class="<?= $sb['icon_sub_menu']; ?> mr-2"></span><?= $sb['nama_sub_menu'] ?>
                      </a>
                      <div class="dropdown-divider"></div>
            <?php endif;  endforeach; ?>
          </div>
        </li>
  <!-- Seleksi jika menu item active,maka beri class active  -->
  <?php } else { 
            if($m['nama_menu'] == $aktif){
              echo '<li class="nav-item active">';
            } else {
              echo '<li class="nav-item">'; } ?>    
        <a class="nav-link" href="<?= site_url($m['url_menu']) ?>">
          <i class="<?= $m['icon_menu'] ?>"></i>
          <span><?= $m['nama_menu'] ?></span>
        </a>
      </li>
  <?php } endforeach; ?>

</ul>

<div id="content-wrapper">