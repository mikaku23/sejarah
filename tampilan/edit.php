<?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query = "SELECT * FROM data WHERE iddata='$id'";
        $find_one = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($find_one);
        ?>
      <!-- Default box -->

      <div class="card card-warning">
          <div class="card-header">
              <h3 class="card-title">Ubah Data <?=$data['nama'] ?></h3>
              </div>
          </div>
          <div class="card-body">

           <form action="db/db.data.php?proses=edit" method="post">
          <div class="form-group">
            <input type="hidden" value="<?=$data['iddata'] ?>" id="iddata" name="iddata">
                  <label for="iddata">Id</label>
                  <input type="text" class="form-control" name="id" value="<?= $data['iddata'] ?>" disabled>
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" >
              </div>
              <div class="form-group">
                  <label for="data">Data</label>
                  <input type="text" class="form-control" id="data" name="data" value="<?= $data['data'] ?>" >
              </div>
                <div class="form-group">
                    <label for="idkategori">Kategori</label>
                    <select class="form-control" id="idkategori" name="idkategori" required>
                        <option value="" disabled selected><?= $data['idkategori'] ?></option>
                        <?php
                        include "koneksi.php";
                        // Query untuk mengambil id dan nama barang
                        $query = mysqli_query($koneksi, "SELECT idkategori, nama FROM kategori ");
                        while ($data = mysqli_fetch_assoc($query)) {
                            // Gabungkan id dan nama dalam satu value
                            echo "<option value='" . $data['idkategori'] . "-" . $data['nama'] . "'>" . $data['idkategori'] . "-" . $data['nama'] . "</option>";
                        }
                        ?>
                    </select>
                    </div>
                
          <!-- /.card-body -->
          <div class="card-footer text-right">
            <a href='index.php?page=dashboard&title=dashboard'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
              <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Ubah</button>
          </div>
          </form>
      </div>
       <script>
        function toggleInputField(select) {
            const inputField = document.getElementById('spesifik_lain_field');
            if (select.value === 'lain') {
                inputField.style.display = 'block';
            } else {
                inputField.style.display = 'none';
            }
        }
    </script>
      <!-- /.card -->