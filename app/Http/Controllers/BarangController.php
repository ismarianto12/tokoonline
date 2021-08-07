<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

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
        $this->view    = '.produk.';
        $this->route   = 'master.produk.';
    }

    public function index()
    {
        $title = 'Master Data Produk';
        return view($this->view . 'index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Data Produk';
        return view($this->view . 'form_add', compact('title'));
    }

    public function api()
    {
        $data = Barang::get();
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
            $tgl = Carbon::now()->format('y-m-d');
            $ext = $this->request->file('img');
            if ($ext == '') {
            } else {
                $setname = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
                $ext->move('./file/gambar/', $setname);
            }

            $f->nama_barang = $this->request->nama_barang;
            $f->harga = $this->request->harga;
            $f->kategori = $this->request->kategori;
            $f->stok = $this->request->stok;
            $f->img = $setname;
            $f->created_at = $this->request->created_at;
            $f->updated_at = $this->request->updated_at;
            $f->save();

            return response()->json([
                'status' => 1,
                'msg' => 'data user berhasil dtambah'
            ]);
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
    public function edit($id)
    {
        // dd($id);
        $data = Barang::find($id);
        $id = $id;
        $nama_barang = $data->nama_barang;
        $harga = $data->harga;
        $kategori = $data->kategori;
        $stok = $data->stok;
        $img = $data->img;

        $title = 'Edit Data Produk';
        return view($this->view . 'form_edit', compact(
            'title',
            'nama_barang',
            'id',
            'harga',
            'kategori',
            'stok',
            'img',

        ));
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
            $f = barang::find($id);
            $tgl = Carbon::now()->format('y-m-d');
            $ext = $this->request->file('img');
            if ($ext == '') {
            } else {
                $filename = $f->img;
                @unlink(public_path() . './file/gambar/' . $filename);
                $setname = rand(122, 333) . '-' . $tgl . '.' . $ext->getClientOriginalExtension();
                $ext->move('./file/gambar/', $setname);
                $f->img = $setname;
            }
            $f->nama_barang = $this->request->nama_barang;
            $f->harga = $this->request->harga;
            $f->kategori = $this->request->kategori;
            $f->stok = $this->request->stok;
            $f->created_at = $this->request->created_at;
            $f->updated_at = $this->request->updated_at;
            $f->save();

            return response()->json([
                'status' => 1,
                'msg' => 'data user berhasil dtambah'
            ]);
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

            return response()->json([
                'status' => 1,
                'msg' => 'data user berhasil dtambah'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
