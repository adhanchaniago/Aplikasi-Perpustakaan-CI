
<!-- <div id="cari">
	<?php echo form_open('anggota/cari'); ?>
	<select name="select_cari">
		<option value="">Cari Berdasarkan</option>
		<option value="id_anggota">ID ANGGOTA</option>
		<option value="nm_anggota">NAMA ANGGOTA</option>
		<option value="alamat">ALAMAT</option>
		<option value="ttl_anggota">TANGGAL LAHIR</option>
		<option value="status">STATUS</option>
	</select>
	<input type="text" name="tcari">	
	<input type="submit" name="tombol" value="CARI">
	<?php echo form_close(); ?>
</div> -->
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
				<th>ALAMAT</th>
				<th>TANGGAL LAHIR</th>
				<th>STATUS</th>
				<th><?php echo anchor('anggota/add', ' <button class="btn btn-sm btn-primary"> <i class="fas fa-plus"></i> </button>'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($rows as $row):?>
			<tr>
				<td><?php echo $row->id_anggota; ?></td>
				<td><?php echo $row->nm_anggota; ?></td>
				<td><?php echo $row->alamat; ?></td>
				<td><?php echo $row->ttl_anggota; ?></td>
				<td><?php echo $row->status; ?></td>
				<td>
					<?php echo anchor('anggota/edit/'.$row->id_anggota,'<button class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> </button>'); ?>
					<?php echo anchor('anggota/delete/'.$row->id_anggota,'<button class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>',array('onclick'=>"return confirm('Yakin Hapus?')")); ?>
				</td>
			</tr>	
			
			<?php endforeach ?>
		</tbody>
		</table>
	</div>
</div>
</div>