<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?> - Siakad Sekolah</title>
	<script src="<?php echo basis_url('assets/js/jquery-3.5.1.js'); ?>"></script>
	<script src="<?php echo basis_url('assets/js/materialize.min.js'); ?>"></script>
	<script src="<?php echo basis_url('assets/js/sweetalert.min.js'); ?>"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="<?php echo basis_url('assets/css/materialize.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo basis_url('assets/css/materialert.css'); ?>">
	<style type="text/css">
		body {
			font-family: 'Ubuntu', sans-serif;
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
		}
		
		.input-field input:focus + label {
			color: #536dfe !important;
		}
	
		.input-field input:focus {
			border-bottom: 1px solid #536dfe !important;
			box-shadow: 0 1px 0 0 #536dfe !important;
		}

		.input-field .prefix.active {
			color: #536dfe;
		}
	</style>
</head>
<body>
	<main>