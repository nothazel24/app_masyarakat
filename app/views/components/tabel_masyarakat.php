 <?php $no = 1; ?>
 <?php foreach ($data['masyarakat'] as $msr) : ?>

    <tr class="text-left">
       <td><?= $no++; ?></td>
       <td><?= $msr['nama']; ?></td>
       <td><?= $msr['nik']; ?></td>
       <td><?= $msr['username']; ?></td>
       <td><?= $msr['telp']; ?></td>
       <td>
          <div class="d-flex justify-content-start align-items-center">
             <a href="<?= BASEURL; ?>/detail/editData" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>

             <button class="btn btn-danger btn-sm">
                <a href="<?= BASEURL; ?>/petugas/hapus/<?= $msr['nik']; ?>" class="text-white" style="text-decoration: none;" onclick="return confirm('Anda yakin?')">Hapus</a>
             </button>
          </div>
       </td>
    </tr>
    <?php if (empty($msr['nik'])) : ?>
       <tr>
          <td class="text-center bg-warning">Data tidak ditemukan atauKata kunci kosong!</td>
       </tr>
    <?php endif; ?>
 <?php endforeach; ?>