<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;

use DataTables;
class KlienController extends Controller
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
        $this->view    = '.klien.';
        $this->route   = 'master.pesanan.';
    }
    public function index()
    {
        $title = 'Master data client';
        return view($this->view . 'index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function api()
    {
        $data = Klien::get();
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
                                                        id="foto">';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['usercreate', 'foto_p', 'action', 'id'])
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
     * @param  \App\Models\klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function show(klien $klien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function edit(klien $klien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, klien $klien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function destroy(klien $klien)
    {
        //
    }
}
