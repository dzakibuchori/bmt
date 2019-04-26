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
        <a href="<?php echo base_url('Nasabah/update'); ?>">
			<button class="btn btn-warning update-dataNasabah" data-id="<?php echo $nasabah->nasabah_id; ?>">
			<i class="glyphicon glyphicon-repeat"></i> Update
			</button>
		</a>
        <a href="<?php echo base_url('Nasabah/deleteAnggota'); ?>">
			<button class="btn btn-danger konfirmasiHapus-nasabah" data-id="<?php echo $nasabah->nasabah_id; ?>">
			<i class="glyphicon glyphicon-remove-sign"></i> Delete
			</button>
		</a>
      </td>
    </tr>
    <?php
  }
?>

