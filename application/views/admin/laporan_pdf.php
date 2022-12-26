
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
    <link rel="icon" type="image/png" href="assets/images/logo.png"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
    </style>
  </head>
  <body onload="window.print();"">

    <table width="100%" border="1">
      <tr>
        <th rowspan="3">No.</th>
        <th rowspan="2" colspan="10">BIODATA SISWA</th>
        <th colspan="6">DATA ORANG TUA</th>
       
      </tr>
      <tr>
        <th colspan="2">Data Ayah</th>
        <th colspan="2">Data Ibu</th>
        <th colspan="2">Data Wali</th>
<!--
        <th rowspan="3">Pendidikan Agama</th>
        <th rowspan="3">PKN</th>
        <th rowspan="3">Bahasa Indonesia</th>
        <th rowspan="3">Bahasa Inggris</th>
        <th rowspan="3">Matematika</th>
        <th rowspan="3">IPA</th>
        <th rowspan="3">IPS</th>
        <th rowspan="3">JUMLAH NILAI USBN</th>
        <th rowspan="3">RATA - RATA NILAI USBN</th>

        <th rowspan="3">Ilmu Pengetahuan Alam (IPA)</th>
        <th rowspan="3">Matematika</th>
        <th rowspan="3">Bahasa Indonesia</th>
        <th rowspan="3">Bahasa Inggris</th>
        <th rowspan="3">JUMLAH NILAI UNBK</th>
        <th rowspan="3">RATA - RATA NILAI UNBK</th>

-->

     
      <tr>
        <th>NO. PENDAFTARAN</th>
        <th>NIS</th>
        <th>NISN</th>
        <th>NIK</th>
        <th>NAMA LENGKAP</th>
        <th>JENIS KELAMIN</th>
        <th>TEMPAT, TANGGAL LAHIR</th>
        <th>STATUS DALAM KELUARGA</th>
        <th>ALAMAT SISWA</th>
        <th>NO. HANDPHONE</th>
        

        <th>Nama</th>
        <th>No. HP</th>

        <th>Nama</th>
        <th>No. HP</th>

        <th>Nama</th>
        <th>No. HP</th>

      </tr>
      <?php $no=1;
      error_reporting(0);
      foreach ($v_siswa->result() as $baris):
        
      ?>
        <tr>
          <th><?php echo $no++; ?></th>
          <td><?php echo $baris->no_pendaftaran; ?></td>
          <td><?php echo $baris->nis; ?></td>
          <td><?php echo $baris->nisn; ?></td>
          <td><?php echo $baris->nik; ?></td>
          <td><?php echo ucwords($baris->nama_lengkap); ?></td>
          <td><?php echo $baris->jk; ?></td>
          <td><?php echo "$baris->tempat_lahir, ".$this->Model_data->tgl_id($baris->tgl_lahir); ?></td>
         
          <td><?php echo $baris->status_keluarga; ?></td>
          <td><?php echo $baris->alamat_siswa; ?></td>
          <td><?php echo $baris->no_hp_siswa; ?></td>
          <td><?php echo $baris->nama_ayah; ?></td>
          <td><?php echo $baris->no_hp_ayah; ?></td>
          <td><?php echo $baris->nama_ibu; ?></td>
          <td><?php echo $baris->no_hp_ibu; ?></td>
          <td><?php echo $baris->nama_wali; ?></td>
          <td><?php echo $baris->no_hp_wali; ?></td>

         
        </tr>
        <tr>
         
       
      <?php
      endforeach; ?>
    </table>

  </body>
</html>
