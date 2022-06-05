<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Data Cash Flow</h3>
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
                            <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahcashflow">
                                Tambah
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
                        <table id="table_cashflow" class="table table-hover table-row-bordered gy-5 gs-7  gx-7">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Kode Cashflow</th>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Created by</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Kode Cashflow</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Created by</th>
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


<div class="modal fade" tabindex="-1" id="modaltambahcashflow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Cashflow</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/simpan/cashflow" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="tanggalcashflow" class="required form-label">Tanggal</label>
                        <input required type="date" class="form-control form-control-solid" name="tanggalcashflow" placeholder="Masukkan Tanggal" />
                    </div>
                    <div class="mb-10">
                        <label for="jeniscashflow" class="required form-label">Jenis</label>
                        <select data-dropdown-parent="#modaltambahcashflow > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="jeniscashflow" id="jeniscashflow" data-control="select2" data-placeholder="Pilih Jenis Cashflow" data-allow-clear="true">
                            <option></option>
                            <option value="MASUK">MASUK</option>
                            <option value="KELUAR">KELUAR</option>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="totalcashflow" class="required form-label">Total</label>
                        <input required type="number" class="form-control form-control-solid money" name="totalcashflow" id="totalcashflow" placeholder="Total Cashflow" />
                    </div>
                    <div class="mb-10">
                        <label for="keterangancashflow" class=" form-label">Keterangan</label>
                        <textarea required class="form-control form-control-solid" name="keterangancashflow" placeholder="Masukkan Keterangan" id="keterangancashflow" cols="30" rows="2"></textarea>
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



<div class="modal fade" tabindex="-1" id="modaleditcashflow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Cashflow</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/edit/cashflow" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="tanggalcashflow" class="required form-label">Tanggal</label>
                        <input style="display: none;" type="text" name="id_cashflow" id="edit_id_cashflow">
                        <input required type="date" class="form-control form-control-solid" name="tanggalcashflow" id="edit_tanggalcashflow" placeholder="Masukkan Tanggal" />
                    </div>
                    <div class="mb-10">
                        <label for="jeniscashflow" class="required form-label">Jenis</label>
                        <select data-dropdown-parent="#modaleditcashflow > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="jeniscashflow" id="edit_jeniscashflow" data-control="select2" data-placeholder="Pilih Jenis Cashflow" data-allow-clear="true">
                            <option></option>
                            <option value="MASUK">MASUK</option>
                            <option value="KELUAR">KELUAR</option>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="totalcashflow" class="required form-label">Total</label>
                        <input required type="number" class="form-control form-control-solid " name="totalcashflow" id="edit_totalcashflow" placeholder="Total Cashflow" />
                    </div>
                    <div class="mb-10">
                        <label for="keterangancashflow" class=" form-label">Keterangan</label>
                        <textarea required class="form-control form-control-solid" name="keterangancashflow" placeholder="Masukkan Keterangan" id="edit_keterangancashflow" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modaldeletecashflow">
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
            <form action="/hapus/customer" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_cashflow" id="id_hapuscashflow">
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