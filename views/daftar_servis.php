<style>
    .table-responsive {
        margin: 20px auto;
        max-width: 90%;
        overflow-x: auto;
    }

    

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    thead th {
        background-color: #007bff;
        color: #ffffff;
        padding: 12px;
        text-align: left;
    }

    tbody td {
        padding: 12px;
        border-bottom: 1px solid #dddddd;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #e9ecef;
    }

    table th, table td {
        text-align: left;
    }

    table td {
        font-family: 'Arial', sans-serif;
        font-size: 14px;
    }

    .main-txt h1 {
        font-size: 30px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .main-txt i{
        color: orange;
    }

</style>

<div class="container">
<div class="main-txt">
            <h1><span>D</span>aftar <span>L</span>ayanan  <i class="fa-solid fa-utensils"></i></h1> 
         </div>
<div class="table-responsive">
    <table id="hargaTable" class="table table-striped table-sm">
        <thead class="bg-warning">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Layanan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n = 1;
            $query = mysqli_query($con, "SELECT * FROM services ORDER BY service_id DESC") or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td class="text-center"><?= $n++; ?></td>
                <td><?= $row['service_name']; ?></td>
                <td align="right"><?= money($row['service_price']); ?></td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div>
</div>
