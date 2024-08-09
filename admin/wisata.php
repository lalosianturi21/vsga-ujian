<h2 class="mt-3">Data Wisata</h2>
<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success fade show" role="alert">
    <strong>Berhasil !</strong> <?= $_SESSION['success']; ?>.
</div>
<?php endif;
unset($_SESSION['success']); ?>
<?php if (isset($_SESSION['error'])) : ?>
<div class="alert alert-danger fade show" role="alert">
    <strong>Error !</strong> <?= $_SESSION['error']; ?>.
</div>
<?php endif;
unset($_SESSION['error']); ?>
<a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModal"><i
        data-feather="plus"></i> Tambah</a>
<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5">No</th>
                <th scope="col" width="100">Cover</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Alamat Tempat</th>
                <th scope="col">Link YT</th>
                <th scope="col">No WA</th>
                <th scope="col">Harga</th>
                <th scope="col" width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM wisata ORDER BY idwisata DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td>
                    <img src="uploads/wisata/cover/<?= $row['cover']; ?>" alt="Cover" class="img-thumbnail rounded"
                        width="100">
                </td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['linkyt']; ?></td>
                <td><?= $row['no_wa']; ?></td>
                <td><?= money($row['harga']); ?></td>
                <td>
                <button class="btn btn-sm btn-info text-white" onclick="lihatData(<?= $row['idwisata'] ?>)">
                        <i data-feather="edit"></i>
                        Lihat
                    </button>
                    <button class="btn btn-sm btn-warning text-white" onclick="editData(<?= $row['idwisata'] ?>)">
                        <i data-feather="edit"></i>
                        Edit
                    </button>
                    <button class="btn btn-sm btn-danger text-white" onclick="deleteData(<?= $row['idwisata'] ?>)">
                        <i data-feather="trash"></i>
                        Hapus
                    </button>
                </td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div>
<!-- Add Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/wisata.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="nama" class="form-label">Nama Tempat</label>
                            <input type="text" class="form-control text-capitalize" id="nama" name="nama"
                                placeholder="Gunung Botak" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="alamat" class="form-label">Alamat Tempat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="linkyt" class="form-label">Link YT</label>
                            <input type="text" class="form-control text-capitalize" id="linkyt" name="linkyt"
                            placeholder="Masukkan Link YT" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="no_wa" class="form-label">No WA</label>
                            <input type="text" class="form-control text-capitalize" id="no_wa" name="no_wa"
                            placeholder="Masukkan No WA" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="harga">Harga Tiket</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control uang" name="harga" required>
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="cover" class="form-label">Foto Cover</label>
                            <input class="form-control" type="file" id="cover" name="cover" required>
                            <small class="text-danger">Ukuran maksimal <strong>2 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan"><i data-feather="save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/wisata.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Data Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="oldImage">
                        <div class="col-md-12 mb-2">
                            <label for="nama" class="form-label">Nama Tempat</label>
                            <input type="text" class="form-control text-capitalize" id="nama" name="nama"
                                placeholder="Gunung Botak" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="alamat" class="form-label">Alamat Tempat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="linkyt" class="form-label">Link YT</label>
                            <input type="text" class="form-control text-capitalize" id="linkyt" name="linkyt"
                                placeholder="Masukkan Link youtube" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="no_wa" class="form-label">No WA</label>
                            <input type="text" class="form-control text-capitalize" id="no_wa" name="no_wa"
                                placeholder="Masukkan No WA" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="harga">Harga Tiket</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control uang" name="harga" required>
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="cover" class="form-label">Foto Cover (optional)</label>
                            <input class="form-control" type="file" id="cover" name="cover">
                            <small class="text-danger">Ukuran maksimal <strong>2 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="update-wisata"><i data-feather="save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Lihat Detail Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-md-12 mb-2">
                            <label for="nama" class="form-label">Nama Wisata</label>
                            <p class="text-capitalize" id="nama"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="alamat" class="form-label">Alamat Wisata</label>
                            <p class="text-capitalize" id="alamat"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="harga" class="form-label">Harga Wisata</label>
                            <p class="text-capitalize" id="harga"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="no_wa" class="form-label">No WA</label>
                            <p class="text-capitalize" id="no_wa"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="cover" class="form-label">Cover</label>
                            <br>
                            <img id="cover" src="" alt="Cover Wisata" class="img-fluid">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="ytFrame" class="form-label">Video YouTube</label>
                            <iframe id="ytFrame" width="100%" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>process/wisata.php" method="post">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="ModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini ?</p>
                    <input type="hidden" name="id">
                    <input type="hidden" name="oldImage">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-danger" name="delete-wisata"><i data-feather="trash"></i> Iya
                        Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteData(x) {
    $('#deleteModal').modal('show');
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?= base_url(); ?>process/view_wisata.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idwisata);
            $('[name="oldImage"]').val(data.cover);
        }
    });
}

function editData(id) {
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_wisata.php',
        dataType: 'json',
        success: function(data) {
            if (!data.error) {
                $('#editModal').find('[name="id"]').val(data.idwisata);
                $('#editModal').find('[name="nama"]').val(data.nama);
                $('#editModal').find('[name="alamat"]').val(data.alamat);
                $('#editModal').find('[name="linkyt"]').val(data.linkyt);
                $('#editModal').find('[name="no_wa"]').val(data.no_wa);
                $('#editModal').find('[name="harga"]').val(data.harga);
                $('#editModal').find('[name="oldImage"]').val(data.cover);
                $('#editModal').modal('show');
            } else {
                alert(data.error);
            }
        }
    });
}


function lihatData(id) {
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_wisata.php',
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#viewModal').find('#nama').text(data.nama);
                $('#viewModal').find('#alamat').text(data.alamat);
                $('#viewModal').find('#harga').text(data.harga);
                $('#viewModal').find('#no_wa').text(data.no_wa);

                // Menambahkan jalur 'uploads/wisata/cover/' ke src gambar
                var coverPath = 'uploads/wisata/cover/' + data.cover;
                $('#viewModal').find('#cover').attr('src', coverPath); // Menetapkan atribut src dengan jalur lengkap

                // Mengubah link YouTube menjadi embed dalam iframe
                var ytEmbedUrl = data.linkyt.replace("watch?v=", "embed/");
                $('#viewModal').find('#ytFrame').attr('src', ytEmbedUrl); // Menetapkan src iframe dengan URL embed

                $('#viewModal').modal('show'); // Menampilkan modal setelah data ditetapkan
            } else {
                alert("Data tidak ditemukan atau terjadi kesalahan.");
            }
        },
        error: function() {
            alert("Terjadi kesalahan saat mengambil data.");
        }
    });
}




</script>