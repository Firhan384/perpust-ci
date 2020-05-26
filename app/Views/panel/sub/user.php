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

                    <div class="table-responsive-sm">
                        <table class="table">
                            
                        </table>
                    </div>

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
            <form id="form-user" action="" method="post">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault04">Role</label>
                        <select class="custom-select" id="validationDefault04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault04">Status</label>
                    <select class="custom-select" id="validationDefault04" required>
                        <option selected disabled value="">Choose...</option>
                        <option>Active</option>
                        <option>Non Active</option>
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
<?= $this->endSection() ?>