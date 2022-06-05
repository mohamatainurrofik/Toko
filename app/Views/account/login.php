<!DOCTYPE html>
<html lang="en">

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
    <!--end::Global Stylesheets Bundle-->


</head>

<body id="kt_body" class="bg-dark">
    <div class="d-flex flex-column flex-root">

        <div class="d-flex flex-column flex-lg-row flex-column-fluid">



            <div class="d-flex flex-column flex-lg-row-fluid py-10">

                <div class="d-flex flex-center flex-column flex-column-fluid">

                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">


                        <form action="<?= route_to('login') ?>" method="post" class="form w-100" id="kt_sign_in_form">
                            <?= csrf_field() ?>
                            <div class="text-center mb-8">

                                <h1 class="text-light mb-3"><?= lang('Auth.loginTitle') ?></h1>


                            </div>
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="fv-row mb-8">
                                    <label class="form-label fs-6 fw-bolder text-light"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control form-control-lg form-control-solid <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="fv-row mb-8">
                                    <label class="form-label fs-6 fw-bolder text-light"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input type="text" class="form-control form-control-lg form-control-solid <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-light fs-6 mb-0"><?= lang('Auth.password') ?></label>
                                    <a href="/rider-html-pro/authentication/base/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                            </div>
                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label"><?= lang('Auth.loginAction') ?></span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>

                            </div>
                        </form>
                    </div>

                </div>


            </div>

        </div>

    </div>

</body>

</html>