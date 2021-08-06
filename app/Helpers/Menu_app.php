<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Menu_app
{
    private static function set_menu($module_name = NULL, $title = NULL, $css_class = NULL, $target = NULL)
    {
        $structure = NULL;
        if ($module_name !== NULL || $module_name !== '')
            if ($css_class === NULL) {
                $structure = "<li><a href='" . $module_name  . "' " . $target . "><span class='sub-item'></span>" . $title . "</a></li>";
            } else {
                $structure = "<li class='" . $css_class . "'><a href='" . $module_name  . "'><span class='sub-item'></span>" . $title . "</a></li>";
            }

        return $structure;
    }
    private static function menu_single($module_name, $font, $title)
    {

        $structure = '<li class="nav-item">
							<a href="' . $module_name . '">
                                ' . $font . '
                            <p>' . $title . '</p>
								 
							</a>
						</li>';
        return $structure;
    }
    private static function parent_dropdown($judul, $icon = NULL)
    {
        $structure = '';
        if ($icon === NULL) {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-list"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        } else {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-' . $icon . '"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        }
        return $structure;
    }
    public static function tutup_menu()
    {
        $structure = '</ul>
        </div>
    </li>';
        return $structure;
    }

    public static function list_menu()
    {
        $menu = '';
        $tmlevel_id = Auth::user()->tmlevel_id;

        // switch ($tmlevel_id) {
        //     case 1:
        //         $menu .= ' 
        //             <li class="nav-section">
        //             <span class="sidebar-mini-icon">
        //                 <i class="fa fa-ellipsis-h"></i>
        //             </span>
        //             <h4 class="text-section">Dashboard</h4>
        //          </li>
        //             <li class="nav-item">
        //             <a data-toggle="collapse" href="#setting">
        //                 <i class="fas fa-list"></i>
        //                 <p>Master Data </p>
        //                 <span class="caret"></span>
        //             </a>
        //             <div class="collapse" id="setting">
        //                 <ul class="nav nav-collapse">
        //         ';
        //         $menu .= self::set_menu(route('master.unitkerja.index'), 'Unit kerja');
        //         $menu .= self::set_menu(route('master.uploaddownload.index'), 'Visi dan misi');
        //         $menu .= self::set_menu(route('master.uploaddownload.index'), 'Tujuan');
        //         $menu .= self::set_menu(route('master.sasaran.index'), 'Sasaran');
        //         $menu .= self::set_menu(route('master.indikatorsasaran.index'), 'Indikator Sasaran');
        //         $menu .= self::set_menu(route('master.targetkerja.index'), 'Target Kerja');
        //         $menu .= self::set_menu(route('master.targetpembiayaan.index'), 'Target Pembiayaan');
        //         $menu .= self::set_menu(route('master.capaiankerja.index'), 'Capaian Kerja');
        //         $menu .= self::set_menu(route('master.capaianpembiayaan.index'), 'Capaian Pembiayaan');
        //         $menu .= self::set_menu(route('master.realisasipembiayaan.index'), 'Realisasi Pembiayaan');
        //         $menu .= self::set_menu(route('master.programkegiatan.index'), 'Program & Kegiatan');


        //         $menu .= '
        //               </ul>
        //             </div>
        //         </li> 
        //         ';

        //         $menu .= self::menu_single(route('master.uploaddownload.index'), '<i class="fas fa-list"></i>', 'RENSTRA');
        //         $menu .= self::menu_single(route('master.tmparamterdoc.index'), '<i class="fas fa-copy"></i>', 'IKU');
        //         $menu .= self::menu_single(route('master.tahun.index'), '<i class="fas fa-copy"></i>', 'RKT');



        //         $menu .= self::menu_single(route('master.informasi.index'), '<i class="fas fa-copy"></i>', 'Informasi ');
        //         $menu .= self::menu_single(route('master.halaman.index'), '<i class="fas fa-desktop"></i>', 'Halaman');


        //         $menu .= self::menu_single(route('master.uploaddownload.index'), '<i class="fas fa-copy"></i>', 'Dokment SAKIP');
        //         $menu .= self::menu_single(route('master.tmparamterdoc.index'), '<i class="fas fa-copy"></i>', 'Paramater Doc');
        //         $menu .= self::menu_single(route('master.tahun.index'), '<i class="fas fa-copy"></i>', 'Setup tahun ');
        //         break;
        //     case 2:

        //         $menu .= ' 
        //             <li class="nav-section">
        //             <span class="sidebar-mini-icon">
        //                 <i class="fa fa-ellipsis-h"></i>
        //             </span>
        //             <h4 class="text-section">Master</h4>
        //          </li>
        //             <li class="nav-item">
        //             <a data-toggle="collapse" href="#setting">
        //                 <i class="fas fa-list"></i>
        //                 <p>Master Data </p>
        //                 <span class="caret"></span>
        //             </a>
        //             <div class="collapse" id="setting">
        //                 <ul class="nav nav-collapse">
        //         ';
        //         $menu .= self::set_menu(route('master.unitkerja.index'), 'Master data unit kerja');
        //         $menu .= self::set_menu(route('master.uploaddownload.index'), 'Dokment SAKIP');
        //         $menu .= self::set_menu(route('master.tmparamterdoc.index'), 'Paramater Doc');
        //         $menu .= self::set_menu(route('master.tahun.index'), 'Setup tahun ');

        //         $menu .= '
        //               </ul>
        //             </div>
        //         </li> 
        //         ';
        //         $menu .= self::menu_single(route('master.informasi.index'), '<i class="fas fa-copy"></i>', 'Informasi ');
        //         $menu .= self::menu_single(route('master.halaman.index'), '<i class="fas fa-desktop"></i>', 'Halaman');
        //         break;
        //     default:
        //         $menu .= '<li>Null Route Menu</li>';
        //         break;
        // }

        $menu .= ' 
        <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Dashboard</h4>
     </li>
        <li class="nav-item">
        <a data-toggle="collapse" href="#setting">
            <i class="fas fa-list"></i>
            <p>Master Data </p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="setting">
            <ul class="nav nav-collapse">
    ';
        $menu .= self::set_menu(route('master.unitkerja.index'), 'Unit kerja');
        $menu .= self::set_menu(route('master.uploaddownload.index'), 'Visi dan misi');
        $menu .= self::set_menu(route('master.uploaddownload.index'), 'Tujuan');
        $menu .= self::set_menu(route('master.sasaran.index'), 'Sasaran');
        $menu .= self::set_menu(route('master.indikatorsasaran.index'), 'Indikator Sasaran');
        $menu .= self::set_menu(route('master.targetkerja.index'), 'Target Kerja');
        $menu .= self::set_menu(route('master.targetpembiayaan.index'), 'Target Pembiayaan');
        $menu .= self::set_menu(route('master.capaiankerja.index'), 'Capaian Kerja');
        $menu .= self::set_menu(route('master.capaianpembiayaan.index'), 'Capaian Pembiayaan');
        $menu .= self::set_menu(route('master.realisasipembiayaan.index'), 'Realisasi Pembiayaan');
        $menu .= self::set_menu(route('master.programkegiatan.index'), 'Program & Kegiatan');


        $menu .= '
          </ul>
        </div>
    </li> 
    ';

        $menu .= self::menu_single(route('master.uploaddownload.index'), '<i class="fas fa-list"></i>', 'Produk');
        $menu .= self::menu_single(route('master.tmparamterdoc.index'), '<i class="fas fa-copy"></i>', 'Client');
        $menu .= self::menu_single(route('master.tahun.index'), '<i class="fas fa-copy"></i>', 'Transaksi');



        $menu .= self::menu_single(route('master.informasi.index'), '<i class="fas fa-copy"></i>', 'Report ');
        $menu .= self::menu_single(route('master.halaman.index'), '<i class="fas fa-desktop"></i>', 'Halaman');
        $menu .= self::menu_single(route('master.tahun.index'), '<i class="fas fa-copy"></i>', 'User');
        return $menu;
    }
}
