<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-12">
    <!-- Approach -->
    <div class="card shadow mb-12">
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
	<form name="form1" method="POST" enctype="multipart/form-data">	
		    
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">KODE TRANSAKSI</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" name="tkode" value="<?php echo $data->id_pinjam; ?>" readonly><?php echo $data->id_pinjam; ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">ID BUKU</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" name="tkdbuku" value="<?php echo $bukuid->id_buku; ?>" readonly><?php echo form_error('tkdbuku') ?><?php echo $data->id_buku; ?>
          </div>
        </div>
  

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">JUDUL BUKU</label>
          <div class="col-sm-10">
            <?php echo $bukuid->judul; ?>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">TANGGAL PINJAM</label>
          <div class="col-sm-4">
            <?php echo $data->tgl_pinjam; ?>  
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">TANGGAL PULANG</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" name="tglpu"><?php echo form_error('tglpu') ?>  
          </div>
        </div>

        

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">STATUS</label>
          <div class="col-sm-4">
            <?php echo $data->kembali; ?>  
          </div>
        </div>
        

        <div class="form-group row">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-primary btn-block" name="tombol" value="SIMPAN"><i class="fa fa-save"> SIMPAN</i></button>
            <button type="reset" class="btn btn-warning btn-block" name="reset" value="RESET"><i class="fa fa-refresh"> RESET</i></button>
          </div>
        </div>
	</form>
</div>
</div>
</div>
</div>
</div>