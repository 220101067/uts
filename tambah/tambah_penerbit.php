<div class="container ">
    <div class="card shadow mb-1">
        <div class="card-body">
            <h4>Tmabah penerbit buku</h4>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-10 ">
            <div class="card mt-4 mb-4 ">
                <div class="card-body ps-5 pe-5 pb-3 shadow border-0">
                    <form action="index.php?halaman=penerbit_buku_save" method="post">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama penerbit: </label>
                                    <input type="text" class="form-control" name="nama_penerbit">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Tahun penerbit: </label>
                                    <input type="text" class="form-control"  name="tahun_penerbit">
                                </div>
                                
                            </div>

                        </div>
                        <a href="index.php?halaman=penerbit_buku" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

