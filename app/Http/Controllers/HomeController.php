<?php

namespace App\Http\Controllers;

use App\Models\Tmprogres_spk;
use App\Models\Tmproyek;
use App\Models\Tmrap;
use App\Models\Tmrspk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Tmspk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $view;
    protected $request;
    protected $route;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->view    = '.home';
        $this->route   = 'home';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Welcome Page';
        return view($this->view . '.home', compact('title'));
    }


    public function dashboard()
    {
        //get total of project 
        $projects['projects'] = Tmproyek::select(\DB::raw('COUNT(id) as jproject'))->count();
        $tmrspks['tmrspk'] = Tmrspk::select(\DB::raw('COUNT(id) as jtmrspk'))->count();
        $tmprogresspks['progres_spk'] = Tmprogres_spk::select(\DB::raw('COUNT(id) as jtmrspk'))->count();

        $lastday  = date('Y-m-d', strtotime('-1 day'));
        $todah = date('Y-m-d', strtotime('+1 day'));
        // total list rencana anggaran project 
        $lalus      = Tmrap::select(\DB::raw('sum(jumlah_harga) as tlalu'))->where('tanggal', $lastday)->first();
        $sekarangs  =  Tmrap::select(\DB::raw('sum(jumlah_harga) as tsekarang'))->where('tanggal', $todah)->first();
        $total_rencanaanggarans  =  Tmrap::select(\DB::raw('sum(jumlah_harga) as renanggaran'))->first();

        $lalu['tot_jumlah_harga']   = $lalus->tlalu ? $lalus->tlalu : 0;
        $sekarang['tot_jumlah_hargas']  = ($sekarangs->tsekarang) ? number_format($sekarangs->tsekarang, 2) : 0;
        $ftotal_rencanaanggarans['total_rencanaanggarans'] = ($total_rencanaanggarans->renanggaran) ? number_format($total_rencanaanggarans->renanggaran, 2) : 0;
        $data = array_merge($projects, $tmrspks, $tmprogresspks, $lalu, $sekarang, $ftotal_rencanaanggarans);

        return response()->json($data, 200, array(), JSON_PRETTY_PRINT);
    }
}
