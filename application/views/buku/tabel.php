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
				<th>ID BUKU</th>
				<th>JUDUL BUKU</th>
				<th>PENGARANG</th>
				<th>PENERBIT</th>
				<th>JUMLAH BUKU</th>
				<th><?php echo anchor('buku/add', ' <button class="btn btn-sm btn-primary"> <i class="fas fa-plus"></i> </button>'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($rows as $row):?>
			<tr>
				<td><?php echo $row->id_buku; ?></td>
				<td><?php echo $row->judul; ?></td>
				<td><?php echo $row->pengarang; ?></td>
				<td><?php echo $row->penerbit; ?></td>
				<td><?php echo $row->jumlah_buku; ?></td>
				<td>
					<?php echo anchor('buku/edit/'.$row->id_buku,'<button class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> </button>'); ?>
					<?php echo anchor('buku/delete/'.$row->id_buku,'<button class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>',array('onclick'=>"return confirm('Yakin Hapus?')")); ?>
				</td>
			</tr>	
			
			<?php endforeach ?>
		</tbody>
		</table>
	</div>
</div>
</div>
