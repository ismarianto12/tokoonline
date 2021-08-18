<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;

class LaporanpenjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Laporan penjualan';
        return view('laporanpenjualan.index', compact('title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $data = Barang::select(
            'barang.nama_barang',
            'barang.harga',
            'barang.kategori',
            'barang.stok',
            'barang.img',
            'pesanan.total',
            'pesanan.qty', 
            'pesanan.id_klien',
            'pesanan.id_barang',
            'pesanan.status'
        )->join(
            'pesanan',
            'barang.id',
            '=',
            'pesanan.id_barang'
        )
            ->where('pesanan.status', 2)
            ->get();

        return DataTables::of($data)
            ->editColumn('id', function ($p) {
                return "<input type='checkbox' name='cbox[]' value='" . $p->id . "' />";
            })
            ->editColumn('action', function ($p) {
                return  '<a href="" class="btn btn-warning btn-xs" id="edit" data-id="' . $p->id . '"><i class="fa fa-edit"></i>Edit </a> ';
            }, true)
            ->editColumn('gambar', function ($p) {
                return '<img src="' . asset('file/gambar/' . $p->img) . '" alt="..."
                                                        onerror="this.onerror=null;this.src=\'' . asset('assets/img/profile.jpg') . '\';"
                                                        id="img" style="width:100px;height:100px">';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['usercreate', 'gambar', 'action', 'id'])
            ->toJson();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
