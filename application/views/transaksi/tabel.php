<div class="card shadow mb-4">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary"><?php echo !empty($title) ? '<h2 class="m-0 font-weight-bold text-primary" align="center">'.$title.'</h2>':''; ?></h6>
	</div>
	<?php $message = $this->session->flashdata('pesan'); ?>
	<?php echo !empty($message) ? '<p style="background-color:#E6E6FA">'.$message.'</p>':''; ?>
		
	<div class="card-body">
	  <div class="table-responsive">
	    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th>ID ANGGOTA</th>
			<th>NAMA ANGGOTA</th>
			<th>RIWAYAT PEMINJAMAN</th>
			
		</tr>
		</thead>
		<tbody>
		<?php foreach ($rows as $row):?>
			
			<tr>
				<td align="CENTER"><?php echo $row->id_anggota; ?></td>
				<td align="CENTER"><?php echo $row->nm_anggota; ?></td>
				<td align="CENTER">
					<?php echo anchor('transaksi/riwayat/'.$row->id_anggota,'<button class="btn btn-sm btn-primary"> <i class="fas fa-search"></i> </button>'); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>
</div>
