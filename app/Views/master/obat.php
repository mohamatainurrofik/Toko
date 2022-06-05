<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-table-obat-tab" data-bs-toggle="tab" data-bs-target="#table-obat" type="button" role="tab" aria-controls="nav-table-obat" aria-selected="true">Data Barang</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Template</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Upload Mess</button>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="table-obat" role="tabpanel" aria-labelledby="table-obat-tab">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Master Data Barang</h3>
                        <div class="card-toolbar">
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
                                    <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahobat">
                                        Tambah
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-obat" data-bs-toggle="modal" data-bs-target="#modalsampahobat">
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
                                <table id="table_obat" class="table table-sm table-hover table-striped table-row-bordered ">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>HNA</th>
                                            <th>HPP AVG</th>
                                            <th>Harga Jual</th>
                                            <th>Max Disc</th>
                                            <th>Min Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>HNA</th>
                                            <th>HPP AVG</th>
                                            <th>Harga Jual</th>
                                            <th>Max Disc</th>
                                            <th>Min Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" id="modaltambahobat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Barang</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/simpan/obat" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="kategoriobat" class="required form-label">Kategori Barang</label>
                        <select data-dropdown-parent="#modaltambahobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="kategori_obat" data-control="select2" data-placeholder="Pilih Kategori Barang">
                            <option></option>
                            <?php foreach ($kategori as $gori) : ?>
                                <option value="<?= $gori['id_kategori_obat'] ?>"><?= $gori['kategori_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="jenisobat" class="required form-label">Jenis Barang</label>
                        <select data-dropdown-parent="#modaltambahobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="jenis_obat" data-control="select2" data-placeholder="Pilih Jenis Barang">
                            <option></option>
                            <?php foreach ($jenis as $nis) : ?>
                                <option value="<?= $nis['id_jenis_obat'] ?>"><?= $nis['jenis_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="namaobat" class="required form-label">Nama Barang</label>
                        <input required type="text" class="form-control form-control-solid" name="namaobat" placeholder="Masukkan Nama Barang" />
                    </div>
                    <div class="mb-10">
                        <label for="satuan_obat" class="required form-label">Satuan</label>
                        <select data-dropdown-parent="#modaltambahobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="satuan_obat" data-control="select2" data-placeholder="Pilih Satuan Barang">
                            <option></option>
                            <?php foreach ($satuan as $tuan) : ?>
                                <option value="<?= $tuan['id_satuan'] ?>"><?= $tuan['satuan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="hna" class="required form-label">HNA Barang</label>
                                <input required type="number" class="form-control form-control-solid" name="hna" placeholder="Masukkan HNA Barang" />
                            </div>
                            <div class="col-md-6">
                                <label for="hj" class="required form-label">Harga Jual Barang</label>
                                <input required type="number" class="form-control form-control-solid" name="hj" placeholder="Masukkan Harga Jual Barang" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="min_stok" class="required form-label">Minimum Stok Barang</label>
                                <input required type="number" class="form-control form-control-solid" name="min_stok" placeholder="Masukkan Minimum Stok Barang" />
                            </div>
                            <div class="col-md-6">
                                <label for="max_disc" class="required form-label">Max Diskon Barang</label>
                                <div class="input-group input-group-solid">
                                    <input required type="number" class="form-control form-control-solid" name="max_disc" placeholder="Masukkan Max Diskon Barang" aria-describedby="basic-addon2" />
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">
                        <label for="deskripsiobat" class=" form-label">Deskripsi Barang</label>
                        <textarea class="form-control form-control-solid" name="deskripsiobat" placeholder="Masukkan Deskripsi Barang" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modalsampahobat">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Barang</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width: 100%;" id="table_sampah_obat" class="table  table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Kategori Barang</th>
                                <th>Jenis Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>HNA</th>
                                <th>HPP AVG</th>
                                <th>Harga Jual</th>
                                <th>Max Disc</th>
                                <th>Min Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Kategori Barang</th>
                                <th>Jenis Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>HNA</th>
                                <th>HPP AVG</th>
                                <th>Harga Jual</th>
                                <th>Max Disc</th>
                                <th>Min Stok</th>
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

<div class="modal fade" tabindex="-1" id="modalhistoryobat">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-history-obat"></h5>
                <input type="hidden" name="" id="id_history_obat">
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10 table-responsive">
                    <table id="table_history_obat" class="table table-hover table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>id</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Aksi</th>
                                <th>Before</th>
                                <th>After</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>id</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Aksi</th>
                                <th>Before</th>
                                <th>After</th>
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

<div class="modal fade" tabindex="-1" id="modaleditobat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Satuan</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/edit/obat" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="kodeobat" class="required form-label">Kode Barang</label>
                        <input required readonly type="text" class="form-control form-control-solid" id="edit_kode_obat" name="kode_obat" placeholder="Masukkan Kode Barang" />
                    </div>
                    <div class="mb-10">
                        <label for="kategoriobat" class="required form-label">Kategori Barang</label>
                        <input style="display: none;" name="id_obat" type="text" id="edit_id_obat">
                        <select data-dropdown-parent="#modaleditobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" id="edit_kategori_obat" name="kategori_obat" data-control="select2" data-placeholder="Pilih Kategori Barang" data-allow-clear="true">
                            <option></option>
                            <?php foreach ($kategori as $gori1) : ?>
                                <option id="kategoriobat<?= $gori1['kategori_obat'] ?>" value="<?= $gori1['id_kategori_obat'] ?>"><?= $gori1['kategori_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="jenisobat" class="required form-label">Jenis Barang</label>
                        <select data-dropdown-parent="#modaleditobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" id="edit_jenis_obat" name="jenis_obat" data-control="select2" data-placeholder="Pilih Jenis Barang" data-allow-clear="true">
                            <option></option>
                            <?php foreach ($jenis as $nis1) : ?>
                                <option id="jenisobat<?= $nis1['jenis_obat'] ?>" value="<?= $nis1['id_jenis_obat'] ?>"><?= $nis1['jenis_obat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="namaobat" class="required form-label">Nama Barang</label>
                        <input required type="text" class="form-control form-control-solid" id="edit_nama_obat" name="namaobat" placeholder="Masukkan Nama Barang" />
                    </div>
                    <div class="mb-10">
                        <label for="satuan_obat" class="required form-label">Satuan</label>
                        <select data-dropdown-parent="#modaleditobat > .modal-dialog > .modal-content" required class="form-select form-select-solid" name="satuan_obat" id="edit_satuan_obat" data-control="select2" data-placeholder="Pilih Satuan Barang" data-allow-clear="true">
                            <option></option>
                            <?php foreach ($satuan as $tuan) : ?>
                                <option id="satuan<?= $tuan['satuan'] ?>" value="<?= $tuan['id_satuan'] ?>"><?= $tuan['satuan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-10">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="hna" class="required form-label">HNA Barang</label>
                                <input required readonly type="number" id="edit_hna" class="form-control form-control-solid" name="hna" placeholder="Masukkan HNA Barang" />
                            </div>
                            <div class="col-md-6">
                                <label for="hj" class="required form-label">Harga Jual Barang</label>
                                <input required type="number" id="edit_hj" class="form-control form-control-solid" name="hj" placeholder="Masukkan Harga Jual Barang" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="min_stok" class="required form-label">Minimum Stok Barang</label>
                                <input required type="number" id="edit_min_stok" class="form-control form-control-solid" name="min_stok" placeholder="Masukkan Minimum Stok Barang" />
                            </div>
                            <div class="col-md-6">
                                <label for="max_disc" class="required form-label">Max Diskon Barang</label>
                                <div class="input-group input-group-solid">
                                    <input required type="number" id="edit_max_disc" class="form-control form-control-solid" name="max_disc" placeholder="Masukkan Max Diskon Barang" aria-describedby="basic-addon2" />
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">

                        <label for="edit_hpp" class="required form-label">HPP Barang</label>
                        <input required readonly type="number" id="edit_hpp" class="form-control form-control-solid" name="hpp_avg" placeholder="Masukkan HPP Barang" />

                    </div>
                    <div class="mb-10">
                        <label for="deskripsiobat" class=" form-label">Deskripsi Barang</label>
                        <textarea class="form-control form-control-solid" id="edit_deskripsiobat" name="deskripsiobat" placeholder="Masukkan Deskripsi Barang" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modaldeleteobat">
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
            <form action="/hapus/obat" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_obat" id="id_hapusobat">
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