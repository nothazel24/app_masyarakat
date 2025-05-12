$(function () {

    // mengubah value dari tag yang telah di inisiasi
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // mengubah value dari tag yang telah di inisiasi
    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah data Siswa');

        // mengubah value dari button yang bertipe submit
        $('.modal-footer button[type=submit]').html('Ubah Data');

        // mengubah alamat redirect tombol ubah data 
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

        
        // menyimpan id dari tombol yang ditekan kedalam variabel
        const id = $(this).data('id');

        // AJAX 
        $.ajax({
            // mengambil data ke dari method yang mana, dan menggunakan url
            // method get ubah, berfungsi untuk mengembalikan data yang dikirim sesuai id
            url: 'http://localhost/phpmvc/public/siswa/getubah',
            // id yang pertama berisi nama data yang dikirimkan, dan yang kanan isi datanya.
            data: { id: id },
            // data yang dikirimkan menggunakan method apa?
            method: 'post',
            dataType: 'json',
            // parameter data dalam function berfungsi untuk menangkap data yang dikirim. apabila berhasil
            success: function (data) {
                // memasukkan data yang telah di konversi kedalam modal berdasarkan id tag
                // mencarikan id #nama dan memasukkan data nama kedalam modal
                $('#nama').val(data.nama);
                $('#nis').val(data.nis);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);

                // data id akan dikirimkan ke method ubah
                $('#id').val(data.id);
            }
        });

    });

});