<?php $daftarBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
<div class="container">
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col mt-3">
            <button type="button" class="btn btn-info btn-block mb-4" data-toggle="modal" data-target="#modalTambahKuota">
                Tambah Kuota
            </button>
        </div>   
    </div>
    <hr>
    <div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center font-weight-bold">Cek Ketersediaan Kuota per Bulan</h2>
            <div class="box">
                <form id="periode" class="form-horizontal" method="post" action="<?= site_url('c_kuota/get_kuota_per_periode'); ?>">
                    <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                            <select name="bulan" id="bulan" class="form-control">
                                <option selected disabled>- Pilih Bulan -</option>
                                <option value="01" selected>Januari</option>
                                <option value="02" <?= isset($bulan) ? ($bulan == '02' ? ' selected="selected"' : '') : '';?>>Februari</option>
                                <option value="03" <?= isset($bulan) ? ($bulan == '03' ? ' selected="selected"' : '') : '';?>>Maret</option>
                                <option value="04" <?= isset($bulan) ? ($bulan == '04' ? ' selected="selected"' : '') : '';?>>April</option>
                                <option value="05" <?= isset($bulan) ? ($bulan == '05' ? ' selected="selected"' : '') : '';?>>Mei</option>
                                <option value="06" <?= isset($bulan) ? ($bulan == '06' ? ' selected="selected"' : '') : '';?>>Juni</option>
                                <option value="07" <?= isset($bulan) ? ($bulan == '07' ? ' selected="selected"' : '') : '';?>>Juli</option>
                                <option value="08" <?= isset($bulan) ? ($bulan == '08' ? ' selected="selected"' : '') : '';?>>Agustus</option>
                                <option value="09" <?= isset($bulan) ? ($bulan == '09' ? ' selected="selected"' : '') : '';?>>September</option>
                                <option value="10" <?= isset($bulan) ? ($bulan == '10' ? ' selected="selected"' : '') : '';?>>Oktober</option>
                                <option value="11" <?= isset($bulan) ? ($bulan == '11' ? ' selected="selected"' : '') : '';?>>November</option>
                                <option value="12" <?= isset($bulan) ? ($bulan == '12' ? ' selected="selected"' : '') : '';?>>Desember</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2">Tahun</label>
                        <div class="col-sm-10">
                            <select name="tahun" id="tahun" class="form-control">
                                <option selected value="2021" <?= isset($tahun) ? ($tahun == '2021' ? ' selected="selected"' : '') : '';?>>2021</option>
                                <option value="2022" <?= isset($tahun) ? ($tahun == '2022' ? ' selected="selected"' : '') : '';?>>2022</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    </div>
                    <input type="submit" class="btn btn-secondary btn-sm my-3"  value="Cek Kuota Pendakian">
                </form>
            </div>  
            <div class="table-responsive">
                <table class="table table-hover table-bordered border border-dark">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kuota Tersisa</th>
                    </tr>
                </thead>
                <tbody id="daftar-kuota">
                <?php
                if(!empty($dataKuota) && isset($query)) {
                    echo "<p class='text-info text-center font-weight-bold'> Kuota bulan ".$daftarBulan[$bulan-1]." ".$tahun ."</p>";
                    foreach($dataKuota as $data) {
                        echo "  <tr>
                                    <td>". indonesian_date($data['tanggal']) ."</td>
                                    <td>".$data['kuota_tersisa'] ."</td>
                                </tr>";
                    }
                } else if(empty($dataKuota) && isset($query)) {
                    echo "<p class='text-danger text-center font-weight-bold'> Belum ada Kuota Pendakian di Bulan ".$daftarBulan[intval($bulan-1)]." - ".$tahun." </p>
                            <p class='text-danger text-center'> Klik tombol Tambah Kuota untuk menambahkan kuota pendakian! </p>";
                }
                ?>                   
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Tambah Menu -->
<div class="modal fade" id="modalTambahKuota" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Isi Data Kuota Pendakian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" name="tambah_kuota" action="<?= site_url('c_kuota/tambah_kuota'); ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal Pendakian</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Pilih tanggal pendakian" required>
            </div>
            <div class="form-group">
                <label for="kuota">Jumlah Kuota Pendakian</label>
                <input type="text" class="form-control" name="kuota" id="kuota" placeholder="Masukkan jumlah kuota pendakian" required>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" value="Tambah Kuota">
        </div>
        </form>
        </div>
    </div>
    </div>   
<!-- End of Modal Tambah Menu -->

<script src="<?= base_url('assets/') ?>js/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tanggal').change(function() {
            var tanggal = $(this).val();
            $.ajax({
               type: "POST",
               url: "<?= base_url('c_kuota/get_kuota_per_tanggal'); ?>",
               data:  "tanggal=" + tanggal,
               success: function(data) {
                   $('#kuota').val(data);
               }
            });
        });
    });
</script>