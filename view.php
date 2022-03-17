
    <?= $this->extend('template/dashboard/admin/template'); ?>
    <?= $this->section('content'); ?>


    <div class="col-xl-12 col-lg-12">
        <a class="btn btn-success" style="margin:5px" href="<?= base_url(); ?>/emoney/create" ><i class="fa fa-plus"> TAMBAH</i></a><br>
            <a class="btn btn-success" style="margin:5px"  href="<?php echo base_url('emoney/generatepdf') ?>">
                    Download PDF
            </a><br>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php
        // FUNGSI BUAT RUPIAH
        function buatRupiah($angka){
            $hasil = number_format($angka,2,',','.');
            return $hasil;
        }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">KEUANGAN</h6>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              
            <table class="table table-bordered mb-4" id="datakeuangan" cellspacing="0">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Asal</th>
                      <th>Tanggal</th>
                      <!-- <th>file</th> -->
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Jumlah</th>
                      <th colspan="3">Action</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Asal</th>
                    <th>Tanggal</th>
                    <!-- <th>file</th> -->
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Jumlah</th>
                    <th colspan="3">Action</th>
                    </tr>
                </tfoot>
        <tbody>
              <?php
              $no  = 1;
              $jumlah = 0;
              foreach ($emoney as $row) {
                $isi[] = $row->isi; $total_isi = array_sum($isi);
                $kredit[] = $row->kredit; $total_kredit = array_sum($kredit);
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->tempat; ?></td>
                    <td><?= $row->tanggal; ?></td>
                    <td>Rp. <?= buatRupiah($row->isi); ?></td> //Panggil Fungsi Buat Rupiah
                    <td>Rp. <?= buatRupiah($row->kredit); ?></td> //Panggil Fungsi Buat Rupiah
                    <td>
                    Rp. <?php echo buatRupiah($total_isi-$total_kredit); ?> //Panggil Fungsi Buat Rupiah
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div style="margin-right: 0;">
            
            <a class="btn btn-success text-light font-weight-bold" style="margin:5px" disabled> SALDO AKHIR : Rp. <?php echo buatRupiah($total_isi-$total_kredit); ?></a> //Panggil Fungsi Buat Rupiah
    </div>
</div>
</div>
</div>
</div>



<?= $this->endSection(); ?>
