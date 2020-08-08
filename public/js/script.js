$(function(){
    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah data');
        $('.modal-body form')[0].reset();
    });
    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah data');
        $('.modal-body form').attr('action', 'http://localhost/github/simple-crud-php-mvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/github/simple-crud-php-mvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });
});