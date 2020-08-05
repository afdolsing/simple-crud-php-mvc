<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <?php foreach($data['mhs'] as $mahasiswa) : ?>
                    <ul>
                        <li><?= $mahasiswa['nama'] ?></li>
                        <li><?= $mahasiswa['nrp'] ?></li>
                        <li><?= $mahasiswa['email'] ?></li>
                        <li><?= $mahasiswa['jurusan'] ?></li>
                    </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>