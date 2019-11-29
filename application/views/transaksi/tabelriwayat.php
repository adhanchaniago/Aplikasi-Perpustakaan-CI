<div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary"><?php echo !empty($title) ? '<h2 class="m-0 font-weight-bold text-primary" align="center">'.$title.'</h2>':''; ?></h6>
	</div>
	<?php $message = $this->session->flashdata('pesan'); ?>
	<?php echo !empty($message) ? '<p style="background-color:#E6E6FA">'.$message.'</p>':''; ?>
		
	<div class="card-body">
	  <div class="table-responsive col-sm-4">
	    <table class="table" width="50px">
		<thead>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><?php echo "<b>".$bio->id_anggota."</b>"; ?></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td><?php echo "<b>".$bio->nm_anggota."</b>"; ?></td>
			</tr>
		</thead>
		</table>
	  </div>
	</div>
	<caption><?php echo !empty($pesan) ? '<p style="color:green" align="center">'.$pesan.'</p>':'';?></caption>

<div class="card-body">
	  <div class="table-responsive  width="100%" cellspacing="0"">
	    <table class="table" id="dataTable" >
		<thead>
		<tr>
			<th>KODE PEMINJAMAN</th>
			<th>JUDUL BUKU</th>
			<th>TANGGAL PINJAM</th>
			<th>TANGGAL PENGEMBALIAN</th>
			<th>JUMLAH PINJAM</th>
			<th>STATUS</th>
			<th><?php echo anchor('transaksi/pinjam/'.$bio->id_anggota, '<button class="btn btn-sm btn-primary"> <i class="fas fa-book"></i> Pinjam </button>'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($hasil as $row) :?>
			<tr>
				<td><?php echo $row->id_pinjam; ?></td>
				<td><?php echo $row->judul; ?></td>
				<td><?php echo $row->tgl_pinjam; ?></td>
				<td><?php echo $row->tgl_kembali; ?></td>
				<td><?php echo $row->jumlah_pinjam; ?></td>
				<td><?php echo $row->kembali; ?></td>
				<td><?php echo anchor('transaksi/pulang/'.$row->id_pinjam, '<button class="btn btn-sm btn-success"> <i class="fas fa-book"></i> Pulang </button>'); ?></td>
			</tr>
		<?php endforeach ?>	

	</tbody>

</table>
</div>
</div>
</div>
