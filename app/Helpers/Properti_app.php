<?php


// by ismarianto 
namespace App\Helpers;

use App\Models\User;
use App\Models\Setupsikd\Tmsikd_satker;
use App\Models\Setupsikd\Tmsikd_setup_tahun_anggaran;
use App\Models\Tmbangunan;
use App\Models\Tmproyek;
use App\Models\Tmrap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
// use Illuminate\Support\Facades\Session;

class Properti_app
{

    public static function user_satker()
    {
        $user_id = Auth::user()->id;
        $query   = DB::table('user')
            ->select('user.id', 'user.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
            ->join('tmuser_level', 'user.tmuser_level_id', '=', 'tmuser_level.id')
            ->where('user.id', $user_id);

        $levelid = $query->first()->level_id;
        if ($levelid == 3) {
            return Auth::user()->sikd_satker_id;
        } else {
            return 0;
        }
    }

    public static function load_js(array $url)
    {
        $data     = [];
        foreach ($url as $ls) {
            $js[]     =  '<script type="text/javascript" src="' . $ls . '"></script>';
            $data     = $js;
        }
        return $data;
    }


    public static function getlevel()
    {
        $ff = Auth::user();
        // dd($user_id);
        if ($ff != null) {
            $user_id = $ff->id;
            $query   = DB::table('users')
                ->select('users.id', 'users.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
                ->join('tmuser_level', 'users.tmuser_level_id', '=', 'tmuser_level.id')
                ->where('users.id', $user_id)
                ->first();
            return $query->level_id;
        } else {
            return null;
        }
    }


    public static function tgl_indo($tgl)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tgl);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }

    public static function servername()
    {
        return $_SERVER['HTTP_HOST'];
    }
    public static function UserSess()
    {
        $ff = Auth::user();
        if ($ff != null) {
            return $ff->username;
        } else {
            return null;
        }
    }

    public static function propuser($params)
    {
        $ff = Auth::user();
        if ($ff != null) {
            $data   = User::find($ff->id);
            // dd($data);
            if ($data != '') {
                return $data[$params];
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }



    public static function combobangunan($id = '')
    {
        $level_id = Auth::user()->level_id;
        $datas    = Tmbangunan::select('kode', 'nama_bangunan', 'id');

        if ($level_id != 1) {
            $html  = '<select name="tmbangunan_id" class="js-example-basic-single form-control">';
            $pars  =  $datas->where('tmlevel_id', $level_id);
            foreach ($pars->get() as  $data) {
                $selected = ($data->id == $id) ? 'selected' : '';
                $html .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['kode'] . '-' . $data['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        } else {
            $html = '<select name="tmbangunan_id" class="js-example-basic-single form-control">';
            $pars = $datas->get();
            foreach ($pars as  $data) {
                $selected = ($data->id == $id) ? 'selected' : '';
                $html .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['kode'] . '-' . $data['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        }
        return $html;
    }



    // set change environment dinamically
    public static function parsing($url)
    {

        $val =  "?" . base64_decode($url);
        $query_str = parse_url($val, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        // dd($query_params);
        return $query_params;
    }
}
