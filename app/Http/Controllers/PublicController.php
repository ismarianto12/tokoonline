<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Klien;
use App\Models\Tmtahunopd;
use App\Models\Tmuploaddonwload;
use Illuminate\Http\Request;
use App\Models\Tmparameterdoc;
use App\Models\Tmunitkerja;
use DataTables;
use App\Models\Tmhalaman;

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

    public function register_act(Request $request)
    {

        try {
            $d = new Klien;
            $d->email = $request->email;
            $d->nama = $request->nama;
            $d->no_telp = $request->no_telp;
            $d->alamat = $request->alamat;
            $d->zip = $request->zip;
            $d->kecamatan = $request->kecamatan;
            $d->kabupaten = $request->kabupaten;
            $d->negara = $request->negara;
            $d->save();
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
        $title = 'Status Transaksi';
        return view('depan.transaksi', compact('title'));
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


    // 
    public function api()
    {
        $data = Tmunitkerja::select('tmunitkerja.nama', 'tmunitkerja.kode')->join('tmuploaddonwload', 'tmunitkerja.id', '=', 'tmuploaddonwload.tmunitkerja_id', 'left')->GroupBy('tmunitkerja.id');
        $tmuploaddonwload = new Tmuploaddonwload;
        return DataTables::of($data)
            ->editColumn('RPJMD', function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload->cekfile('RPJMD', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('Renstra', function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('Renstra', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('RKT',  function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('RKT', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('Renja',  function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('Renja', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('PK',   function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('PK', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('PK_P',  function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('PK_P', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('RA',  function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('RA', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<i class="fa fa-strip"></i>';
                }
            })
            ->editColumn('Cascading',  function ($p) use ($tmuploaddonwload) {
                $data = $tmuploaddonwload::cekfile('Cascading', $p->id_opd);
                $jr =  (is_null($data)) ? $data->first()->nama_file : 'Kosong';
                if ($jr != 'Kosong') {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary"><i class="fa fa-download"></i></a>';
                } else {
                    return '<a href="' . asset('file/gambar/' . $jr) . '" class="btn btn-primary">-</a>';
                }
            })
            ->addIndexColumn()
            ->rawColumns([
                'RPJMD',
                'Renstra',
                'RKT',
                'Renja',
                'PK',
                'PK_P',
                'RA',
                'Cascading',
            ])
            ->toJson();
    }
}
