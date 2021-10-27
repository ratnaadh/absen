<html>
<head>
    <title> SMK NEGERI 4 KOTA BOGOR </title>
    <link rel="shortcut icon" href="../img/logoSMKN4.png"/>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
</head>
<body>
<div class="container">
    <div class="panel panel-info" style="margin-top: 100px">
        <div class="panel-heading">
            <table border="0" width="100%" style="text-align:center">
                <tr>
                    <td><img src="../img/logoSMKN4.png" height="200" width="200"> </img></td>
                    <td><h1> SMK NEGERI 4 KOTA BOGOR </h1><br>
                        Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Selatan <br>
                        Telepon: (0251) 7547381 Website http://www.smkn4bogor.sch.id/ <br>
                        email : smkn4@smkn4bogor.sch.id <br>
                        Kota Bogor, Jawa Barat 16137
                    </td>
                    <td><img src="../img/Logo3.PNG" height="200" width="200"> </img></td>
                </tr>
            </table>
        </div>
        <div class="panel-body">
            <form method="POST" action="ProsesKehadiran.php" class="form-horizontal">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"> </i>
						</span>
                    <input type="text" name="username" placeholder="Masukan Username Siswa"
                           class="form-control input-lg text-center" required>
                </div>
        </div>
        <div class="panel-Footer">
            <div class="row">
                <div class="col-md-6">
                    <a href="../index.php" class="btn btn-success btn-lg btn-block">
                        <span class="glyphicon glyphicon-home"> </span> Kembali
                    </a>
                </div>
                <div class="col-md-6">
                    <button type="Submit" name="Hadir" value="Masuk" class="btn btn-primary btn-lg btn-block">
                        <span class="glyphicon glyphicon-info-sign"> </span> Absen
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
