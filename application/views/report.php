<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
<div id="container">
	<div id="header">
		<?php $this->load->view('report/kop'); ?>
	</div>

	<div id="body">
		<?php $this->load->view($main_report); ?>
	</div>

	<p class="footer">
		<?php $this->load->view('report/sign'); ?>
	</p>
</div>
</body>
</html>