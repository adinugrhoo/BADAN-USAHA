<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[jquery]-->
	<link href="js/jquery-ui.min.css" rel="stylesheet">
	<script type="js/jquery.min.js"></script>
	<script type="js/typehead.min.js"></script>
	<title>Aplikasi Badan Usaha</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="selectize/css/selectize.bootstrap3.css" rel="stylesheet">

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
					<li class="active"><a href="add.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="content">

			<h2>Data Badan Usaha &raquo; Tambah Data</h2>
			<hr>
			
			<?php
			if(isset($_POST['add'])){
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

				$insert = mysqli_query($koneksi, "INSERT INTO datbuadd(namabu, kodebu, dip, diptambah, tgldip, tgltmt, dipgagal, jumlahkartu, keterangandip, namapicbu, telppic, namapetugas, tglambil, namapegawai, status, keterangan)
													VALUES('$namabu','$kodebu', '$dip', '$diptambah', '$tgldip', '$tgltmt', '$dipgagal', '$jumlahkartu', '$keterangandip', '$namapicbu', '$telppic', '$namapetugas', '$tglambil','$namapegawai','$status','$keterangan')") or die(mysqli_error());
				if($insert){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan !</div>';
				}
				}
			?>

			<div class="row">

				<div class="col-sm-6">
					<div class="form-box">
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label for="nmbu" class="col-sm-3 control-label">Nama BU</label>
								<div class="col-sm-6">
									<select for="nmbu" id="cari_nmbu" type="text" autocomplete="off" name="namabu" class="form-control typeahead" placeholder="" required data-provide="typeahead"></select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode BU</label>
								<div class="col-sm-3">
									<input type="text" id="kode" name="kodebu" class="form-control" placeholder="" required readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP</label>
								<div class="col-sm-3">
									<input type="number" name="dip" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP Keluarga</label>
								<div class="col-sm-3">
									<input type="number" name="diptambah" class="form-control" placeholder="Tambahan" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal DIP</label>
								<div class="col-sm-4">
									<input type="text" name="tgldip" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">TMT</label>
								<div class="col-sm-4">
									<input type="text" name="tgltmt" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">DIP Gagal</label>
								<div class="col-sm-3">
									<input type="number" name="dipgagal" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kartu Tercetak</label>
								<div class="col-sm-3">
									<input type="number" name="jumlahkartu" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan DIP</label>
								<div class="col-sm-6">
									<textarea name="keterangandip" class="form-control" placeholder=""></textarea>
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
									<input type="text" name="namapicbu" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								 <label class="col-sm-3 control-label">No Telp PIC</label>
									<div class="col-sm-6">
										<input type="text" name="telppic" class="form-control" placeholder="" required>
									</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Petugas</label>
								<div class="col-sm-6">
									<input type="text" name="namapetugas" class="form-control" placeholder="Mengentry Data" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Ambil</label>
								<div class="col-sm-4">
									<input type="text" name="tglambil" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="tahun-bulan-tanggal" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Pegawai</label>
								<div class="col-sm-4">
									<input type="text" name="namapegawai" class="form-control" placeholder="" required>
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
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-6">
									<textarea name="keterangan" class="form-control" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
								<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>	
		</div>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="selectize/js/standalone/selectize.min.js"></script>
	<script>
		$('#cari_nmbu').selectize({
        valueField: 'KdPKS',
        labelField: 'NmBU',
        searchField: 'NmBU',
        render: {
            option: function(item, escape) {
                return '<div style="border-bottom: inset 1px #a5c3df">' +
                        '<span class="title">' +
                            '<span class="name"><i class="fa fa-user"></i>  Kode : ' + escape(item.KdPKS) + '</span>' +
                        '</span><br>' +
                        '<span class="description"><i class="fa fa-envelope"></i>Nmbu : ' + escape(item.NmBU) + '</span>' +
                        '</div>';
			}
        },

        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: 'carinmbu.php',
                type: 'GET',
                data : {
                	cari : query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
	        }
	    });
	</script>

	<script>
		$('.date').datepicker({
			format: 'yyyy-mm-dd',
		})

		$( "#cari_nmbu" ).change(function() {
  			// alert( "Handler for .change() called." );
  			$('#kode').val($( "#cari_nmbu" ).val())
		});
	</script>
</body>
</html>