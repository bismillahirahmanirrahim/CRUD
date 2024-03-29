<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_siswa = mysqli_query($koneksi, "select * from siswa where id_siswa='".$_GET['id_siswa']."'");
        $data_siswa = mysqli_fetch_array($query_siswa);
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah Siswa</h1>
            <div class="card-body">
                <form method="POST" action="proses_ubah_siswa.php">
                    <input type="hidden" name="id_siswa" value="<?=$data_siswa['id_siswa']?>">
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="<?=$data_siswa['nama_siswa']?>" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?=$data_siswa['tanggal_lahir']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <?php
                            $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
                        ?>
                        <select name="gender" class="form-select">
                            <option></option>
                            <?php foreach ($arr_gender as $key_gender => $val_gender):
                                if($key_gender==$data_siswa['gender']){
                                    $selek="selected";
                                } else {
                                    $selek="";
                                }?>
                                <option value="<?=$key_gender?>"<?=$selek?>><?=$val_gender?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" row="3" required><?=$data_siswa['alamat']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="id_kelas" class="form-select" required>
                            <option></option>
                            <?php
                                include "koneksi.php";
                                $query_kelas = mysqli_query($koneksi, "select * from kelas");
                                while($data_kelas = mysqli_fetch_array($query_kelas)){
                                    if($data_kelas['id_kelas']==$data_siswa['id_kelas']){
                                        $selek="selected";
                                    } else {
                                        $selek="";
                                    }
                                    echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.' >'.$data_kelas['nama_kelas'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                   </div>
                           <input type="text" class="form-control" name="username" value="<?=$data_siswa['nama_siswa']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="" required>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>