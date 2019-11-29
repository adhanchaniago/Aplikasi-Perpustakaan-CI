<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$pesan = $this->session->flashdata('pesan');
?>

<?php echo form_open('Login/daftar'); ?>

<table align="center">
	<tr>
 		<td colspan="2">
			<?php echo !empty($pesan)? '<p style="color:red;">'.$pesan.'</p>':'' ; ?>
		 </td>

	</tr>	
	
	<!-- <tr>
		<td>ID</td>
		<td><input type="text" name="txtId"></td>
	</tr> -->
	<tr>
		<td>NAMA</td>
		<td><input type="text" name="txtNama"></td>
	</tr>

	<tr>
		<td>USERNAME</td>
		<td><input type="text" name="txtUser"></td>
	</tr>
	<tr>
		<td>PASSWORD</td>
		<td><input type="text" name="txtPass"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="SUBMIT" name="tombol" value="DAFTAR"></td>
	</tr>

</table>
<?php echo form_close(); ?>

</body>
</html>