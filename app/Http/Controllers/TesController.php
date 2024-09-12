<?php

namespace App\Http\Controllers;

use App\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modul = 'Tes';
        $current = 'Index';
        $realisasis = Tes::all();
        
        return view('contents.realisasi.index', compact('modul', 'current', 'realisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = 'Tes';
        $current = 'Create';
        return view('contents.realisasi.create', compact('modul', 'current'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bukti_ref' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        $realisasi = new Tes();
        
        // Automatically fill the 'no' field
        $lastNo = Tes::max('no');
        $realisasi->no = $lastNo ? $lastNo + 1 : 1;
        
        if ($request->hasFile('bukti_ref')) {
            $file = $request->file('bukti_ref');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_ref', $filename);
            $realisasi->bukti_ref = $filename;
        }

        $realisasi->save();

        return redirect()->route('realisasi.index')->with('success', 'Realisasi created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $no
     * @return \Illuminate\Http\Response
     */
    public function edit($no)
    {
        $realisasi = Tes::where('no', $no)->firstOrFail();
        return view('realisasi.edit', compact('realisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $no
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no)
    {
        $request->validate([
            'bukti_ref' => 'nullable|file|mimes:xlsx,xls|max:2048',
        ]);

        $realisasi = Tes::where('no', $no)->firstOrFail();
        
        if ($request->hasFile('bukti_ref')) {
            // Delete old file if exists
            if ($realisasi->bukti_ref) {
                Storage::delete('public/bukti_ref/' . $realisasi->bukti_ref);
            }
            
            $file = $request->file('bukti_ref');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_ref', $filename);
            $realisasi->bukti_ref = $filename;
        }

        $realisasi->save();

        return redirect()->route('realisasi.index')->with('success', 'Realisasi updated successfully.');
    }

    /**
     * Import data from Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            try {
                Excel::import(new TesImport, $file);
                return redirect()->route('realisasi.index')->with('success', 'Data imported successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }

    /**
     * Get data for DataTables.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        $realisasis = Tes::all();

        return DataTables::of($realisasis)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('tes.edit', $row->no).'" class="edit btn btn-success btn-sm">Edit</a> ';
                $actionBtn .= '<button class="delete btn btn-danger btn-sm" data-id="'.$row->no.'">Delete</button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display the contents of the Excel file.
     *
     * @param  string  $no
     * @return \Illuminate\Http\Response
     */
    public function download($no)
    {
        $realisasi = Tes::where('no', $no)->firstOrFail();

        if (!$realisasi->bukti_ref) {
            return redirect()->back()->with('error', 'No Excel file found for this realisasi.');
        }

        $filePath = storage_path('app/public/bukti_ref/' . $realisasi->bukti_ref);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Excel file not found.');
        }

        // Display the Excel file directly
        return response()->file($filePath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $no
     * @return \Illuminate\Http\Response
     */
    public function destroy($no)
    {
        $realisasi = Tes::where('no', $no)->firstOrFail();

        // Delete the associated file if it exists
        if ($realisasi->bukti_ref) {
            Storage::delete('public/bukti_ref/' . $realisasi->bukti_ref);
        }

        $realisasi->delete();

        return response()->json(['success' => 'Realisasi deleted successfully.']);
    }
}
