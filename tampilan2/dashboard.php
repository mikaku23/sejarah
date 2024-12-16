<style>
    /* Gaya untuk gambar */
    img {
        transition: all 0.3s ease-in-out;
        filter: grayscale(100%) ; /* Gambar awal dalam kondisi hitam putih dan blur */
    }

    /* Efek saat kursor diarahkan ke gambar */
    img:hover {
        transform: translateY(-5px) scale(1.0); /* Membesar saat hover */
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3); /* Efek bayangan */
        border-radius: 5%;
        filter: grayscale(0%); /* Menghapus efek grayscale dan blur saat hover */
    }
</style>
<!-- Default box -->
<div class="card-body">

    <div class="row pt-3">
        <div class="col">
            <!-- Tabel Data -->
            <table id="example1" class="table table-bordered table-striped">
                <!-- Dropdown Filter Kategori -->
                <div class="col-md-8">
                    <form method="GET" action="">
                        <div class="input-group">
                            <select name="kategori" class="form-select" style="max-width: 250px;">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="">Semua Kategori</option>
                                <?php
                    include "koneksi.php";
                    // Ambil data kategori dari tabel kategori
                    $query_kategori = "SELECT * FROM kategori";
                    $hasil_kategori = mysqli_query($koneksi, $query_kategori);
                    while ($kategori = mysqli_fetch_assoc($hasil_kategori)) {
                        // Jika kategori dipilih, tetap pilih di dropdown
                        $selected = isset($_GET['kategori']) && $_GET['kategori'] == $kategori['idkategori'] ? 'selected' : '';
                        echo "<option value='".$kategori['idkategori']."' $selected>".$kategori['nama']."</option>";
                    }
                ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </div>
                    </form>
                </div>

                <thead>
                    <?php
                // Filter kategori (jika ada)
                $filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

                // Query untuk menampilkan data
                if (!empty($filter_kategori)) {
                    $query = "SELECT iddata, nama, gambar, data FROM data WHERE idkategori = '$filter_kategori' ORDER BY iddata";
                } else {
                    $query = "SELECT iddata, nama, gambar, data FROM data ORDER BY iddata";
                }

                $hasil = mysqli_query($koneksi, $query);
            ?>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Data</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($hasil)) {
                              // Konversi data blob menjadi string base64
            $gambar = base64_encode($data['gambar']); 
            
            // Tentukan tipe gambar (misalnya JPEG, PNG, dll.)
            $tipe_gambar = 'image/JPG'; // Sesuaikan dengan tipe data gambar Anda
            
            // Tampilkan data dalam tabel
                            echo "<tr>
                                    <td>$no</td>
                                    <td>".$data['nama']."</td>
                                    
                                  <td>
    <a href='user.php?title=view&page=detail&iddata=$data[iddata]'>
        <img src='data:$tipe_gambar;base64,$gambar' 
             alt='Klik untuk melihat Data' 
             style='width:100px; height:auto; cursor: pointer;'>
    </a>
</td>


                                </tr>";
                            $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>