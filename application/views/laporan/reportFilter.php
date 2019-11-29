


<table border="0" width="900">
<caption><?php echo !empty($title) ? '<h3>'.$title.'</h3>':''; ?></caption>
<thead id="tjudul">
	<tr id="head">
		<th>KODE TRANSAKSI</th>
		<th>NAMA</th>
		<th>JUDUL BUKU</th>
		<th>TANGGAL PINJAM</th>
		<th>TANGGAL PULANG</th>
		<th>STATUS</th>
	</tr>
</thead>
<tbody id="tbody">
		<?php foreach ($rows as $row) : ?>
		<tr>
			<td><?php echo $row->id_pinjam ?></td>
			<td><?php echo $row->nm_anggota ?></td>
			<td><?php echo $row->judul ?></td>
			<td><?php echo $row->tgl_pinjam ?></td>
			<td><?php echo $row->tgl_kembali ?></td>
			<td><?php echo $row->kembali ?></td>
		</tr>
	<?php endforeach ?>
</tbody>		
</table>
