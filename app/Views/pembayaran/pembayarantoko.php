<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-pembelian-stok-tab" data-bs-toggle="tab" data-bs-target="#pembelian-stok" type="button" role="tab" aria-controls="nav-pembelian-stok" aria-selected="true">Pembayaran Toko</button>
                <!-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hibah Stok Obat</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Keterangan</button> -->
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pembelian-stok" role="tabpanel" aria-labelledby="pembelian-stok-tab">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Data Pembayaran Toko</h3>
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
                                    <a type="button" href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#modaltambahpembayarantoko">
                                        Tambah
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" id="btn-lihat-modal-sampah-pembayaran-toko" data-bs-toggle="modal" data-bs-target="#modalsampahpembayarantoko">
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
                                <table id="table_pembayarantoko" class="table table-bordered table-striped table-row-bordered gx-7 table-sm">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Kode Pembayaran</th>
                                            <th>Kode Pembelian</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total Pembayaran</th>
                                            <th>Created By</th>

                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>No</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Kode Pembayaran</th>
                                            <th>Kode Pembelian</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total Pembayaran</th>
                                            <th>Created By</th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> -->
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" id="modaltambahpembayarantoko">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="tempdatapembelian">
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Data Pembayaran Toko</h3>
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
                                            <label for="tanggalpembayarantoko" class="required form-label">Tanggal Pembayaran</label>
                                            <input required type="date" class="form-control form-control-solid" name="tanggalpembayarantoko" id="tanggalpembayarantoko" placeholder="Masukkan Tanggal Pembayaran Toko" />
                                            <input style="display: none;" value="<?= user()->username ?>" type="text" name="" id="id">
                                            <input style="display: none;" type="text" name="" id="kode_pembelian_pembayarantoko">
                                        </div>
                                        <div class="mb-10">
                                            <label for="pembelian_id" class="required form-label">Kode Pembelian</label>
                                            <select required data-dropdown-parent="#modaltambahpembayarantoko > .modal-dialog > .modal-content" class="form-select form-select-solid" id="pembelian_id" name="pembelian_id" data-control="select2" data-placeholder="Pilih Kode Pembelian" data-allow-clear="true">
                                                <option></option>

                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="sisahutangpembayarantoko" class="required form-label">Sisa Hutang</label>
                                                <input required readonly type="text" class="form-control form-control-solid" id="sisahutangpembayarantoko" name="sisahutangpembayarantoko" placeholder="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="supplierpembelianpembayarantoko" class="required form-label">Supplier</label>
                                                <input required readonly type="text" class="form-control form-control-solid" id="supplierpembelianpembayarantoko" name="supplierpembelian" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipembayarantoko" class=" form-label">Deskripsi Pembayaran</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipembayarantoko" placeholder="Masukkan Deskripsi Pembayaran Toko" id="deskripsipembayarantoko" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_pembayarantoko_view" class="table table-bordered table-row-bordered gx-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>No</th>
                                                        <th>Nama Obat</th>
                                                        <th>Kuantitas</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Diskon</th>
                                                        <th>Netto</th>
                                                        <th>Sub Total</th>
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
                                                        <td></td>
                                                        <td align="right" colspan="2" id="viewtotalpembayarantoko" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">
                                    <div class="mr">
                                        <label for="metodepembayaranpembayarantoko" class="required form-label">Metode Pembayaran</label>
                                        <select data-dropdown-parent="#modaltambahpembayarantoko > .modal-dialog > .modal-content" required class="form-select form-select-solid" id="metodepembayaranpembayarantoko" name="metodepembayaran" data-control="select2" data-placeholder="Pilih Metode Pembayaran" data-allow-clear="true">
                                            <option></option>
                                            <option value="CASH">CASH</option>
                                            <option value="DEBIT">DEBIT</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="totalbayar" class="required form-label">Total Bayar</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="totalbayarpembayarantoko" placeholder="Total Bayar" />
                                    </div>
                                    <div>
                                        <label for="totalkembalian" class="required form-label">Kembalian</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="totalkembalianpembayarantoko" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_pembayarantoko" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" id="modalsampahpembayarantoko">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Pembayaran Toko</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table style="width:100%" id="table_sampah_pembayarantoko" class="table table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Kode Pembelian</th>
                                <th>Metode Pembayaran</th>
                                <th>Total Pembayaran</th>
                                <th>Created By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Kode Pembelian</th>
                                <th>Metode Pembayaran</th>
                                <th>Total Pembayaran</th>
                                <th>Created By</th>
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

<div class="modal fade" tabindex="-1" id="modaleditpembayarantoko">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="card card-flush shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Pembayaran Toko</h3>
                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-light">
                                        Action
                                    </button>
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mb-10">
                                            <div class="col-md-6">
                                                <label for="tanggalpembayarantoko" class="required form-label">Tanggal Pembayaran </label>
                                                <input readonly required type="text" class="form-control form-control-solid" name="tanggalpembayarantoko" id="edittanggalpembayarantoko" placeholder="Masukkan Tanggal Pembayaran Toko" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggalpembayarantoko" class="required form-label">Tanggal Pembayaran Baru</label>
                                                <input required type="date" class="form-control form-control-solid" name="tanggalpembayarantokobaru" id="edittanggalpembayarantokobaru" placeholder="Masukkan Tanggal Pembayaran Toko" />
                                                <input style="display: none;" value="<?= user()->username ?>" type="text" name="" id="editid">
                                                <input style="display: none;" type="text" name="" id="editid_pembayarantoko">
                                            </div>
                                        </div>
                                        <div class="mb-10">

                                        </div>
                                        <div class="form-group row mb-10">
                                            <div class="col-md-6">
                                                <label for="editkodepembelian" class="required form-label">Kode Pembelian</label>
                                                <input required readonly type="text" class="form-control form-control-solid" id="editkodepembelian" name="editkodepembelian" placeholder="" />
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="pembelian_id" class="required form-label">Kode Pembelian Baru</label>
                                                <select required data-dropdown-parent="#modaleditpembayarantoko > .modal-dialog > .modal-content" class="form-select form-select-solid" id="editpembelian_id" name="pembelian_id" data-control="select2" data-placeholder="Pilih Kode Pembelian" data-allow-clear="true">
                                                    <option></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="sisahutangpembayarantoko" class="required form-label">Sisa Hutang</label>
                                                <input required readonly type="text" class="form-control form-control-solid" id="editsisahutangpembayarantoko" name="sisahutangpembayarantoko" placeholder="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="supplierpembelianpembayarantoko" class="required form-label">Supplier</label>
                                                <input required readonly type="text" class="form-control form-control-solid" id="editsupplierpembelianpembayarantoko" name="supplierpembelian" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="deskripsipembayarantoko" class=" form-label">Deskripsi Pembayaran</label>
                                            <textarea class="form-control form-control-solid" name="deskripsipembayarantoko" placeholder="Masukkan Deskripsi Pembayaran Toko" id="editdeskripsipembayarantoko" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_editpembayarantoko_view" class="table table-bordered table-row-bordered gx-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>No</th>
                                                        <th>Nama Obat</th>
                                                        <th>Kuantitas</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Diskon</th>
                                                        <th>Netto</th>
                                                        <th>Sub Total</th>
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
                                                        <td></td>
                                                        <td align="right" colspan="2" id="editviewtotalpembayarantoko" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">
                                    <div class="mr">
                                        <label for="metodepembayaranpembayarantoko" class="required form-label">Metode Pembayaran</label>
                                        <select data-dropdown-parent="#modaleditpembayarantoko > .modal-dialog > .modal-content" required class="form-select form-select-solid" id="editmetodepembayaranpembayarantoko" name="metodepembayaran" data-control="select2" data-placeholder="Pilih Metode Pembayaran" data-allow-clear="true">
                                            <option></option>
                                            <option value="CASH">CASH</option>
                                            <option value="DEBIT">DEBIT</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="totalbayar" class="required form-label">Total Bayar</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="edittotalbayarpembayarantoko" placeholder="Total Bayar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="edit_pembayarantoko" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="modal fade" tabindex="-1" id="modaldetailpembelian">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-none">
            <form id="">
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
                                            <label for="detailtanggalpembelian" class="required form-label">Tanggal Pembelian</label>
                                            <input readonly required type="date" class="form-control form-control-solid" name="tanggalpembelian" id="detailtanggalpembelian" placeholder="Masukkan Tanggal Pembelian" />
                                        </div>
                                        <div class="mb-10">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="detailno_notapembelian" class="required form-label">No Nota Pembelian</label>
                                                    <input readonly required type="text" class="form-control form-control-solid" id="detailno_notapembelian" name="no_nota" placeholder="Masukkan Nomor Nota Pembelian" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="detailsupplierpembelian" class="required form-label">Supplier</label>
                                                    <select disabled required class="form-select form-select-solid" id="detailsupplierpembelian" name="detailsupplier" data-control="select2" data-placeholder="Pilih Supplier" data-allow-clear="true">
                                                        <option></option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="">
                                            <label for="detaildeskripsipembelian" class=" form-label">Deskripsi Pembelian</label>
                                            <textarea readonly class="form-control form-control-solid" name="deskripsipembelian" placeholder="Masukkan Deskripsi Pembelian" id="detaildeskripsipembelian" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-10">
                                    <div class="table-responsive card card-flush shadow-sm">
                                        <div class="card-body">
                                            <table id="table_detailpembelian_stok_obat" class="table table-bordered table-row-bordered gx-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-muted">
                                                        <th>No</th>
                                                        <th>Nama Obat</th>
                                                        <th>Kuantitas</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Diskon</th>
                                                        <th>Netto</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body_table_detailpembelian_stok_obat">

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
                                                        <td align="right" colspan="2" id="detailtotalpembelian" class="text-danger fs-3"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end">
                                    <div class="mr">
                                        <label for="detailmetodepembayarpembelian" class="required form-label">Metode Pembayaran</label>
                                        <select required class="form-select form-select-solid" id="detailmetodepembayarpembelian" name="metodepembayaran" data-control="select2" data-placeholder="Pilih Metode Pembayaran" data-allow-clear="true">
                                            <option></option>
                                            <option value="CASH">CASH</option>
                                            <option value="DEBIT">DEBIT</option>
                                            <option value="KREDIT">KREDIT</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="detailtotalbayarpembelian" class="required form-label">Total Bayar</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalbayar" id="detailtotalbayarpembelian" placeholder="Total Bayar" />
                                    </div>
                                    <dibel for="detailtotalkembalianpembelian" class="required form-label">Kembalian</label>
                                        <input readonly required type="text" class="form-control form-control-solid money" name="totalkembalian" id="detailtotalkembalianpembelian" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="simpan_detailpembelian" class="btn btn-primary">Simpan</button>
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

                
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
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
</div> -->


<?= $this->endSection() ?>