<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Rider Free  - Multipurpose Bootstrap 5 HTML Admin Dashboard Template
Upgrade to Pro: https://keenthemes.com/products/rider-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Rider Theme | Keenthemes</title>
    <meta name="description" content="Rider admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords" content="Rider, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <link rel="canonical" href="Https://preview.keenthemes.com/rider-free" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href=" <?= base_url('media/logos/favicon.ico') ?> " />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href=" <?= base_url('plugins/global/plugins.bundle.css') ?> " rel="stylesheet" type="text/css" />
    <link href="<?= base_url('css/style.bundle.css') ?>  " rel="stylesheet" type="text/css" />
    <link href=" <?= base_url('plugins/custom/datatables/datatables.bundle.css') ?> " rel="stylesheet" type="text/css" />
    <link href="<?= base_url('css/jquery.fulltable.css') ?>  " rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed dark-mode">
    <div class="swal" data-swal="<?= session()->get('message') ?>"></div>
    <div class="errorswal" data-errorswal="<?= session()->get('errormessage') ?>"></div>
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!-- sidebar -->
            <?= $this->include('layouts/sidebar') ?>
            <!-- end sidebar -->


            <!-- wrapper -->
            <?= $this->include('layouts/wrapper') ?>
            <!-- end wrapper -->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->

    <!--end::Activities drawer-->
    <!--begin::Exolore drawer toggle-->

    <!--end::Exolore drawer-->
    <!--end::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop rounded-circle" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src=" <?= base_url('plugins/global/plugins.bundle.js') ?> "></script>
    <script src=" <?= base_url('js/scripts.bundle.js') ?> "></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src=" <?= base_url('js/custom/widgets.js') ?> "></script>
    <script src=" <?= base_url('plugins/custom/datatables/datatables.bundle.js') ?>"></script>
    <script src=" <?= base_url('js/jquery.fulltable.js') ?> "></script>
    <script src=" <?= base_url('js/myscript.js') ?> "></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>