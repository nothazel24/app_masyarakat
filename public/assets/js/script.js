$(document).ready(function () {

   $('.btn-delete').on('click', function () {
      const id = $(this).data('id');
      const deleteUrl = "http://localhost/app_masyarakat/public/petugas/hapuspengaduan/" + id;
      $('#btn-delete-confirm').attr('href', deleteUrl);
   });

   $('.btn-delete').on('click', function () {
      const id = $(this).data('id');
      const deleteUrl = "http://localhost/app_masyarakat/public/petugas/hapuspetugas/" + id;
      $('#btn-delete-confirm2').attr('href', deleteUrl);
   });

   $('.btn-delete').on('click', function () {
      const id = $(this).data('id');
      const deleteUrl = "http://localhost/app_masyarakat/public/petugas/hapusmasyarakat/" + id;
      $('#btn-delete-confirm3').attr('href', deleteUrl);
   });

});
