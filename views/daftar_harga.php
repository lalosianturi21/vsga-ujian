

<div class="container">
<div class="main-txt">
            <h1><span>D</span>aftar <span>H</span>arga <span>P</span>aket <i class="fa-solid fa-person-walking-luggage"></i></h1> 
         </div>
<div class="table-responsive">
    <table id="hargaTable" class="table table-striped table-sm">
        <thead class="bg-warning">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Alamat</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n = 1;
            $query = mysqli_query($con, "SELECT * FROM wisata ORDER BY idwisata DESC") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td class="text-center"><?= $n++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td align="right"><?= money($row['harga']); ?></td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div>
</div>
