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

	<div class="card-body">
	  <div class="table-responsive width="100%" cellspacing="0"">
	    <table class="table"  id="dataTable" >
		<thead>
		<tr id="head">
			<th>KODE BUKU</th>
			<th>JUDUL BUKU</th>
			<th>JUMLAH BUKU</th>
			<th>OPSI</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $row) :?>
				<tr>
					<td><?php echo $row->id_buku; ?></td>
					<td><?php echo $row->judul; ?></td>
					<td><?php echo $row->jumlah_buku; ?></td>
					<td><?php echo anchor('transaksi/detail/'.$row->id_buku, '<button class="btn btn-sm btn-primary"> <i class="fas fa-search"></i> Detail </button>'); ?></td>
				</tr>
			<?php endforeach ?>	
		</tbody>
		</table>
	</div>
</div>
</div>