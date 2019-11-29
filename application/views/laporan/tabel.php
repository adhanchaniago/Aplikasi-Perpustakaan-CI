<div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary"><?php echo !empty($title) ? '<h2 class="m-0 font-weight-bold text-primary" align="center">'.$title.'</h2>':''; ?></h6>
	</div>
	<?php $message = $this->session->flashdata('pesan'); ?>
	<?php echo !empty($message) ? '<p style="background-color:#E6E6FA">'.$message.'</p>':''; ?>

<div class="card-body">
<div id="cari" align="right">
<h3>Cari Berdasarkan Tanggal</h3>
<?php echo form_open('laporan/filter');?>	
<input type="date" name="tgl1"> s/d <input type="date" name="tgl2">
<input type="submit" name="tombol" value="CARI">
<?php echo form_close(); ?>
</div>
</div>

	<div class="card-body">
	  <div class="table-responsive">
	    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>KODE TRANSAKSI</th>
					<th>NAMA</th>
					<th>JUDUL BUKU</th>
					<th>TANGGAL PINJAM</th>
					<th>TANGGAL PULANG</th>
					<th>STATUS</th>
					<!-- <th><?php echo anchor('laporan/viewAll','DOWNLOAD ALL DATA to PDF')?></th> -->
					<th><?php echo $link ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rows as $row) : ?>
				<tr>
					<td><?php echo $row->id_pinjam ?></td>
					<td><?php echo $row->nm_anggota ?></td>
					<td><?php echo $row->judul ?></td>
					<td><?php echo $row->tgl_pinjam ?></td>
					<td><?php echo $row->tgl_kembali ?></td>
					<td><?php echo $row->kembali ?></td>
					<td>
						<?php echo anchor('laporan/detail/'.$row->id_pinjam,'Detail')?>	
					</td>
				</tr>

				<?php endforeach ?>
			</tbody>		
		</table>
	</div>
</div>
</div>
