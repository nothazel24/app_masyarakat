<?php $no = 1; ?>
<?php foreach ($data['petugas'] as $ptgs) : ?>

   <tr class="text-left">
      <td><?= $no++; ?></td>
      <td><?= $ptgs['nama_petugas']; ?></td>
      <td><?= $ptgs['username']; ?></td>
      <td><?= $ptgs['telp']; ?></td>
      <td style="text-transform: capitalize;"><?= $ptgs['level']; ?></td>
      <td>
         <div class="d-flex justify-content-start align-items-center">
            <a href="<?= BASEURL; ?>/petugas/editpetugas/<?= $ptgs['id_petugas'];?>" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>

            <button class="btn btn-danger btn-sm">
               <a href="<?= BASEURL; ?>/petugas/hapuspetugas/<?= $ptgs['id_petugas']; ?>" class="text-white" style="text-decoration: none;" onclick="return confirm('Anda yakin?')">Hapus</a>
            </button>
         </div>
      </td>
   </tr>
   <?php if (empty($ptgs['username'])) : ?>
      <tr>
         <td class="text-center bg-warning">Data tidak ditemukan atau Kata kunci kosong!</td>
      </tr>
   <?php endif; ?>
<?php endforeach; ?>