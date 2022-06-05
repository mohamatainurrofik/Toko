<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Master Supplier</h3>
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
                            <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahsupplier">
                                Tambah
                            </a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-supplier" data-bs-toggle="modal" data-bs-target="#modalsampahsupplier">
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
                        <table id="table_supplier" class="table table-hover table-row-bordered gy-5 gs-7  gx-7">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Email</th>
                                    <th>Contact 1</th>
                                    <th>Contact 2</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Email</th>
                                    <th>Contact 1</th>
                                    <th>Contact 2</th>
                                    <th>Alamat</th>
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


<div class="modal fade" tabindex="-1" id="modaltambahsupplier">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Supplier</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/simpan/supplier" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="namasupplier" class="required form-label">Nama Supplier</label>
                        <input required type="text" class="form-control form-control-solid" name="namasupplier" placeholder="Masukkan Nama Supplier" />
                    </div>
                    <div class="mb-10">
                        <label for="emailsupplier" class="form-label">Email Supplier</label>
                        <input type="email" class="form-control form-control-solid" name="emailsupplier" placeholder="Masukkan Email Supplier"></input>
                    </div>
                    <div class="form-group row mb-10">
                        <div class="col-md-6">
                            <label for="contact1" class="required form-label">Contact 1</label>
                            <input required class="form-control form-control-solid" name="contact1" placeholder="Masukkan Contact 1 Supplier"></input>
                        </div>
                        <div class="col-md-6">
                            <label for="contact2" class="form-label">Contact 2</label>
                            <input class="form-control form-control-solid" name="contact2" placeholder="Masukkan Contact 2 Supplier"></input>
                        </div>
                    </div>
                    <div class="mb-10">
                        <label for="alamatsupplier" class=" form-label">Alamat Supplier</label>
                        <textarea class="form-control form-control-solid" name="alamatsupplier" placeholder="Masukkan Alamat Supplier" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modalsampahsupplier">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Supplier</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width: 100%;" id="table_sampah_supplier" class="table table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Email</th>
                                <th>Contact 1</th>
                                <th>Contact 2</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Email</th>
                                <th>Contact 1</th>
                                <th>Contact 2</th>
                                <th>Alamat</th>
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

<div class="modal fade" tabindex="-1" id="modaleditsupplier">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Supplier</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/edit/supplier" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <input style="display: none;" type="text" name="id_supplier" id="id_supplier">
                        <label for="namasupplier" class="required form-label">Nama Supplier</label>
                        <input required type="text" class="form-control form-control-solid" id="edit_nama_supplier" name="namasupplier" placeholder="Masukkan Nama Supplier" />
                    </div>
                    <div class="mb-10">
                        <label for="emailsupplier" class="form-label">Email Supplier</label>
                        <input type="email" class="form-control form-control-solid" id="edit_email_supplier" name="emailsupplier" placeholder="Masukkan Email Supplier"></input>
                    </div>
                    <div class="mb-10">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="contact1" class="required form-label">Contact 1</label>
                                <input required class="form-control form-control-solid" name="contact1" id="edit_contact1_supplier" placeholder="Masukkan Contact 1 Supplier"></input>
                            </div>
                            <div class="col-md-6">
                                <label for="contact2" class="form-label">Contact 2</label>
                                <input class="form-control form-control-solid" name="contact2" id="edit_contact2_supplier" placeholder="Masukkan Contact 2 Supplier"></input>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">
                        <label for="alamatsupplier" class=" form-label">Alamat Supplier</label>
                        <textarea class="form-control form-control-solid" name="alamatsupplier" id="edit_alamat_supplier" placeholder="Masukkan Alamat Supplier" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modaldeletesupplier">
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
            <form action="/hapus/supplier" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_supplier" id="id_hapussupplier">
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