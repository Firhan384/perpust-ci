<?= $this->extend('panel/master/main') ?>
<?= $this->section('content') ?> 

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management user</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
    
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right" id="btnAddUser">Add</button>

                </div>
                <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach($showData as $p):
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $p['nama_user'] ?></td>
                            <td><?= $p['role'] ?></td>
                            <td><?= $p['status'] ?></td>
                            <td><button class="btn btn-sm btn-info btn-user-update" id="<?= $p['id_user'] ?>">Edit</button> | <button class="btn btn-sm btn-danger btn-user-delete" id="<?= $p['id_user'] ?>">Delete</button></td>
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
    <div class="modal" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-user"method="post">
                <input type="hidden" id="id" name="id">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="role">Role</label>
                        <select class="custom-select" id="role" name="role" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="2">Admin</option>
                            <option value="1">User</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="status">Status</label>
                    <select class="custom-select" id="status" name="status" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitUserModal">Submit</button>
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