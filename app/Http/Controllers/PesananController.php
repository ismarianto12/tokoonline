<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use DataTables;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $request;
    protected $route;
    protected $view;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->view    = '.pesanan.';
        $this->route   = 'master.pesanan.';
    }


    public function index()
    {
        //
        $title = 'Data Pesanan';
        return view($this->view . 'index', compact('title'));
    }


    public function api()
    {
        $data = Pesanan::join('barang', 'barang.id', '=', 'pesanan.id_barang')
            ->join('klien', 'pesanan.id_klien', '=', 'klien.id')
            ->get();
        return DataTables::of($data)
            ->editColumn('id', function ($p) {
                return "<input type='checkbox' name='cbox[]' value='" . $p->id . "' />";
            })
            ->editColumn('action', function ($p) {
                return  '<a href="" class="btn btn-warning btn-xs" id="edit" data-id="' . $p->id . '"><i class="fa fa-edit"></i>Edit </a> ';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['usercreate', 'foto_p', 'action', 'id'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pesanan::join('barang', 'barang.id', '=', 'pesanan.id_barang','LEFT OUTER')
        ->join('klien', 'pesanan.id_klien', '=', 'klien.id','LEFT')
            ->where('klien.id', $id)
            ->first();
        $namapemesan = $data['nama'];
        $barang = $data->nama_barang;
        $jumlah = $data->qty;
        $harga = $data->harga;

        return view('pesanan.form_edit', [
            'id'=> $id,
            'namapemesan' => $namapemesan,
            'barang' => $barang,
            'jumlah' => $jumlah,
            'harga' => $harga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = $request->status;
        Pesanan::where('id', $id)->update([
            'status' => $status
        ]);
        return response()->json([
            'status' => 1,
            'msg' => 'data user berhasil dtambah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesanan $pesanan)
    {
        //
    }
}
