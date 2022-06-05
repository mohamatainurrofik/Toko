<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Master User</h3>
                <div class="card-toolbar">
                    <!-- <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modaltambahkategori">
                        Tambah
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modaltambahkategori">
                        Sampah
                    </button> -->
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        Actions
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                </g>
                            </svg>
                        </span>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahuser">
                                Tambah
                            </a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-user" data-bs-toggle="modal" data-bs-target="#modalsampahuser">
                                Lihat Sampah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::About-->
                <div class="mb-18">
                    <!--begin::Wrapper-->

                    <div class="mb-10">
                        <table id="table_user" class="table table-hover table-row-bordered gy-5 gs-7  gx-7">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="modal fade" tabindex="-1" id="modaltambahuser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah User</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">

                    <div class="mb-10">
                        <label for="email" class="required form-label"><?= lang('Auth.email') ?></label>
                        <input required type="email" class="form-control form-control-solid <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>
                    <div class=" mb-10">
                        <label for="username" class="required form-label"><?= lang('Auth.username') ?></label>
                        <input required type="text" class="form-control form-control-solid <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="password" class="required form-label"><?= lang('Auth.password') ?></label>
                            <input required type="password" class="form-control form-control-solid <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="pass_confirm" class="required form-label"><?= lang('Auth.repeatPassword') ?></label>
                            <input required type="password" name="pass_confirm" class="form-control form-control-solid <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?= lang('Auth.register') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalsampahuser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah User</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width: 100%;" id="table_sampah_user" class="table table-bordered table-row-bordered ">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaledituser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit User</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/edit/user" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <input style="display: none;" type="text" name="id_user" id="id_user">
                        <label for="emailuser" class="required form-label">Email User</label>
                        <input required type="text" class="form-control form-control-solid" id="edit_email_user" name="emailuser" placeholder="Masukkan Email User">
                    </div>
                    <div class="mb-10">
                        <label for="usernameuser" class="required form-label">Username User</label>
                        <input required type="text" class="form-control form-control-solid" id="edit_username_user" name="usernameuser" placeholder="Masukkan Username User">
                    </div>
                    <div class="mb-10">
                        <label for="passworduser" class="required form-label">Password User</label>
                        <input type="password" class="form-control form-control-solid" id="edit_password_user" name="passworduser" placeholder="Kosongkan Jika Password Tidak diubah">
                    </div>
                    <div class="mb-10">
                        <label for="rolesuser" class=" form-label">Roles User</label>
                        <select data-dropdown-parent="#modaledituser" required class="form-select form-select-solid" id="edit_roles_user" name="roles_user" data-control="select2" data-placeholder="Pilih Roles User" data-allow-clear="true">
                            <option></option>
                            <?php foreach ($roles as $role) : ?>
                                <option id="role<?= $role['name'] ?>" value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaldeleteuser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Yakin Untuk Hapus Data ini ?</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="/hapus/user" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_user" id="id_hapususer">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>