<h2 class="mt-3">Data Wisata Galeri</h2>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success fade show" role="alert">
        <strong>Berhasil!</strong> <?= $_SESSION['success']; ?>.
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger fade show" role="alert">
        <strong>Error!</strong> <?= $_SESSION['error']; ?>.
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModalFoto">
    <i data-feather="plus"></i> Tambah Foto
</a>

<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5">No</th>
                <th scope="col" width="200">File</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col" width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n = 1;
            $query = mysqli_query($con, "SELECT * FROM wisata_galery x JOIN wisata x1 ON x.wisata_id=x1.idwisata ORDER BY idwisata_galery DESC") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($query)):
            ?>
                <tr>
                    <td><?= $n++; ?></td>
                    <td>
                        <?php 
                        $path = base_url() . "uploads/wisata/gallery/" . $row['file'];
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                        if (in_array($ext, ['jpg', 'png', 'jpeg'])): ?>
                            <img src="<?= base_url(); ?>uploads/wisata/gallery/<?= $row['file']; ?>" alt="File"
                                class="img-thumbnail rounded" width="200">
                        <?php endif; ?>
                    </td>
                    <td><?= $row['keterangan']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning text-white" onclick="editData(<?= $row['idwisata_galery'] ?>)">
                            <i data-feather="edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['idwisata_galery'] ?>)">
                            <i data-feather="trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/galeri.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="wisata_id" class="form-label">Wisata</label>
                            <select class="form-select" name="wisata_id" id="wisata_id" required>
                                <option value="">Pilih Tempat Wisata</option>
                                <?= list_wisata() ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="file" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="file" name="file" required>
                            <small class="text-danger">Ukuran maksimal <strong>10 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control text-capitalize" id="keterangan" name="keterangan"
                                placeholder="keterangan" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan-foto"><i data-feather="save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/galeri.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Edit Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_wisata_id" class="form-label">Wisata</label>
                            <select class="form-select" name="wisata_id" id="edit_wisata_id" required>
                                <option value="">Pilih Tempat Wisata</option>
                                <?= list_wisata() ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="edit_file" class="form-label">File</label>
                            <input class="form-control" type="file" id="edit_file" name="file">
                            <small class="text-danger">Ukuran maksimal <strong>10 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                            <input type="hidden" name="oldFile" id="edit_oldFile">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="edit_keterangan" class="form-label">Keterangan File</label>
                            <input type="text" class="form-control text-capitalize" id="edit_keterangan" name="keterangan"
                                placeholder="Keterangan" required autofocus>
                        </div>
                        <input type="hidden" name="id" id="edit_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="update-galeri"><i data-feather="save"></i>
                        Simpan</button>
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
            <form action="<?=base_url();?>process/galeri.php" method="post">
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
                    <button type="submit" class="btn btn-danger" name="delete-galeri"><i data-feather="trash"></i> Iya
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
        url: '<?= base_url(); ?>process/view_galeri.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idwisata_galery);
            $('[name="oldImage"]').val(data.file);
        }
    });
}

function editData(id) {
    $('#editModal').modal('show');
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_galeri.php',
        dataType: 'json',
        success: function(data) {
            $('#edit_wisata_id').val(data.wisata_id);
            $('#edit_keterangan').val(data.keterangan);
            $('#edit_id').val(data.idwisata_galery);
            $('#edit_oldFile').val(data.file);

            var fileExt = data.file.split('.').pop().toLowerCase();
            if (['jpg', 'png', 'jpeg'].includes(fileExt)) {
                $('#edit_file').attr('disabled', false);
            } else {
                $('#edit_file').attr('disabled', true);
            }
        }
    });
}
</script>