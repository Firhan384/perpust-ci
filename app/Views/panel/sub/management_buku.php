<?= $this->extend('panel/master/main') ?>
<?= $this->section('content') ?> 

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Buku</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
    
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right" id="btnAddBuku">Add</button>

                </div>
                <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Kat Buku</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            var_dump(session()->get());
                            foreach($showData->getResultArray() as $p):
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $p['judul'] ?></td>
                            <td><?= $p['pengarang'] ?></td>
                            <td><?= $p['penerbit'] ?></td>
                            <td><?= $p['nama_kat_buku'] ?></td>
                            <td><button class="btn btn-sm btn-info btn-buku-update" id="<?= $p['id_buku'] ?>">Edit</button> | <button class="btn btn-sm btn-danger btn-buku-delete" id="<?= $p['id_buku'] ?>">Delete</button></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <!-- Modal User -->
    <div class="modal" id="modalBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="BukuModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-buku"method="post">
                <input type="hidden" id="id" name="id">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="pengarang">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="status">Status</label>
                    <select class="custom-select" id="status" name="status" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_kat_buku">Kategori Buku</label>
                        <select class="custom-select" id="id_kat_buku" name="id_kat_buku" required>
                            <?php 
                                $cek = $kategori_buku->resultID->num_rows;
                                if($cek == 0):
                            ?>
                            <option selected disabled value="">Data not found</option>
                            <?php 
                                else:
                                    echo '<option selected disabled value="">Choose...</option>';
                                    foreach($kategori_buku->getResultArray() as $p):
                            ?>
                            <option value="<?= $p['id_kat_bukus'] ?>"><?= $p['nama_kat_buku'] ?></option>
                            <?php
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitBukuModal">Submit</button>
                </div>
            </form>
        </div>
  
        </div>
    </div>
    </div>

    <!-- Modal delete -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin untuk menghapus data ini?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" id="submitDeleteUser">Logout</button>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>