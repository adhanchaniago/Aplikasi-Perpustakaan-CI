<!--
SYAHRUL
XII RPL 1
12 - Januari - 2019
-->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-12">
    <!-- Approach -->
    <div class="card shadow mb-12">
      <div class="card-header py-11">
        <h2 class="m-0 font-weight-bold text-primary" align="center"><?php echo !empty($title) ? '<h2 class="m-0 font-weight-bold text-primary">'.$title.'</h2>':''; ?></h2>
      </div>
      <div class="card-body">

	<form name="form1" method="POST" enctype="multipart/form-data">	
		<div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">ID BUKU</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tId" value="<?php echo $row->id_buku; ?>"><?php echo form_error('tId'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">JUDUL BUKU</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tJudul" value="<?php echo $row->judul; ?>"><?php echo form_error('tJudul'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">PENGARANG</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tPengarang" value="<?php echo $row->pengarang; ?>"><?php echo form_error('tPengarang'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">PENERBIT</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tPenerbit" value="<?php echo $row->penerbit; ?>"><?php echo form_error('tPenerbit'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">STOK BUKU</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tJumlah" value="<?php echo $row->jumlah_buku; ?>"><?php echo form_error('tJumlah'); ?>
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

