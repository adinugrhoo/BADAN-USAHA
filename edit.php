<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block">Aplikasi Kepesertaan - Badan Usaha</a>
				<a class="navbar-brand hidden-xs hidden-sm">Aplikasi Kepesertaan - Badan Usaha</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Data Badan Usaha</a></li>
					<li><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$nik = $_GET['nik'];
			$sql = mysqli_query($koneksi, "SELECT * FROM datbuadd WHERE kodebu='$kodebu'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$namabu		     = $_POST['namabu'];
				$kodebu		     = $_POST['kodebu'];
				$dip			 = $_POST['dip'];
				$diptambah		 = $_POST['diptambah'];
				$tgldip			 = $_POST['tgldip'];
				$tgltmt			 = $_POST['tgltmt'];
				$dipgagal		 = $_POST['dipgagal'];
				$jumlahkartu	 = $_POST['jumlahkartu'];
				$keterangandip	 = $_POST['keterangandip'];
				$namapicbu		 = $_POST['namapicbu'];
				$telppic		 = $_POST['telppic'];
				$namapetugas	 = $_POST['namapetugas'];
				$tglambil		 = $_POST['tglambil'];
				$namapegawai	 = $_POST['namapegawai'];
				$status			 = $_POST['status'];
				$keterangan	     = $_POST['keterangan'];
				
				$update = mysqli_query($koneksi, "UPDATE datbuadd SET dip='$dip', diptambah='$diptambah', tgldip='$tgldip', dipgagal='$dipgagal', jumlahkartu='$jumlahkartu', keterangandip='$keterangandip', namapicbu='$namapicbu', telppic='$telppic', namapetugas='$namapetugas', tglambil='$tglambil', namapegawai='$namapegawai', status='$status', keterangan='$keterangan' WHERE kodebu='$kodebu'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?kodebu=".$kodebu."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}
			?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-box">
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama BU</label>
								<div class="col-sm-6">
									<input type="text" name="namabu" value="<?php echo $row ['namabu']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode BU</label>
								<div class="col-sm-2">
									<input type="text" name="kodebu" value="<?php echo $row ['kodebu']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP</label>
								<div class="col-sm-3">
									<input type="number" name="dip" value="<?php echo $row ['dip']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP Keluarga</label>
								<div class="col-sm-3">
									<input type="number" name="diptambah" value="<?php echo $row ['diptambah']; ?>" class="form-control" placeholder="Tambahan" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal DIP</label>
								<div class="col-sm-4">
									<input type="text" name="tgldip" value="<?php echo $row ['tgldip']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">TMT</label>
								<div class="col-sm-4">
									<input type="text" name="tgltmt" value="<?php echo $row ['tgltmt']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP Gagal</label>
								<div class="col-sm-3">
									<input type="number" name="dipgagal" value="<?php echo $row ['dipgagal']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kartu Tercetak</label>
								<div class="col-sm-3">
									<input type="number" name="jumlahkartu" value="<?php echo $row ['jumlahkartu']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan DIP</label>
								<div class="col-sm-6">
									<textarea name="keterangandip" value="<?php echo $row ['keterangandip']; ?>" class="form-control" placeholder=""></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-box">
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama PIC BU</label>
								<div class="col-sm-6">
									<input type="text" name="namapicbu" value="<?php echo $row ['namapicbu']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								 <label class="col-sm-3 control-label">No Telp PIC</label>
									<div class="col-sm-6">
										<input type="text" name="telppic" value="<?php echo $row ['telppic']; ?>" class="form-control" placeholder="" required>
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Petugas</label>
								<div class="col-sm-6">
									<input type="text" name="namapetugas" value="<?php echo $row ['namapetugas']; ?>" class="form-control" placeholder="Mengentry Data" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Ambil</label>
								<div class="col-sm-4">
									<input type="text" name="tglambil" value="<?php echo $row ['tglambil']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Pegawai</label>
								<div class="col-sm-4">
									<input type="text" name="namapegawai" value="<?php echo $row ['namapegawai']; ?>" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-3">
									<select name="status" class="form-control">
										<option value=""> ----- </option>
			                            <option value="Diambil">Diambil</option>
										<option value="Diterima">Diterima</option>
										<option value="Dikerjakan">Dikerjakan</option>
									</select>
								</div>
								<div class="col-sm-3">
			                    	<b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
							    </div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-6">
									<textarea name="keterangan" value="<?php echo $row ['keterangan']; ?>" class="form-control" placeholder=""></textarea>
								</div>
							</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>