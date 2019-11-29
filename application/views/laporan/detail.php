<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-12">
    <!-- Approach -->
    <div class="card shadow mb-12">
      <div class="card-header py-11">
        <h2 class="m-0 font-weight-bold text-primary" align="center"><?php echo !empty($pesan) ? '<h2 class="m-0 font-weight-bold text-primary">'.$pesan.'</h2>':''; ?></h2>
        <h2 class="m-0 font-weight-bold text-primary" align="center"><?php echo !empty($title) ? '<h2 class="m-0 font-weight-bold text-primary">'.$title.'</h2>':''; ?></h2>
      </div>
      <div class="card-body">

 <?php echo form_open('laporan/detailpdf'); ?>
	<table border="0" width="500">
		<tr>
			<td>KODE TRANSAKSI</td>
			<td><?php echo $rows->id_pinjam;?></td>
			<input type="hidden" name="thide" value="<?php echo $rows->id_pinjam;?>">
		</tr>
		<tr>
			<td>NAMA</td>
			<td><?php echo $rows->nm_anggota ?></td>
		</tr>
		<tr>
			<td>JUDUL BUKU</td>
			<td><?php echo $rows->judul ;?></td>
		</tr>
		<tr>
			<td>TANGGAL PINJAM</td>
			<td><?php echo $rows->tgl_pinjam;?></td>
		</tr>
		<tr>
			<td>TANGGAL PULANG</td>
			<td><?php echo $rows->tgl_kembali;?></td>
		</tr>
		<tr>
			<td>STATUS</td>
			<td><?php echo $rows->kembali;?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="tombol" value="KONVERT KE PDF"></td>
		</tr>
		
	</table>
<?php echo form_close() ;?>
</div>
</div>
</div>
</div>
