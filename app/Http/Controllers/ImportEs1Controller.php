<?php

namespace App\Http\Controllers;

use App\ImportEslon1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ImportEs1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modul = 'ImportEslon1';
        $current = 'Index';
        $realisasis = ImportEslon1::all();
        
        return view('contents.importEs1.index', compact('modul', 'current', 'realisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = 'ImportEslon1';
        $current = 'Create';
        return view('contents.importEs1.create', compact('modul', 'current'));
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

        $realisasi = new ImportEslon1();
        
        // Automatically fill the 'id' field
        $lastNo = ImportEslon1::max('id');
        $realisasi->id = $lastNo ? $lastNo + 1 : 1;
        
        if ($request->hasFile('bukti_ref')) {
            $file = $request->file('bukti_ref');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_ref', $filename);
            $realisasi->bukti_ref = $filename;
        }

        $realisasi->save();

        return redirect()->route('importes1.index')->with('success', 'Realisasi created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul = 'ImportEslon1';
        $current = 'Edit';
        $realisasi = ImportEslon1::where('id', $id)->firstOrFail();

        
        return view('contents.importEs1.edit', compact('realisasi', 'modul', 'current'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bukti_ref' => 'nullable|file|mimes:xlsx,xls|max:2048',
        ]);

        $realisasi = ImportEslon1::where('id', $id)->firstOrFail();
        
        if ($request->hasFile('bukti_ref')) {
            // Delete old file if exists
            if ($realisasi->bukti_ref) {
                Storage::delete('public/bukti_ref/' . $realisasi->bukti_ref);
            }
            
            $file = $validatedData['bukti_ref'];
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_ref', $filename);
            $realisasi->bukti_ref = $filename;
        }

        $realisasi->save();

        return redirect()->route('importEs1.index')->with('success', 'Realisasi updated successfully.');
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
                return redirect()->route('importEs1.index')->with('success', 'Data imported successfully.');
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
        $realisasis = ImportEslon1::all();

        return DataTables::of($realisasis)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('importEs1.edit', $row->id).'" class="edit btn btn-success btn-sm">Edit</a> ';
                $actionBtn .= '<button class="delete btn btn-danger btn-sm" data-id="'.$row->id.'">Delete</button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display the contents of the Excel file.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $realisasi = ImportEslon1::where('id', $id)->firstOrFail();

        if (!$realisasi->bukti_ref) {
            return redirect()->back()->with('error', 'No Excel file found for this importEs1.');
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realisasi = ImportEslon1::where('id', $id)->firstOrFail();

        // Delete the associated file if it exists
        if ($realisasi->bukti_ref) {
            Storage::delete('public/bukti_ref/' . $realisasi->bukti_ref);
        }

        $realisasi->delete();

        return response()->json(['success' => 'Realisasi deleted successfully.']);
    }
}
