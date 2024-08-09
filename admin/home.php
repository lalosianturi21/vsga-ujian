<h2 class="mt-3">Selamat Datang Kembali</h2>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card text-white mb-3" style="background-color: rgb(255, 99, 132)">
                <div class="card-body">
                    <h5 class="card-title">Total Tempat Wisata</h5>
                    <h1><?= count_table('wisata'); ?> Tempat</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white mb-3" style="background-color: rgb(54, 162, 235)">
                <div class="card-body">
                    <h5 class="card-title">Total Layanan</h5>
                    <h1><?= count_table('services'); ?> Layanan</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white mb-3" style="background-color: rgb(255, 205, 86)">
                <div class="card-body">
                    <h5 class="card-title">Total About</h5>
                    <h1><?= count_table('about'); ?> About</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white mb-3" style="background-color: rgb(75, 192, 192)">
                <div class="card-body">
                    <h5 class="card-title">Total Team</h5>
                    <h1><?= count_table('team'); ?> Team</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>