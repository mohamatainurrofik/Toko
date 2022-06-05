<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::About card-->
        <div class="card mb-10">
            <div class="card-header">
                <h3 class="card-title">Form Laporan</h3>
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
                            <a type="button" class="menu-link px-3" id="lihat_laporan">
                                Lihat
                            </a>
                            <a type="button" class="menu-link px-3" onclick="window.print()">Print</a>
                        </div>

                    </div>
                </div>
            </div>
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::About-->
                <div class="mb-18">
                    <!--begin::Wrapper-->

                    <div class=" mb-10">
                        <label class="required mb-10" for="">Pilih Laporan</label>
                        <div class="row mb-10">
                            <div class="col-md-3 mb-10 ms-0">
                                <div class="form-check form-check-inline ms-5">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio1" value="Penjualan">
                                    <label class="form-check-label" for="inlineRadio1">Laporan Penjualan Obat</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio2" value="Pembelian">
                                    <label class="form-check-label" for="inlineRadio2">Laporan Pembelian Obat</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio4" value="Labarugi">
                                    <label class="form-check-label" for="inlineRadio4">Laporan Laba Rugi</label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio3" value="Neraca">
                                    <label class="form-check-label" for="inlineRadio3">Neraca Perdagangan </label>
                                </div>
                            </div>
                            <div class="col-md-3 ms-5 mb-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio5" value="Aruskas">
                                    <label class="form-check-label" for="inlineRadio5">Laporan Arus Kas </label>
                                </div>
                            </div>
                            <div class="col-md-3 ms-5 mb-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input laporan_tipe" type="radio" name="laporan_tipe" id="inlineRadio6" value="Perubahanmodal">
                                    <label class="form-check-label" for="inlineRadio5">Laporan Perubahan Modal </label>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="card d-none" id="card_laporan1">
            <div class="card-header">

                <h3 class="mt-3" id="laporan_title1">Laporan Arus Kas </h3>

                <h3 class="mt-3" id="periode1"></h3>
                <div class="card-toolbar">
                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" id="tanggal_laporan1" class="btn btn-sm btn-light d-flex align-items-center px-4">
                        <!--begin::Display range-->
                        <!--end::Display range-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                        <span class="svg-icon svg-icon-1 ms-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table_laporan1" class="table table-hover table-flush gy-5 gs-7  gx-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th>No</th>
                            <th>Uraian </th>
                            <th>Sub Total</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="body_table_laporan1">

                    </tbody>

                </table>
            </div>
        </div>

        <div class="card d-none" id="card_laporan2">
            <div class="card-header">

                <h3 class="mt-3" id="laporan_title1">Laporan Laba Rugi </h3>

                <h3 class="mt-3" id="periode2"></h3>
                <div class="card-toolbar">
                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" id="tanggal_laporan2" class="btn btn-sm btn-light d-flex align-items-center px-4">
                        <!--begin::Display range-->
                        <!--end::Display range-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                        <span class="svg-icon svg-icon-1 ms-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table_laporan2" class="table table-hover table-flush gy-5 gs-7  gx-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th>No</th>
                            <th>Uraian </th>
                            <th>Sub Total</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="body_table_laporan2">

                    </tbody>

                </table>
            </div>
        </div>

        <div class="card d-none" id="card_laporan">
            <div class="card-header">
                <h3 class="card-title" id="laporan_title"></h3>
                <div class="card-toolbar">
                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" id="tanggal_laporan" class="btn btn-sm btn-light d-flex align-items-center px-4">
                        <!--begin::Display range-->
                        <!--end::Display range-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                        <span class="svg-icon svg-icon-1 ms-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <!--begin::Body-->
            <div class="card-body  d-flex justify-content-between flex-column p-lg-17">
                <!--begin::About-->
                <div class="d-flex flex-wrap d-grid gap-5 px-9 mb-5">
                    <!--begin::Item-->
                    <div class="me-md-2">
                        <!--begin::Statistics-->
                        <div class="d-flex mb-2">
                            <span class="fs-4 fw-bold text-gray-400 me-1">Rp. </span>
                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="valuekotor"></span>
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-bold text-gray-400" id="tagkotor"></span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="border-start-dashed border-end-dashed border-1 border-gray-300 px-5 ps-md-10 pe-md-7 me-md-5">
                        <!--begin::Statistics-->
                        <div class="d-flex mb-2">
                            <span class="fs-4 fw-bold text-gray-400 me-1">Rp. </span>
                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="valuebersih"></span>
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-bold text-gray-400" id="tagbersih"></span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="m-0">
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-bold text-gray-400 align-self-start me-1">Rp. </span>
                            <!--end::Currency-->
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="valuepiutang"></span>
                            <!--end::Value-->
                            <!--begin::Label-->

                            <!--end::Label-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-bold text-gray-400" id="tagpiutang"></span>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                </div>
                <div class="mb-18">
                    <!--begin::Wrapper-->
                    <div class="mb-10">
                        <div id="kt_apexcharts_31" style="height: 350px;"></div>
                    </div>
                    <hr>
                    <div class="mb-10">
                        <table id="table_laporan" class="table table-hover table-row-bordered gy-5 gs-7  gx-7">
                            <thead>
                                <tr class="fw-bold fs-6 text-muted">
                                    <th>No</th>
                                    <th>Tanggal </th>
                                    <th>Total</th>
                                    <th>Total Hutang / Piutang</th>
                                </tr>
                            </thead>
                            <tbody id="body_table_laporan">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" tabindex="-1" id="modaltambahjenis">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Jenis Obat</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/simpan/jenisobat" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <label for="namajenis" class="required form-label">Nama Jenis Obat</label>
                        <input required type="text" class="form-control form-control-solid" name="namajenis" placeholder="Masukkan Nama Jenis Obat" />
                    </div>
                    <div class="mb-10">
                        <label for="deskripsijenis" class=" form-label">Deskripsi Jenis Obat</label>
                        <textarea class="form-control form-control-solid" name="deskripsijenis" placeholder="Masukkan Deskripsi Jenis Obat" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modalsampahjenis">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Sampah Jenis Obat</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2 " data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="mb-10">
                    <table id="table_sampah_jenis_obat" class="table table-bordered table-row-bordered gx-7">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Nama Jenis Obat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>Nama Jenis Obat</th>
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

<div class="modal fade" tabindex="-1" id="modaleditjenis">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Jenis Obat</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="/edit/jenisobat" method="post">
                <div class="modal-body">
                    <div class="mb-10">
                        <input style="display: none;" type="text" name="id_jenis" id="id_jenisobat">
                        <label for="namajenis" class="required form-label">Nama Jenis Obat</label>
                        <input required type="text" class="form-control form-control-solid" id="namajenisobat" name="namajenis" placeholder="Masukkan Nama Jenis Obat" />
                    </div>
                    <div class="mb-10">
                        <label for="deskripsijenis" class=" form-label">Deskripsi Kategori</label>
                        <textarea class="form-control form-control-solid" name="deskripsijenis" id="deskripsijenisobat" placeholder="Masukkan Deskripsi Jenis Obat" id="" cols="30" rows="2"></textarea>
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

<div class="modal fade" tabindex="-1" id="modaldeletejenis">
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
            <form action="/hapus/jenisobat" method="post">
                <div class="modal-body">
                    <p>Klik Hapus untuk Melakukan Hapus</p>
                    <input type="text" style="display: none;" name="id_jenis" id="id_hapusjenis">
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