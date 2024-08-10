<h2 class="mt-3">Data About</h2>
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
<!-- <a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModal"><i
        data-feather="plus"></i> Tambah</a> -->
<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5">No</th>
                <th scope="col" width="100">Cover</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM about ORDER BY idabout DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td>
                    <img src="uploads/wisata/about/<?= $row['cover']; ?>" alt="Cover" class="img-thumbnail rounded"
                        width="100">
                </td>
                <td><?= $row['about_name']; ?></td>
                <td><?= $row['about_description']; ?></td>
                <td>
                <button class="btn btn-sm btn-info text-white" onclick="lihatData(<?= $row['idabout'] ?>)">
                        <i data-feather="edit"></i>
                        Lihat
                    </button>
                    <button class="btn btn-sm btn-warning text-white" onclick="editData(<?= $row['idabout'] ?>)">
                        <i data-feather="edit"></i>
                        Edit
                    </button>
                    <!-- <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['idabout'] ?>)">
                        <i data-feather="trash"></i>
                        Hapus
                    </button> -->
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
            <form action="<?=base_url();?>process/about.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="about_name" class="form-label text-bold">Judul</label>
                            <input type="text" class="form-control text-capitalize" id="about_name" name="about_name"
                                placeholder="Masukkan Judul" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="about_description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control text-capitalize" id="about_description" name="about_description"
                                placeholder="Masukkan Deskripsi" required autofocus>
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
            <form action="<?=base_url();?>process/about.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Data About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="oldImage">
                        <div class="col-md-12 mb-2">
                            <label for="about_name" class="form-label">Judul</label>
                            <input type="text" class="form-control text-capitalize" id="about_name" name="about_name"
                                placeholder="Masukkan Deskripsi" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="about_description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control text-capitalize" id="about_description" name="about_description"
                                placeholder="Masukkan Deskripsi" required>
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
                    <button type="submit" class="btn btn-primary" name="update-about"><i data-feather="save"></i>
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
                    <h5 class="modal-title" id="ModalLabel">Lihat Detail About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-md-12 mb-2">
                            <label for="about_name" class="form-label">Judul</label>
                            <p class="text-capitalize" id="about_name"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="about_description" class="form-label">Deskripsi</label>
                            <p class="text-capitalize" id="about_description"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="cover" class="form-label">Cover About</label>
                            <img id="cover" src="" alt="Cover about" class="img-fluid">
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
            <form action="<?=base_url();?>process/about.php" method="post">
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
                    <button type="submit" class="btn btn-danger" name="delete-about"><i data-feather="trash"></i> Iya
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
        url: '<?= base_url(); ?>process/view_about.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idabout);
            $('[name="oldImage"]').val(data.cover);
        }
    });
}

function editData(id) {
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_about.php',
        dataType: 'json',
        success: function(data) {
            if (!data.error) {
                $('#editModal').find('[name="id"]').val(data.idabout);
                $('#editModal').find('[name="about_name"]').val(data.about_name);
                $('#editModal').find('[name="about_description"]').val(data.about_description);
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
        url: '<?= base_url(); ?>process/view_about.php',
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#viewModal').find('#about_name').text(data.about_name);
                $('#viewModal').find('#about_description').text(data.about_description);

                var coverPath = 'uploads/wisata/about/' + data.cover;
                $('#viewModal').find('#cover').attr('src', coverPath); // Menetapkan atribut src dengan jalur lengkap


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