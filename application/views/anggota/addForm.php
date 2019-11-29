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
          <label for="" class="col-sm-2 col-form-label">ID ANGGOTA</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tId" value="<?php echo $id_anggota; ?>"><?php echo form_error('tId'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">NAMA ANGGOTA</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tNama" value="<?php echo set_value('tNama') ?>"><?php echo form_error('tNama'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">ALAMAT</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tAlamat" value="<?php echo set_value('tAlamat') ?>"><?php echo form_error('tAlamat'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">TTL ANGGOTA</label>
          <div class="col-sm-2">
            <input type="date" class="form-control" name="tTtl" value="<?php echo set_value('tTtl') ?>"><?php echo form_error('tTtl'); ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">STATUS</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="tStatus" value="<?php echo set_value('tStatus') ?>"><?php echo form_error('tStatus'); ?>
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
