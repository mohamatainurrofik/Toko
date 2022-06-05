<!--begin::Aside-->
<div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src=" <?= base_url('media/technology-logos/Angular.png') ?> " class="max-h-20px logo-default" />
            <img alt="Logo" src=" <?= base_url('media/technology-logos/Angular.png') ?> " class="max-h-20px logo-minimize" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid px-3 px-lg-6">
        <!--begin::Aside Menu-->
        <!--begin::Menu-->
        <div class="menu menu-column menu-pill menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 menu-active-bg-primary fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
            <div class="hover-scroll-y me-n3 pe-3" id="kt_aside_menu_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="20px">
                <?php

                use App\Models\Menu;

                $this->menu = new Menu();
                $menu = $this->menu->get_all_menu(user()->id);
                foreach ($menu['menu'] as $key => $value) { ?>
                    <?php if ($value['url'] != '#') { ?>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <div class="menu-item mb-1">
                                <a class="menu-link " href="<?= $value['url'] ?>">
                                    <?= $value['icon'] ?>
                                    <span class="menu-title"><?= $value['title'] ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <span class="menu-link">
                                <?= $value['icon'] ?>
                                <span class="menu-title"><?= $value['title'] ?></span>
                                <span class="menu-arrow"></span>
                            </span>
                            <?php foreach ($menu['sub_menu'] as $key1 => $value1) { ?>
                                <?php if ($value1['parent_id_menu'] == $value['id_menu']) { ?>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="<?= $value1['url'] ?>">
                                                <?= $value1['icon'] ?>
                                                <span class="menu-title"><?= $value1['title'] ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } else {
                                    continue;
                                } ?>
                            <?php } ?>

                        </div>
                <?php }
                } ?>

            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside menu-->

</div>
<!--end::Aside-->