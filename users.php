<?php
require_once('function.php');
include_once('templates/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data User</h1>
  <?php
  // jika ada tombol simpan
  if (isset($_POST['simpan'])) {
      if (tambah_tamu($_POST) > 0) {
  ?>
          <div class="alert alert-success" role="alert">
              Data berhasil disimpan!
          </div>
  <?php
      } else {
  ?>
          <div class="alert alert-danger" role="alert">
              Data gagal disimpan!
          </div>
  <?php
      }
  }
  ?>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <button type="button" class="btn-primary btn-icon-split"
              data-toggle="modal" data-target="#tambahModal">
              <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
              </span>
              <span class="text">Data user</span>
            </button>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>User Role</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                  // penomoran auto-increment
                  $no = 1;

                  // query untuk mengambil semua data dari tabel buku_tamu
                  $users = query("SELECT * FROM user");
                  foreach($users as $users) : ?>
                      <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $users['username']; ?></td>
                          <td><?php echo $users['user_role']; ?></td>
                          <td><a class="btn btn-success" href="edit-user.php?id=<?= $users['id_user'] ?>">Ubah</a>
                              <a onclick="confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" 
                              href="hapus-user.php?id=<?= $users['id_user'] ?>">Hapus</a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
<!-- /.container-fluid -->