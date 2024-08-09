<h2 class="mt-3">Data Team</h2>
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
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM team ORDER BY idteam DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td>
                    <img src="uploads/wisata/team/<?= $row['cover']; ?>" alt="Cover" class="img-thumbnail rounded"
                        width="100">
                </td>
                <td><?= $row['team_name']; ?></td>
                <td><?= $row['team_description']; ?></td>
                <td>
                <button class="btn btn-sm btn-info text-white" onclick="lihatData(<?= $row['idteam'] ?>)">
                        <i data-feather="edit"></i>
                        Lihat
                    </button>
                    <button class="btn btn-sm btn-warning text-white" onclick="editData(<?= $row['idteam'] ?>)">
                        <i data-feather="edit"></i>
                        Edit
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['idteam'] ?>)">
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
            <form action="<?=base_url();?>process/team.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="team_name" class="form-label">Nama</label>
                            <input type="text" class="form-control text-capitalize" id="team_name" name="team_name"
                                placeholder="Masukkan Nama" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="team_description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control text-capitalize" id="team_description" name="team_description"
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
            <form action="<?=base_url();?>process/team.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Data Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="oldImage">
                        <div class="col-md-12 mb-2">
                            <label for="team_name" class="form-label">Judul</label>
                            <input type="text" class="form-control text-capitalize" id="team_name" name="team_name"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="team_description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control text-capitalize" id="team_description" name="team_description"
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
                    <button type="submit" class="btn btn-primary" name="update-team"><i data-feather="save"></i>
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
                    <h5 class="modal-title" id="ModalLabel">Lihat Detail team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-md-12 mb-2">
                            <label for="team_name" class="form-label ">Nama</label>
                            <p class="text-capitalize" id="team_name"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="team_description" class="form-label ">Deskripsi</label>
                            <p class="text-capitalize" id="team_description"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="cover" class="form-label ">Cover</label>
                            <div class="div">
                            <img id="cover" src="" alt="Cover team" class="img-fluid">
                            </div>
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
            <form action="<?=base_url();?>process/team.php" method="post">
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
                    <button type="submit" class="btn btn-danger" name="delete-team"><i data-feather="trash"></i> Iya
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
        url: '<?= base_url(); ?>process/view_team.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idteam);
            $('[name="oldImage"]').val(data.cover);
        }
    });
}

function editData(id) {
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_team.php',
        dataType: 'json',
        success: function(data) {
            if (!data.error) {
                $('#editModal').find('[name="id"]').val(data.idteam);
                $('#editModal').find('[name="team_name"]').val(data.team_name);
                $('#editModal').find('[name="team_description"]').val(data.team_description);
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
        url: '<?= base_url(); ?>process/view_team.php',
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#viewModal').find('#team_name').text(data.team_name);
                $('#viewModal').find('#team_description').text(data.team_description);

                var coverPath = 'uploads/wisata/team/' + data.cover;
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