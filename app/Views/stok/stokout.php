<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-penjualan-stok-tab" data-bs-toggle="tab" data-bs-target="#penjualan-stok" type="button" role="tab" aria-controls="nav-penjualan-stok" aria-selected="true">Penjualan Stok Obat</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hibah Stok Obat</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Keterangan</button>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="penjualan-stok" role="tabpanel" aria-labelledby="penjualan-stok-tab">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Data Penjualan Obat</h3>
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
                                    <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahpenjualan">
                                        Tambah
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-penjualan" data-bs-toggle="modal" data-bs-target="#modalsampahpenjualan">
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
                                <table id="table_penjualan" class="table table-bordered table-striped table-row-bordered table-sm">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Kode Penjualan</th>
                                            <th>Customer</th>
                                            <th>Grand Total</th>
                                            <th>Hutang Sisa</th>
                                            <th>Status Penjualan</th>
                                            <th>Created by</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Kode Penjualan</th>
                                            <th>Customer</th>
                                            <th>Grand Total</th>
                                            <th>Hutang Sisa</th>
                                            <th>Status Penjualan</th>
                                            <th>Created by</th>
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

<div class="modal fade" tabindex="-1" id="modaldetailpenjualan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Header</h3>
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
                                            <a type="button" id="btn-print-struk" class="menu-link px-3">
                                                Print Struk
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-10">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="detailkodepenjualan" class="required form-label">Kode Penjualan</label>
                                                    <input type="text" readonly required class="form-control form-control-solid" name="detail_kode_penjualan" id="detail_kode_penjualan">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="detailtanggalpenjualan" class="required form-label">Tanggal Penjualan</label>
                                                    <input readonly required type="date" class="form-control form-control-solid" name="tanggalpenjualan" id="detailtanggalpenjualan" placeholder="Masukkan Tanggal Penjualan" />
                                                    <input type="text" style="display: none;" name="detail_id_penjualan" id="detail_id_penjualan">

                                                    <input style="display: none;" type="number" name="" id="minstokdetailpenjualan">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-10">
                                            <label for="detailcustomerpenjualan" class="required form-label">Customer</label>
                                            <select disabled required class="form-select form-select-solid" id="detailcustomerpenjualan" name="detailcustomer" data-control="select2" data-placeholder="Pilih Customer" data-allow-clear="true">
                                                <option></option>
                                                <?php foreach ($customer as $custom) : ?>
                                                    <option value="<?= $custom['id_customer'] ?>"><?= $custom['customer'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="detaildeskripsipenjualan" class=" form-label">Deskripsi Penjualan</label>
                                            <textarea readonly class="form-control form-control-solid" name="deskripsipenjualan" placeholder="Masukkan Deskripsi Penjualan" id="detaildeskripsipenjualan" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-10 d-none" id="edit_barang_out">

                                    <div class="col-md-4">
                                        <label for="namaobat" class="required form-label">Nama Obat</label>
                                        <select data-dropdown-css-class="w-800px" data-dropdown-parent="#modaldetailpenjualan > .modal-dialog > .modal-content " required class="form-select form-select-solid" id="namadetailobatpenjualan" name="namaobat" data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="sisastok" class="required form-label">Sisa Stok</label>
                                        <input required readonly class="form-control form-control-solid" type="number" name="" id="sisastokdetailpenjualan">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="qtypenjualan" class="required form-label">Jumlah</label>
                                        <input required type="number" class="form-control form-control-solid" id="qtydetailpenjualan" name="qtypenjualan" placeholder="Kuantitas" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hargapenjualan" class="required form-label">Harga</label>
                                        <input required type="text" class="form-control form-control-solid money" id="hargadetailpenjualan" name="hargapenjualan" placeholder="Harga" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="diskonpenjualan" class="required form-label">Diskon</label>
                                        <div class="input-group input-group-solid">
                                            <input step="any" required type="number" class="form-control form-control-solid" id="diskondetailpenjualan" name="diskonpenjualan" placeholder="Diskon" aria-describedby="basic-addon2" />
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <br>
                                        <button type="button" id="tambah_detailpenjualan_table" class="btn btn-primary">Tambah</button>
                                    </div>

                                </div>
                                <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_detailpenjualan_stok_obat" class="table table-bordered table-row-bordered gx-7">
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
                                                <tbody id="body_table_detailpenjualan_stok_obat">

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
                                                        <td></td>
                                                        <td align="right" colspan="2" id="detailtotalpenjualan" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">
                                    <div class="">
                                        <label for="detailtotalbayarpenjualan" class="required form-label">Total Terbayarkan</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="detailtotalbayarpenjualan" placeholder="Total Bayar" />
                                    </div>
                                    <div>
                                        <label for="detailtotalhutangpenjualan" class="required form-label">Total Hutang</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalhutang" id="detailtotalhutangpenjualan" placeholder="" />
                                    </div>
                                    <div>
                                        <label for="detailtotalkembalianpenjualan" class="required form-label">Total Kembalian</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="detailtotalkembalianpenjualan" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="modal-footer-detailpenjualan">
                    <button type="button" id="close_edit_penjualan" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_edit_penjualan" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" id="modaltambahpenjualan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="tempdatapenjualan" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Header</h3>
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
                                            <label for="tanggalpenjualan" class="required form-label">Tanggal Penjualan</label>
                                            <input required readonly value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control form-control-solid" name="tanggalpenjualan" id="tanggalpenjualan" placeholder="Masukkan Tanggal Penjualan" />
                                            <input style="display: none;" value="<?= user()->username ?>" type="text" name="" id="id">
                                            <input style="display: none;" type="number" name="" id="minstokpenjualan">
                                            <input type="text" style="display: none;" id="buat_kode_penjualan" value="<?= $kode_penjualan ?>">
                                        </div>
                                        <div class="mb-10">
                                            <label for="customerpenjualan" class="required form-label">Customer</label>
                                            <select data-dropdown-parent="#modaltambahpenjualan > .modal-dialog > .modal-content " required class="form-select form-select-solid" id="customerpenjualan" name="customer" data-control="select2" data-placeholder="Pilih Customer" data-allow-clear="true">
                                                <option></option>
                                                <?php foreach ($customer as $custom) : ?>
                                                    <option value="<?= $custom['id_customer'] ?>"><?= $custom['customer'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipenjualan" class=" form-label">Deskripsi Penjualan</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipenjualan" placeholder="Masukkan Deskripsi Penjuakan" id="deskripsipenjualan" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="post" id="insert_form_penjualan">
                                        <div class="table-repsonsive">
                                            <span id="error"></span>
                                            <table class="table table-bordered" id="item_table_penjualan">
                                                <tr>
                                                    <th>Enter Item Name</th>
                                                    <th>Enter Quantity</th>
                                                    <th>Satuan</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Netto</th>
                                                    <th>Jumlah</th>
                                                    <th><button type="button" name="addpenjualan" class="btn btn-success btn-sm addpenjualan"><i class="fas fa-plus"></i></button></th>
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
                                                        <td align="right" colspan="2" id="totalpenjualan" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!-- <div align="center">
                                                <input type="submit" name="submit" id="submit_button" class="btn btn-primary" value="Insert" />
                                            </div> -->

                                        </div>
                                        <div class="d-flex float-end">
                                            <div class="mr">
                                                <label for="metodepembayaran" class="required form-label">Metode Pembayaran</label>
                                                <select data-dropdown-parent="#modaltambahpenjualan > .modal-dialog > .modal-content " required class="form-select form-select-solid" id="metodepembayaranpenjualan" name="metodepenjualan" data-control="select2" data-placeholder="Pilih Metode Penjualan" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="CASH">CASH</option>
                                                    <option value="DEBIT">DEBIT</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <label for="totalbayar" class="required form-label">Total Bayar</label>
                                                <input readonly required type="text" class="form-control form-control-solid money" name="totalbayarpenjualan" id="totalbayarpenjualan" placeholder="Total Bayar" />
                                            </div>
                                            <div class="">
                                                <label for="totalkembalianpenjualan" class="required form-label">Kembalian</label>
                                                <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="totalkembalianpenjualan" placeholder="" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="row mb-10">

                                    <div class="col-md-4">
                                        <label for="namaobat" class="required form-label">Nama Obat</label>
                                        <select data-dropdown-css-class="w-800px" data-dropdown-parent="#modaltambahpenjualan > .modal-dialog > .modal-content " required data-dropdown-parent="#modaltambahpenjualan" class="form-select form-select-solid" id="namaobatpenjualan" name="namaobat" data-control="select2" data-placeholder="Pilih Obat" data-allow-clear="true">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="sisastokpenjualan" class="required form-label">Sisa Stok</label>
                                        <input readonly required type="text" class="form-control form-control-solid" id="sisastokpenjualan" name="stoksisa" placeholder="Stok" />
                                    </div>
                                    <div class="col-md-1">
                                        <label for="qtypenjualan" class="required form-label">Jumlah</label>
                                        <input required type="number" class="form-control form-control-solid" id="qtypenjualan" name="qtypenjualan" placeholder="Kuantitas" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hargapenjualan" class="required form-label">Harga</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" id="hargapenjualan" name="hargapenjualan" placeholder="Harga" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="diskonpenjualan" class="required form-label">Diskon</label>
                                        <div class="input-group input-group-solid">
                                            <input step="any" required type="number" class="form-control form-control-solid" id="diskonpenjualan" name="diskonpenjualan" placeholder="Diskon" aria-describedby="basic-addon2" />
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <br>
                                        <button type="button" id="tambah_penjualan_table" class="btn btn-primary">Tambah</button>
                                    </div>

                                </div>
                                <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_penjualan_stok_obat" class="table table-bordered table-row-bordered gx-7">
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
                                                        <td align="right" colspan="2" id="totalpenjualan" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">
                                    <div class="mr">
                                        <label for="metodepembayaran" class="required form-label">Metode Pembayaran</label>
                                        <select data-dropdown-parent="#modaltambahpenjualan > .modal-dialog > .modal-content " required data-dropdown-parent="#modaltambahjalan" class="form-select form-select-solid" id="metodepembayaranpenjualan" name="metodepenjualan" data-control="select2" data-placeholder="Pilih Metode Penjualan" data-allow-clear="true">
                                            <option></option>
                                            <option value="CASH">CASH</option>
                                            <option value="DEBIT">DEBIT</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="totalbayar" class="required form-label">Total Bayar</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayarpenjualan" id="totalbayarpenjualan" placeholder="Total Bayar" />
                                    </div>
                                    <div class="">
                                        <label for="totalkembalianpenjualan" class="required form-label">Kembalian</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="totalkembalianpenjualan" placeholder="" />
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_penjualan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalsampahpenjualan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Penjualan</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width:100%" id="table_sampah_penjualan" class="table table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Tanggal Penjualan</th>
                                <th>Kode Penjualan</th>
                                <th>Customer</th>
                                <th>Grand Total</th>

                                <th>Hutang Sisa</th>
                                <th>Status Penjualan</th>
                                <th>Created by</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Tanggal Penjualan</th>
                                <th>Kode Penjualan</th>
                                <th>Customer</th>
                                <th>Grand Total</th>

                                <th>Hutang Sisa</th>
                                <th>Status Penjualan</th>
                                <th>Created by</th>
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






<div class="modal fade" tabindex="-1" id="modaldeletepenjualan">
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
                    <input type="text" style="display: none;" name="id_penjualan" id="id_hapuspenjualan">
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