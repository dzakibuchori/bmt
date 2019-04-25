<?php
  foreach ($dataNasabah as $nasabah) {
    ?>
    <tr>
      <td style="min-width:100px;"><?php echo $nasabah->nasabah_id; ?></td>
      <td ><?php echo $nasabah->nama_nasabah; ?></td>
      <td><?php echo $nasabah->kode_group1; ?></td>
      <td><?php echo $nasabah->kode_group2; ?></td>
      <td><?php echo $nasabah->kode_group3; ?></td>
      <td><?php echo $nasabah->kode_kantor; ?></td>
      <td class="text-center" style="min-width:180px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $nasabah->nasabah_id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $nasabah->nasabah_id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>

