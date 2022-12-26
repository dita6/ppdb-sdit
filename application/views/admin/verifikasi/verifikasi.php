

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <?php
    echo $this->session->flashdata('msg');
    ?>
    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"> Data Verifikasi</h5>
          <hr style="margin:0px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <br>
                    <a href="panel_admin/edit_materi" class="btn btn-primary">Edit Materi & Jadwal Ujian</a>
                    <a href="panel_admin/pdf" class="btn btn-warning"><i class="fas fa-file"></i>Export PDF</a>

                    <div class="col-md-3" style="float:right;margin-right:25px;">
                      <div class="input-group">
                        <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                        <select class="form-control" name="thn" onchange="thn()">
                          <?php for ($i=date('Y'); $i >=2018 ; $i--) {?>
                            <option value="<?php echo $i; ?>" <?php if($v_thn==$i){echo "selected";} ?>>Tahun <?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Pas Foto</th>
              <th>No. Pendaftaran</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              

              <th>Status Verifikasi</th>
              <th class="text-center" width="180">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><img src="<?= base_url() ?>upload/foto/<?= $baris->pas_foto ?>" alt="<?php echo $baris->nama_lengkap; ?>" width="50"></td>
                  <td><?php echo $baris->no_pendaftaran; ?></td>
                  <td><?php echo $baris->nis; ?></td>
                  <td><?php echo $baris->nisn; ?></td>
                  <td><?php echo $baris->nik; ?></td>
                  <td><?php echo $baris->nama_lengkap; ?></td>
                  

                  <td align="center">
                    <?php if ($baris->status_verifikasi == 1) {?>
                      <label class="label label-success">Terverifikasi</label>
                    <?php }else{ ?>
                      <label class="label label-warning">Belum diVerifikasi</label>
                    <?php } ?>
                  </td>
                  <td align="center">
                    <a id="set_dtl" 
                    data-no_pendaftaran="<?=$baris->no_pendaftaran ?>"
                    data-nis="<?=$baris->nis ?>"
                    data-nisn="<?=$baris->nisn ?>"
                    data-nik="<?=$baris->nik ?>"
                    data-tgl_siswa="<?=$baris->tgl_siswa ?>"
                    data-nama_lengkap="<?=$baris->nama_lengkap ?>"
                    data-jk="<?=$baris->jk ?>"
                    data-tgl_lahir="<?=$baris->tgl_lahir ?>"
                    data-alamat_siswa="<?=$baris->alamat_siswa ?>"
                    data-no_hp_siswa="<?=$baris->no_hp_siswa ?>"
                    data-kk="<?=$baris->kk ?>" 
                    data-ijazah="<?=$baris->ijazah ?>"
                    data-akte="<?=$baris->akte ?>"
                    data-ktp_ortu="<?=$baris->ktp_ortu ?>"
                    data-pas_foto="<?=$baris->pas_foto ?>"
                     class="btn btn-default btn-xs" title="Detail" data-toggle="modal" data-target="#modal-detail"><i class="icon-eye"></i></a>
                    <a href="panel_admin/verifikasi_cetak/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-default btn-xs" title="Cetak Verifikasi" target="_blank"><i class="icon-printer2"></i></a>
                    <?php if ($baris->status_verifikasi == 0) {?>
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-info btn-xs" title="Verifikasi" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-checkmark4"></i></a>
                    <?php }else{ ?>
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-danger btn-xs" title="Batal Verifikasi" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-cross3"></i></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->

<!-- MODAL DETAIL -->
<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="modal-detailLabel">Data Siswa</h5>
        
      </div>
      <div class="modal-body">
    <table width="100%" border="0">
      <tr>
        <td width="200">NO. PENDAFTARAN</td>
        <td width="1">:</td>
        <td><span id="no_pendaftaran"></span></td>
      </tr>
      <tr>
        <td>TANGGAL PENDAFTARAN </td>
        <td>:</td>
        <td><span id="tgl_siswa"></td>
      </tr>
      
      <tr>
        <td>NIS</td>
        <td>:</td>
        <td><span id="nis"></td>
      </tr>
      <tr>
        <td>NISN</td>
        <td>:</td>
        <td><span id="nisn"></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><span id="nik"></td>
      </tr>
      <tr>
        <td>NAMA LENGKAP</td>
        <td>:</td>
        <td><span id="nama_lengkap"></td>
      </tr>
      <tr>
        <td>JENIS KELAMIN</td>
        <td>:</td>
        <td><span id="jk"></td>
      </tr>
      <tr>
        <td>TANGGAL LAHIR</td>
        <td>:</td>
        <td><span id="tgl_lahir"></td>
      </tr>
      <tr>
        <td>ALAMAT SISWA</td>
        <td>:</td>
        <td><span id="alamat_siswa"></span></td>
      </tr>
      <tr>
        <td>NO. HANDPHONE (HP)</td>
        <td>:</td>
        <td><span id="no_hp_siswa"></td>
      </tr>
      <tr>
        <td>Kartu Keluarga</td>
        <td>:</td>
        <td><embed src=""  type="application/pdf"  id="kk" width="300px" height="300px"></embed></td>
      </tr>
      <tr>
        <td>Ijazah</td>
        <td>:</td>
        <td><embed src="" type="application/pdf" sid="ijazah" width="300px" height="300px"></embed></td>
      </tr>
      <tr>
        <td>KTP Ortu</td>
        <td>:</td>
        <td><embed src="" type="application/pdf"  id="ktp_ortu" width="300px" height="300px"></embed></td>
      </tr>
      <tr>
        <td>Akte Kelahiran</td>
        <td>:</td>
        <td><embed src="" target="_blank" type="application/pdf"  id="akte" width="300px" height="300px"></embed></td>
      </tr>
    
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="jquery-1.4.2.js"></script>

<script>
$(document).ready(function(){
  $(document).on('click', '#set_dtl', function() {
  var no_pendaftaran = $(this).data('no_pendaftaran');
  var tgl_siswa = $(this).data('tgl_siswa');
  var nik = $(this).data('nik');
  var nis = $(this).data('nis');
  var nisn = $(this).data('nisn');
  var nama_lengkap = $(this).data('nama_lengkap');
  var alamat_siswa = $(this).data('alamat_siswa');
  var jk = $(this).data('jk');
  var tgl_lahir = $(this).data('tgl_lahir');
  var no_hp_siswa = $(this).data('no_hp_siswa');
  var kk = $(this).data('kk');
  var ijazah = $(this).data('ijazah');
  var akte = $(this).data('akte');
  var ktp_ortu = $(this).data('ktp_ortu');
  $('#no_pendaftaran').text(no_pendaftaran);
  $('#tgl_siswa').text(tgl_siswa);
  $('#nik').text(nik);
  $('#nis').text(nis);
  $('#nisn').text(nisn);
  $('#nama_lengkap').text(nama_lengkap);
  $('#alamat_siswa').text(alamat_siswa);
  $('#jk').text(jk);
  $('#tgl_lahir').text(tgl_lahir);
  $('#no_hp_siswa').text(no_hp_siswa);
  $('#kk').attr("src","upload/kk/"+kk);
  $('#ijazah').attr("src","upload/ijazah/"+ijazah);
  $('#akte').attr("src","upload/akte/"+akte);
  $('#ktp_ortu').attr("src","upload/ktp/"+ktp_ortu);
  
})
})
</script>

  

<script type="text/javascript">
  function thn()
  {
    var thn = $('[name="thn"]').val();
      window.location = "panel_admin/verifikasi/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script> 
