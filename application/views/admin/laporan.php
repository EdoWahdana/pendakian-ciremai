<?php $daftarBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
<div class="container">
<h2 class="text-center font-weight-bold">Laporan</h2>
    <hr>
    <form action="<?= base_url('c_laporan/cetak_laporan') ?>" method="post">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pilih bulan : </label>
                    <select name="bulan" id="bulan" class="form-control">
                        <?php foreach($bulan as $b) { ?>
                            <option value="<?= $b ?>"><?= $daftarBulan[intval($b) - 1] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pilih tahun : </label>
                    <select name="tahun" id="tahun" class="form-control">
                        <?php foreach($tahun as $t) { ?>
                            <option value="<?= $t ?>"><?= $t ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success btn-md" name="laporan" id="laporan">
                    <i class="fa fa-sticky-note"></i> Cetak Laporan
                </button>
            </div>
        </div>
    </form>
    <hr>
</div>