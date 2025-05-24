<?php $no = 1; ?>
<?php foreach ($data['pengaduan'] as $laporan) : ?>

   <tr class="text-left">
      <td><?= $no++; ?></td>
      <td><?= $laporan['tgl_pengaduan']; ?></td>
      <td><?= $laporan['nik']; ?></td>
      <td><?= $laporan['isi_laporan']; ?></td>
      <td><a href="<?= $laporan['foto']; ?>" target="_blank" class="text-dark font-weight-bold" style="text-decoration: none;">Preview</a></td>
      <td>
         <?php if ($laporan['status'] === 'proses') : ?>
            <p class="badge badge-warning text-white p-2" style="text-transform: capitalize;"><?= $laporan['status']; ?></p>

         <?php elseif ($laporan['status'] === 'selesai') : ?>
            <p class="badge badge-success text-white p-2" style="text-transform: capitalize;"><?= $laporan['status']; ?></p>

         <?php elseif ($laporan['status'] === 'belum terverifikasi') : ?>
            <p class="badge badge-secondary text-white p-2" style="text-transform: capitalize;"><?= $laporan['status']; ?></p>

         <?php elseif ($laporan['status'] === 'terverifikasi') : ?>
            <p class="badge badge-info text-white p-2" style="text-transform: capitalize;"><?= $laporan['status']; ?></p>

         <?php else : ?>
            <p class="badge badge-danger text-white p-2" style="text-transform: capitalize;">Error!</p>
         <?php endif; ?>
      </td>
      <td>
         <div class="d-flex justify-content-start align-items-center">
            <a href="<?= BASEURL; ?>/petugas/detail/<?= $laporan['id_pengaduan']; ?>" class="text-dark mr-3" style="text-decoration: none;" target="_self">Detail</a>

            <button class="btn btn-danger btn-sm">
               <a href="<?= BASEURL; ?>/petugas/hapuspengaduan/<?= $laporan['id_pengaduan']; ?>" class="text-white" style="text-decoration: none;" onclick="return confirm('Anda yakin?')">Hapus</a>
            </button>
         </div>
      </td>
   </tr>
   <?php if (empty($laporan['tgl_pengaduan'])) : ?>
      <tr>
         <td class="text-center bg-warning">Data tidak ditemukan atau kata kunci kosong!</td>
      </tr>
   <?php endif; ?>
<?php endforeach; ?>