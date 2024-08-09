<h2 class="mt-3">Data Layanan</h2>
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
                <th scope="col">Nama Layanan</th>
                <th scope="col">Deskripsi Layanan</th>
                <th scope="col">Icon Layanan</th>
                <th scope="col">Harga Layanan</th>
                <th scope="col" width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM services ORDER BY service_id DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $row['service_name']; ?></td>
                <td><?= $row['service_description']; ?></td>
                <td><?= $row['service_icon']; ?></td>
                <td><?= money($row['service_price']); ?></td>
                <td>
                    <button class="btn btn-sm btn-info text-white" onclick="lihatData(<?= $row['service_id'] ?>)">
                        <i data-feather="edit"></i>
                        Lihat
                    </button>
                    <button class="btn btn-sm btn-warning text-white" onclick="editData(<?= $row['service_id'] ?>)">
                        <i data-feather="edit"></i>
                        Edit
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['service_id'] ?>)">
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
            <form action="<?=base_url();?>process/service.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="service_name" class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_name" name="service_name"
                                placeholder="Masukkan Nama Layanan" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_description" class="form-label">Deskripsi Layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_description" name="service_description"
                                placeholder="Masukkan Deskripsi Layanan" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_icon" class="form-label">Icon Layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_icon" name="service_icon"
                                placeholder="Masukkan Icon Layanan" required autofocus>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_price" class="form-label">Harga Layanan</label>
                            <input type="number" class="form-control text-capitalize" id="service_price" name="service_price"
                                placeholder="Masukkan Harga" required autofocus>
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
            <form action="<?=base_url();?>process/service.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <input type="hidden" name="oldImage">
                        <div class="col-md-12 mb-2">
                            <label for="service_name" class="form-label">Nama layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_name" name="service_name"
                                placeholder="Gunung Botak" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_description" class="form-label">Deskripsi layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_description" name="service_description"
                                placeholder="Gunung Botak" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_icon" class="form-label">Icon Layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_icon" name="service_icon"
                                placeholder="Gunung Botak" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_price" class="form-label">Harga layanan</label>
                            <input type="text" class="form-control text-capitalize" id="service_price" name="service_price"
                                placeholder="Masukkan Harga" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="update-service"><i data-feather="save"></i>
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
                    <h5 class="modal-title" id="ModalLabel">Lihat Detail Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-md-12 mb-2">
                            <label for="service_name" class="form-label">Nama Layanan</label>
                            <p class="text-capitalize" id="service_name"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_description" class="form-label">Deskripsi Layanan</label>
                            <p  id="service_description"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_icon" class="form-label">Icon Layanan</label>
                            <p  id="service_icon"></p>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="service_price" class="form-label">Harga Layanan</label>
                            <p class="text-capitalize" id="service_price"></p>
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
            <form action="<?=base_url();?>process/service.php" method="post">
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
                    <button type="submit" class="btn btn-danger" name="delete-service"><i data-feather="trash"></i> Iya
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
        url: '<?= base_url(); ?>process/view_service.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.service_id);
        }
    });
}

function editData(id) {
    $.ajax({
        type: "POST",
        data: { id: id },
        url: '<?= base_url(); ?>process/view_service.php',
        dataType: 'json',
        success: function(data) {
            if (!data.error) {
                $('#editModal').find('[name="id"]').val(data.service_id);
                $('#editModal').find('[name="service_name"]').val(data.service_name);
                $('#editModal').find('[name="service_description"]').val(data.service_description);
                $('#editModal').find('[name="service_icon"]').val(data.service_icon);
                $('#editModal').find('[name="service_price"]').val(data.service_price);
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
        url: '<?= base_url(); ?>process/view_service.php',
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#viewModal').find('[name="id"]').val(data.service_id); // Use .val() for input fields
                $('#viewModal').find('#service_name').text(data.service_name);
                $('#viewModal').find('#service_description').text(data.service_description);
                $('#viewModal').find('#service_icon').text(data.service_icon);
                $('#viewModal').find('#service_price').text(data.service_price);
                $('#viewModal').modal('show'); // Show the modal after setting data
            } else {
                alert("Data not found or there was an error.");
            }
        },
        error: function() {
            alert("An error occurred while fetching the data.");
        }
    });
}

</script>