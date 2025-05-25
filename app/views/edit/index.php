<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Edit data <?= strtolower($data['judul']); ?></h1>

      <a href="<?= BASEURL; ?>/petugas/<?= strtolower($data['judul']); ?>"><button class="btn rounded btn-info text-white font-weight-bold p-2 mb-3 mt-3 ml-4" style="width: 10%;">Kembali</button></a>

      <div class="rounded border border-black p-5 ml-4" style="background-color: #fefefe;">
         <h2>Edit data <?= strtolower($data['judul']); ?></h2>
         <hr>

         <?php if (!empty($data['masyarakat'])): ?>
            <?php $this->view('components/form_edit_masyarakat', $data); ?>

         <?php elseif (!empty($data['petugas'])): ?>
            <?php $this->view('components/form_edit_petugas', $data); ?>

         <?php else: ?>
            <div class="alert alert-danger text-center">Data tidak ditemukan.</div>
         <?php endif; ?>

      </div> <!-- border closing tag -->

   </div> <!-- container closing -->
</div>