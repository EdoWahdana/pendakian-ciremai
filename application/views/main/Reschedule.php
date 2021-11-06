<div class="container"> 
    <div class="row">
        <div class="col">
            <h5 class="display-5 text-center font-weight-bold my-3">Kuota Pendakian yang Tersedia</h5>

			<a href="<?= base_url('c_home/pesanan'); ?>" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left"></i> Pesanan Saya </a>

            <div class="table-responsive">
                <table class="table table-hover table-bordered table-md border border-dark">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Tanggal Naik</th>
                        <th scope="col">Tanggal turun</th>
                        <th scope="col">Kuota Tersisa</th>
                    </tr>
                </thead>
                <tbody id="daftar-kuota" class="text-center">
                <?php
                setlocale(LC_ALL, 'id_ID');

                if(isset($dataKuota) && $dataKuota != NULL) {
                    foreach($dataKuota as $data) {
                        if($this->session->userdata('nama')) {
                            echo " <form method='post' action='". base_url('c_order/reschedule') ."'>
									<input type='hidden' name='id_order' value='". $id_order ."'
									<tr>
										<td>
											".indonesian_date($data['tanggal'])."
											<input type='hidden' value='". $data['tanggal'] ."' name='tanggal_naik'>
										</td>
										<td>". indonesian_date(date("Y-m-d", strtotime($data['tanggal'].'+2 days'))) ."</td>
										<td>
											<input type='submit' name='reschedule' class='btn btn-sm btn-info' value='". $data['kuota_tersisa'] ." Tersisa'>
										</td>
									</tr>
								</form>";
                        } else {
                            echo "<tr>
                                    <td>". indonesian_date($data['tanggal']) ."</td>
                                    <td>". indonesian_date(date("Y-m-d", strtotime($data['tanggal'].'+2 days'))) ."</td>
                                    <td>$data[kuota_tersisa]</td>
                                </tr>";
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger text-center display-5'>Kuota Pendakian Tidak Tersedia.</div>";
                }
                ?>                   
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>