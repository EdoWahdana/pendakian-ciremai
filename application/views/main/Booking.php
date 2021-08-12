<div class="container"> 
    <div class="row">
        <div class="col">
            <h5 class="display-5 text-center font-weight-bold my-3">Kuota Pendakian yang Tersedia</h5>

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
                            echo "<tr>
                                    <td>".indonesian_date($data['tanggal'])."</td>
                                    <td>".indonesian_date(date("Y-m-d", strtotime($data['tanggal'].'+2 days')))."</td>
                                    <td><a href='".base_url('c_home/order')."?tanggal=$data[tanggal]' class='btn btn-info btn-sm'>$data[kuota_tersisa]</a>
                                </tr>";
                        } else {
                            echo "<tr>
                                    <td>".indonesian_date($data['tanggal'])."</td>
                                    <td>".indonesian_date(date("Y-m-d", strtotime($data['tanggal'].'+2 days')))."</td>
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