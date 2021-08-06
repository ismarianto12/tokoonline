<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
        $this->view    = '.user.';
        $this->route   = 'master.user.';
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...
            $f = new barang;
            $f->nama_barang = $this->request->nama_barang;
            $f->harga = $this->request->harga;
            $f->kategori = $this->request->kategori;
            $f->stok = $this->request->stok;
            $f->img = $this->request->img;
            $f->created_at = $this->request->created_at;
            $f->updated_at = $this->request->updated_at;
            $f->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang, $id)
    {
        try {
            //code...
            $f = barang::find($id);
            $f->nama_barang = $this->request->nama_barang;
            $f->harga = $this->request->harga;
            $f->kategori = $this->request->kategori;
            $f->stok = $this->request->stok;
            $f->img = $this->request->img;
            $f->created_at = $this->request->created_at;
            $f->updated_at = $this->request->updated_at;

            $f->update();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        try {
            if (is_array($this->request->id)) {
                $f = barang::whereIn($this->request->id);
                $f->delete();
            } else {
                $f = barang::whereid($this->request->id);
                $f->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
