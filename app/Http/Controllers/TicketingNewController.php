<?php

namespace App\Http\Controllers;

use App\TicketRevisi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class TicketingNewController extends Controller
{
    var $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $u = new User;
            $this->user = $u->getDetail(Auth()->user()->id_akses);

            View::share('user', $this->user);
            return $next($request);
        });
    }

    public function viewRevisiPusat()
    {
        $modul      = 'E-Ticketing';
        $current    = "Pengajuan Revisi Pusat";
        return view('contents.e-ticketing-new.index', compact('current', 'modul'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable_etiketing_pusat(Request $request)
    {
        return DataTables::of($this->models($request))
            ->addColumn('tahap1', function ($data) {
                return Carbon::parse($data->created_at)->format('d/m/Y H:i');
            })
            ->addColumn('tahap2', function ($data) {
                return $data->approved_at == null ? '' : Carbon::parse($data->approved_at)->format('d/m/Y H:i');
            })
            ->addColumn('tahap3', function ($data) {
                return $data->verified_at == null ? '' : Carbon::parse($data->verified_at)->format('d/m/Y H:i');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function models_header(Request $request)
    {
        return response()->json([
            'status'  => Response::HTTP_OK,
            'data' => array_map(function ($status) use ($request) {
                return count($this->models(new Request([
                    'q' => $status,
                    'cari_provinsi' => $request['cari_provinsi'],
                    'cari_satker' => $request['cari_satker'],
                ])));
            }, [
                'all' => $request['q_all'],
                'new' => $request['q_new'],
                'perbaikan' => $request['q_revisi'],
                'sudah_perbaikan' => $request['q_revisi_selesai'],
                'ppk' => $request['q_ppk'],
                'bagren' => $request['q_bagren'],
                'ditolak' => $request['q_tolak']
            ])
        ]);
    }
    public function models(Request $request)
    {
        return TicketRevisi::query()
            ->when($request->cari_tahun, function ($q) use ($request) {
                $q->whereYear('created_at', $request->cari_tahun);
            })
            ->when($request->cari_bulan, function ($q) use ($request) {
                $q->whereMonth('created_at', $request->cari_bulan);
            })
            ->when($request->q != "all", function ($q) use ($request) {
                $q->where('status', $request->q);
            })
            ->whereYear('created_at', '2024')
            ->where('provinsi', 'undefined')
            // ->orWhereIsNull('provinsi')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
