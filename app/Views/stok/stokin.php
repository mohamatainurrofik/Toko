<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-pembelian-stok-tab" data-bs-toggle="tab" data-bs-target="#pembelian-stok" type="button" role="tab" aria-controls="nav-pembelian-stok" aria-selected="true">Pembelian Stok Obat</button>
                <button class="nav-link" id="nav-pembelian-lainnya-tab" data-bs-toggle="tab" data-bs-target="#nav-pembelian-lainnya" type="button" role="tab" aria-controls="nav-pembelian-lainnya" aria-selected="false">Operasional</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Keterangan</button>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pembelian-stok" role="tabpanel" aria-labelledby="pembelian-stok-tab">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Data Pembelian Stok Obat</h3>
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
                                    <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahpembelian">
                                        Tambah
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-pembelian" data-bs-toggle="modal" data-bs-target="#modalsampahpembelian">
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
                                <table id="table_pembelian" class="table table-bordered table-striped table-row-bordered table-sm">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Kode Pembelian</th>
                                            <th>No Nota</th>
                                            <th>Supplier</th>
                                            <th>Grand Total</th>
                                            <th>Hutang Sisa</th>
                                            <th>Status Pembelian</th>
                                            <th>Created by</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Kode Pembelian</th>
                                            <th>No Nota</th>
                                            <th>Supplier</th>
                                            <th>Grand Total</th>
                                            <th>Hutang Sisa</th>
                                            <th>Status Pembelian</th>
                                            <th>Created by</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-pembelian-lainnya" role="tabpanel" aria-labelledby="nav-pembelian-lainnya-tab">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Data Operasional</h3>
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
                                    <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahpembelianlainnya">
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
                                <table style="width:100%" id="table_pembelianlainnya" class="table table-bordered table-striped table-row-bordered gx-7 table-sm">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Kode Transaksi Operasional</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Grand Total</th>
                                            <th>Created by</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalsampahpembelian">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Pembelian</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width:100%" id="table_sampah_pembelian" class="table table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Tanggal Pembelian</th>
                                <th>Kode Pembelian</th>
                                <th>No Nota</th>
                                <th>Supplier</th>
                                <th>Grand Total</th>
                                <th>Hutang Sisa</th>
                                <th>Status Pembelian</th>
                                <th>Created by</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade modalselect" tabindex="-1" id="modaltambahpembelian">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="tempdatapembelian" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-body py-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-10">
                                            <label for="tanggalpembelian" class="required form-label">Tanggal Pembelian</label>
                                            <input required type="date" class="form-control form-control-solid" name="tanggalpembelian" id="tanggalpembelian" placeholder="Masukkan Tanggal Pembelian" />
                                            <input style="display: none;" value="<?= user()->username ?>" type="text" name="" id="id">
                                            <input type="text" style="display: none;" id="buat_kode_pembelian" value="<?= $kode_pembelian ?>">
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="no_nota" class="required form-label">No Nota Pembelian</label>
                                                    <input required type="text" class="form-control form-control-solid" id="no_notapembelian" name="no_nota" placeholder="Masukkan Nomor Nota Pembelian" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="supplierpembelian" class="required form-label">Supplier</label>
                                                    <select required class="form-select form-select-solid myselect2" id="supplierpembelian" data-dropdown-parent="#modaltambahpembelian > .modal-dialog > .modal-content" name="supplier" data-control="select2" data-placeholder="Pilih Supplier" data-allow-clear="true">
                                                        <option></option>
                                                        <?php foreach ($supplier as $sup) : ?>
                                                            <option value="<?= $sup['id_supplier'] ?>"><?= $sup['supplier'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipembelian" class=" form-label">Deskripsi Pembelian</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipembelian" placeholder="Masukkan Deskripsi Pembelian" id="deskripsipembelian" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="post" id="insert_form">
                                        <div class="table-repsonsive">
                                            <span id="error"></span>
                                            <table class="table table-bordered" id="item_table">
                                                <tr>
                                                    <th>Enter Item Name</th>
                                                    <th>Enter Quantity</th>
                                                    <th>Satuan</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Netto</th>
                                                    <th>Jumlah</th>
                                                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></th>
                                                </tr>
                                            </table>
                                            <table width="100%" id="grand_total" class="">
                                                <tbody>
                                                    <tr class="fw-bolder fs-6">
                                                        <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td align="right" colspan="2" id="totalpembelian" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- <div align="center">
                                                <input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />
                                            </div> -->

                                        </div>
                                        <div class="d-flex float-end">
                                            <div class="mr">
                                                <label for="metodepembayaran" id="view" class="required form-label">Metode Pembayaran</label>
                                                <select data-dropdown-parent="#modaltambahpembelian > .modal-dialog > .modal-content " required class="form-select form-select-solid" id="metodepembayaranpembelian" name="metodepembayaran" data-control="select2" data-placeholder="Pilih Metode Pembayaran" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="CASH">CASH</option>
                                                    <option value="DEBIT">DEBIT</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <label for="totalbayar" class="required form-label">Total Bayar</label>
                                                <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="totalbayarpembelian" placeholder="Total Bayar" />
                                            </div>
                                            <div>
                                                <label for="totalkembalian" class="required form-label">Kembalian</label>
                                                <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="totalkembalianpembelian" placeholder="" />
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- <div class="row mb-10">

                                    <div class="col-md-5">
                                        <label for="namaobat" class="required form-label">Nama Obat</label>
                                        <select required data-dropdown-css-class="w-1000px" data-dropdown-parent="#modaltambahpembelian > .modal-dialog > .modal-content" class="form-select form-select-solid" id="namaobatpembelian" name="namaobat" data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true">
                                            <option></option>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="qtypembelian" class="required form-label">Jumlah</label>
                                        <input required type="number" class="form-control form-control-solid" id="qtypembelian" name="qtypembelian" placeholder="Kuantitas" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hargapembelian" class="required form-label">Harga</label>
                                        <input required type="text" class="form-control form-control-solid money" id="hargapembelian" name="hargapembelian" placeholder="Harga" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="diskonpembelian" class="required form-label">Diskon</label>
                                        <div class="input-group input-group-solid">
                                            <input required type="number" class="form-control form-control-solid" id="diskonpembelian" name="
                                            " placeholder="Diskon" aria-describedby="basic-addon2" />
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <br>
                                        <a type="button" href="#view" id="tambah_pembelian_table" class="btn btn-primary">Tambah</a>
                                    </div>
                                </div> -->
                                <!-- <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_pembelian_stok_obat" class="table table-bordered table-row-bordered gx-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>Nama Obat</th>
                                                        <th>Kuantitas</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Diskon</th>
                                                        <th>Netto</th>
                                                        <th>Sub Total</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <table width="100%" id="grand_total" class="">
                                                <tbody>
                                                    <tr class="fw-bolder fs-6">
                                                        <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td align="right" colspan="2" id="totalpembelian" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_pembelian" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modalselect" tabindex="-1" id="modaltambahpembelianlainnya">
    <div class="modal-dialog">
        <div class="modal-content shadow-none">
            <form action="/simpan/pembelianlainnya" method="POST" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Transaksi Operasional</h3>
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
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-10">
                                            <label for="tanggalpembelianlainnya" class="required form-label">Tanggal Pembelian</label>
                                            <input required type="date" class="form-control form-control-solid" name="tanggalpembelianlainnya" id="tanggalpembelianlainnya" placeholder="Masukkan Tanggal Pembelian" />
                                            <input style="display: none;" value="<?= user()->username ?>" type="text" name="created_bypembelianlainnya" name="" id="">
                                        </div>
                                        <div class="mb-10">
                                            <label for="totalpembelianlainnya" class="required form-label">Total</label>
                                            <input required type="text" class="form-control form-control-solid money" id="totalpembelianlainnya" name="totalpembelianlainnya" placeholder="Total Transaksi Operasional" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipembelian" class=" form-label">Keterangan Pembelian</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipembelian" placeholder="Masukkan Deskripsi Pembelian" id="deskripsipembelianlainnya" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="simpan_pembelianlainnya" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modalselect" tabindex="-1" id="modaleditpembelianlainnya">
    <div class="modal-dialog">
        <div class="modal-content shadow-none">
            <form action="/edit/pembelianlainnya" method="POST" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Transaksi Operasional</h3>
                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-light">
                                        Action
                                    </button>
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-10">
                                            <label for="tanggalpembelianlainnya" class="required form-label">Tanggal Pembelian</label>
                                            <input required type="date" class="form-control form-control-solid" name="tanggalpembelianlainnya" id="edittanggalpembelianlainnya" placeholder="Masukkan Tanggal Pembelian" />
                                            <input style="display: none;" value="<?= user()->username ?>" type="text" name="created_bypembelianlainnya" name="" id="">
                                        </div>
                                        <div class="mb-10">
                                            <label for="totalpembelianlainnya" class="required form-label">Total</label>
                                            <input required type="text" class="form-control form-control-solid money" id="edittotalpembelianlainnya" name="totalpembelianlainnya" placeholder="Total Transaksi Operasional" />
                                            <input style="display: none;" required type="text" class="form-control form-control-solid money " id="edit_id_pembelianlainnya" name="id_pembelianlainnya" placeholder="Total Transaksi Operasional" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipembelian" class=" form-label">Keterangan Pembelian</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipembelian" placeholder="Masukkan Deskripsi Pembelian" id="editdeskripsipembelianlainnya" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="simpan_editpembelianlainnya" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" id="modaldetailpembelian" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="tempdatadetailpembelian" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pembelian</h3>
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
                                            <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahpembelianlainnya">
                                                Retur Pembelian
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-10">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="detail_kodepembelian" class="required form-label">Kode Pembelian</label>
                                                        <input required type="text" class="form-control form-control-solid" name="detail_kode_pembelian" id="detail_kode_pembelian">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="detailtanggalpembelian" class="required form-label">Tanggal Pembelian</label>
                                                        <input required type="date" class="form-control form-control-solid" name="tanggalpembelian" id="detailtanggalpembelian" placeholder="Masukkan Tanggal Pembelian" />
                                                        <input type="text" style="display: none;" name="detail_id_pembelian" id="detail_id_pembelian">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-10">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="detailno_notapembelian" class="required form-label">No Nota Pembelian</label>
                                                        <input required type="text" class="form-control form-control-solid" id="detailno_notapembelian" name="no_nota" placeholder="Masukkan Nomor Nota Pembelian" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="detailsupplierpembelian" class="required form-label">Supplier</label>
                                                        <select disabled required class="form-select form-select-solid" id="detailsupplierpembelian" name="detailsupplier" data-control="select2" data-placeholder="Pilih Supplier" data-allow-clear="true">
                                                            <option></option>
                                                            <?php foreach ($supplier as $sup) : ?>
                                                                <option value="<?= $sup['id_supplier'] ?>"><?= $sup['supplier'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="">
                                                <label for="detaildeskripsipembelian" class=" form-label">Deskripsi Pembelian</label>
                                                <textarea class="form-control form-control-solid" name="deskripsipembelian" placeholder="Masukkan Deskripsi Pembelian" id="detaildeskripsipembelian" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="table-repsonsive d-none" id="content-detail-1">
                                        <span id="error"></span>
                                        <table class="table table-bordered" id="item_detail_table">
                                            <thead>
                                                <tr>
                                                    <th>Enter Item Name</th>
                                                    <th>Enter Quantity</th>
                                                    <th>Satuan</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Netto</th>
                                                    <th>Jumlah</th>
                                                    <th><button type="button" name="add-detail-table" class="btn btn-success btn-sm add-detail-table"><i class="fas fa-plus"></i></button></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <table width="100%" id="grand_total" class="">
                                            <tbody>
                                                <tr class="fw-bolder fs-6">
                                                    <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td align="right" colspan="2" id="detailtotalpembelian" class="text-danger fs-3"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <!-- <div align="center">
                                                <input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />
                                            </div> -->

                                    </div>
                                    <div class="row mb-10 d-none" id="content-detail-2">
                                        <div class="table-responsive card card-flush shadow-sm">
                                            <div class="card-body">
                                                <table id="table_detailpembelian_stok_obat1" class="table table-bordered table-row-bordered gx-7">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-muted">
                                                            <th>Nama Obat</th>
                                                            <th>Kuantitas</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Diskon</th>
                                                            <th>Netto</th>
                                                            <th>Sub Total</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body_table_detailpembelian_stok_obat1">

                                                    </tbody>

                                                </table>
                                                <table width="100%" id="grand_total1" class="">
                                                    <tbody>
                                                        <tr class="fw-bolder fs-6">
                                                            <td colspan="3" class="text-nowrap align-end">Total:</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="right" colspan="2" id="detailtotalpembelian1" class="text-danger fs-3"></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">

                                    <div class="">
                                        <label for="detailtotalbayarpembelian" class="required form-label">Total Terbayarkan</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="detailtotalbayarpembelian" placeholder="Total Bayar" />
                                    </div>
                                    <div>
                                        <label for="detailtotalhutangpembelian" class="required form-label">Total Hutang</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalhutang" id="detailtotalhutangpembelian" placeholder="" />
                                    </div>
                                    <div>
                                        <label for="detailtotalkembalianpembelian" class="required form-label">Total Kembalian</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="detailtotalkembalianpembelian" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="modal-footer-detailpembelian">
                    <button type="button" id="close_edit_pembelian" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_edit_pembelian" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modaldeletepembelian">
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
            <form action="/hapus/stok_in" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_pembelian" id="id_hapuspembelian">
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