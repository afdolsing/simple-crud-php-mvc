<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
            <hr>
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mahasiswa) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mahasiswa['nama'] ?>
                        <a href="<?= BASE_URL ?>/mahasiswa/detail/<?= $mahasiswa['id'] ?>" class="badge badge-primary">detail</a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/mahasiswa/tambah" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Hacking">Teknik Hacking</option>
                            <option value="Teknik Web Programming">Teknik Web Programming</option>
                            <option value="Teknik Mobile Programming">Teknik Mobile Programming</option>
                            <option value="Teknik Data Digital">Teknik Data Digital</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>