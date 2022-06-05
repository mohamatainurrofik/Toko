<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Menu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'parent_id_menu'     => null,
                'title'       => 'Dashboard',
                'url' => '/',
                'menuorder'     => 0,
                'level'   => 0,
                'icon'   => '<span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                             </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => null,
                'title'       => 'Master',
                'url' => '#',
                'menuorder'     => 1,
                'level'   => 0,
                'icon'   => '<span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                </svg>
                             </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Obat',
                'url' => '/master/obat',
                'menuorder'     => 0,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Kategori Obat',
                'url' => '/master/kategoriobat',
                'menuorder'     => 1,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Jenis Obat',
                'url' => '/master/jenisobat',
                'menuorder'     => 2,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Satuan',
                'url' => '/master/satuan',
                'menuorder'     => 3,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Supplier',
                'url' => '/master/supplier',
                'menuorder'     => 4,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 2,
                'title'       => 'Customer',
                'url' => '/master/customer',
                'menuorder'     => 5,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => null,
                'title'       => 'Account',
                'url' => '#',
                'menuorder'     => 2,
                'level'   => 0,
                'icon'   => '<span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                </g>
                </svg>
                </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 9,
                'title'       => 'Account',
                'url' => '/account/account',
                'menuorder'     => 0,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 9,
                'title'       => 'Roles',
                'url' => '/account/roles',
                'menuorder'     => 1,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => 9,
                'title'       => 'Permissions',
                'url' => '/account/permissions',
                'menuorder'     => 2,
                'level'   => 1,
                'icon'   => '<span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>',
                'deskripsi_menu'   => null,
            ],
            [
                'parent_id_menu'     => null,
                'title'       => 'Stok',
                'url' => '#',
                'menuorder'     => 3,
                'level'   => 0,
                'icon'   => '<span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z" fill="#7E8299" />
                                        <path d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z" fill="#7E8299" />
                                        <path d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z" fill="#7E8299" />
                                        <path d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z" fill="#7E8299" />
                                        <g opacity="0.25">
                                            <path d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z" fill="#7E8299" />
                                            <path d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z" fill="#7E8299" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                             </span>',
                'deskripsi_menu'   => null,
            ],
        ];
        $this->db->table('menu')->insertBatch($data);
    }
}
