<div id="dataform">
	<table border="0" width="500">
		<tr>
			<td>KODE TRANSAKSI</td>
			<td><?php echo $rows->id_pinjam;?></td>
			<input type="hidden" name="thide" value="<?php echo $rows->id_pinjam;?>">
		</tr>
		<tr>
			<td>NAMA</td>
			<td><?php echo $rows->nm_anggota?></td>
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
	</table>
</div>
