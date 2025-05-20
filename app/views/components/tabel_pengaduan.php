<?php $no = 1; ?>
<?php foreach ($data['pengaduan'] as $laporan) : ?>

   <tr class="text-left">
      <td><?= $no++; ?></td>
      <td><?= $laporan['tgl_pengaduan']; ?></td>
      <td><?= $laporan['nik']; ?></td>
      <td><?= $laporan['isi_laporan']; ?></td>
      <td><?= $laporan['foto']; ?></td>
      <td><?= $laporan['status']; ?></td>
      <td>
         <div class="d-flex justify-content-start align-items-center">
            <a href="<?= BASEURL; ?>/detail/editData" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>

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