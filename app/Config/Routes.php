<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


/* #region route master */
$routes->get('/master/obat', 'Obat::index');
$routes->get('/master/kategoriobat', 'Master::viewmasterkategori');
$routes->get('/master/jenisobat', 'Master::viewmasterjenis');
$routes->get('/master/supplier', 'Master::viewmastersupplier');
$routes->get('/master/customer', 'Master::viewmastercustomer');
$routes->get('/master/satuan', 'Master::viewmastersatuan');
$routes->post('/simpan/kategoriobat', 'Master::addkategoriobat');
$routes->post('/simpan/jenisobat', 'Master::addjenisobat');
$routes->post('/simpan/satuan', 'Master::addsatuan');
$routes->post('/simpan/supplier', 'Master::addsupplier');
$routes->post('/simpan/customer', 'Master::addcustomer');
$routes->post('/simpan/obat', 'Obat::addobat');
$routes->post('/edit/kategoriobat', 'Master::editkategoriobat');
$routes->post('/edit/jenisobat', 'Master::editjenisobat');
$routes->post('/edit/satuan', 'Master::editsatuan');
$routes->post('/edit/supplier', 'Master::editsupplier');
$routes->post('/edit/customer', 'Master::editcustomer');
$routes->post('/edit/obat', 'Obat::editobat');
$routes->post('/hapus/kategoriobat', 'Master::deletekategoriobat');
$routes->post('/hapus/jenisobat', 'Master::deletejenisobat');
$routes->post('/hapus/satuan', 'Master::deletesatuan');
$routes->post('/hapus/supplier', 'Master::deletesupplier');
$routes->post('/hapus/customer', 'Master::deletecustomer');
$routes->post('/hapus/obat', 'Obat::deleteobat');
$routes->get('/restore/kategoriobat/(:segment)', 'Master::restorekategoriobat/$1');
$routes->get('/restore/jenisobat/(:segment)', 'Master::restorejenisobat/$1');
$routes->get('/restore/satuan/(:segment)', 'Master::restoresatuan/$1');
$routes->get('/restore/supplier/(:segment)', 'Master::restoresupplier/$1');
$routes->get('/restore/customer/(:segment)', 'Master::restorecustomer/$1');
$routes->get('/restore/obat/(:segment)', 'Obat::restoreobat/$1');
/* #endregion */

/* #region  route account */

$routes->get('/account/overview', 'Account::index');
$routes->get('/account/account', 'Account::viewmasteraccount');
$routes->get('/account/roles', 'Account::viewmasterroles');
$routes->get('/account/permissions', 'Account::viewmasterpermissions');
$routes->post('/simpan/roles', 'Account::addroles');
$routes->post('/simpan/permissions', 'Account::addpermissions');
$routes->post('/edit/user', 'Account::edituser');
$routes->post('/edit/roles', 'Account::editroles');
$routes->post('/edit/permissions', 'Account::editpermissions');
$routes->post('/hapus/user', 'Account::deleteuser');
$routes->post('/hapus/roles', 'Account::deleteroles');
$routes->post('/hapus/permissions', 'Account::deletepermissions');
$routes->get('/restore/user/(:segment)', 'Account::restoreuser/$1');

/* #endregion */


/* #region  route stok */
$routes->get('/stok/stok_in', 'Stok::viewstokin');
$routes->get('/stok/stok_out', 'Stok::viewstokout');
$routes->post('/simpan/pembelianlainnya', 'Stok::addpembelianlainnya');
$routes->post('/edit/pembelianlainnya', 'Stok::editpembelianlainnya');
$routes->get('/restore/pembelian/(:segment)', 'Stok::restorepembelian/$1');
$routes->get('/restore/penjualan/(:segment)', 'Stok::restorepenjualan/$1');
$routes->get('/stok/printstruk/(:segment)', 'Stok::prinstruk/$1');
/* #endregion */

/* #region  route pembayaran */
$routes->get('/pembayaran/pembayarantoko', 'Pembayaran::viewpembayarantoko');
$routes->get('/pembayaran/pembayarancustomer', 'Pembayaran::viewpembayarancustomer');
$routes->post('/edit/pembayarantoko', 'Pembayaran::editpembayarantoko');
$routes->get('/restore/pembayarantoko/(:segment)', 'Pembayaran::restorepembayarantoko/$1');
$routes->get('/restore/pembayarancustomer/(:segment)', 'Pembayaran::restorepembayarancustomer/$1');
/* #endregion */



/* #region  route cashflow */
$routes->get('/kas', 'Kas::index');
$routes->get('/bank', 'Kas::bank');
$routes->post('/simpan/cashflow', 'Kas::addcashflow');
$routes->get('/simpan/kas', 'Kas::addkas');
$routes->post('/edit/cashflow', 'Kas::editcashflow');
/* #endregion */


/* #region  route Laporan */
$routes->get('/laporan/formlaporan', 'Laporan::viewformlaporan');
/* #endregion */




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
