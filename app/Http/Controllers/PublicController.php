<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Klien;
use App\Models\Pesanan;
use App\Models\Tmtahunopd;
use App\Models\Tmuploaddonwload;
use Illuminate\Http\Request;
use App\Models\Tmparameterdoc;
use App\Models\Tmunitkerja;
use DataTables;
use App\Models\Tmhalaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Toko Online';
        $produk = Barang::get();
        $vf = Barang::take(3)->orderBy('id', 'asc')->get();
        return view('depan/home', compact('title', 'produk', 'vf'));
    }
    public function register()
    {
        $title = 'Register Client';
        return view('depan/register', compact('title'));
    }

    public function keranjang()
    {
        $session_id = Session::get('client_id');
        if ($session_id) {
            $title = 'Dashboard user';
            return view('depan/keranjang', compact('title'));
        } else {
            return redirect(route('user.login'));
        }
    }


    public function dashboarduser()
    {
        $session_id = Session::get('client_id');
        if ($session_id) {
            $title = 'Dashboard user';
            return view('depan/dashboarduser ', compact('title'));
        } else {
            return redirect(route('user.login'));
        }
    }

    public function detail($id)
    {
        $title = 'Toko Online';
        $produks = Barang::findOrFail($id);
        // $vf = Barang::take(3)->orderBy('id', 'asc')->get();
        return view('depan/detail', compact('title', 'produks'));
    }

    public function register_act(Request $request)
    {
        try {
            $request->validate([
                'email' => 'unique:klien,email'
            ]);

            $d = new Klien;
            $d->email = $request->email;
            $d->nama = $request->nama;
            $d->no_telp = $request->no_telp;
            $d->alamat = $request->alamat;
            $d->zip = $request->zip;
            $d->kecamatan = $request->kecamatan;
            $d->kabupaten = $request->kabupaten;
            $d->negara = $request->negara;
            $d->username =  $request->username;
            $d->password =  $request->password;
            $d->save();

            // $idnya = DB::getPdo()->lastInsertId();;

            // Session([
            //     'client_id' => $idnya,
            //     'username' => $d->username,
            //     'password' => $d->password
            // ]);
            return redirect()->intended(route('user.login'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function page($id)
    {
        $page = Tmhalaman::where('ket', $id)->first();
        $cara_beli = isset($page->isi) ? $page->isi : '';
        $title = 'Cara beli';
        return view('depan.halaman', compact('cara_beli', 'title'));
    }
    public function produk()
    {
        $title = 'List Produk';
        $produk = Barang::get();
        return view('depan.produk', compact('title', 'produk'));
    }
    public function transaksi()
    {
        $session_id = Session::get('client_id');
        if ($session_id) {
            $title = 'Status Transaksi';
            $data = Pesanan::join('barang', 'barang.id', '=', 'pesanan.id_barang')
                ->where('id_klien', $session_id)
                ->get();
            return view('depan.transaksi', compact('title', 'data'));
        } else {
            return redirect(route('user.login'));
        }
    }

    public function setstatus(Request $request)
    {
        $id = $request->id;
        Pesanan::where('id_barang', $id)->update([
            'status' => 2,
        ]);
    }

    public function Informasi()
    {
        $title = 'Informasi';
        return view('depan.pelaporan', compact('title'));
    }
    public function Pelaporan()
    {
        $title = 'Pelaporan';
        return view('depan.pelaporan', compact('title'));
    }

    public function Contact()
    {
        $title = 'Contact dan informasi';
        return view('depan.contact', compact('title'));
    }
}
