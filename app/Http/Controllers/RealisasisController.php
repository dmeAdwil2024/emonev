<?php

namespace App\Http\Controllers;

use App\Realisasis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class RealisasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // variable tambahan
        $modul      = "Realisasi";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $realisasi      = new Realisasis;

        // Fetch all realisasi records
        $realisasis = $realisasi->all();

        // Return the view with the data
        return view('contents.realisasi.index', compact('modul', 'current', 'realisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // variable tambahan
        $modul      = "Realisasi";
        $current    = "Create";


        // Show form for creating a new Realisasi
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
            'jml_revisi' => 'required|numeric',
            'bukti_revisi' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        $realisasi = new Realisasis();
        $realisasi->jml_revisi = $request->jml_revisi;

        if ($request->hasFile('bukti_revisi')) {
            $file = $request->file('bukti_revisi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_revisi', $fileName, 'public');
            $realisasi->bukti_revisi = $filePath;
        }

        try {
            $realisasi->save();
            return redirect()->route('realisasi.index')
                ->with('success', 'Realisasi created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error saving realisasi: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to create Realisasi. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realisasi = Realisasis::findOrFail($id);

        // Check if the bukti_revisi file exists
        if (!Storage::disk('public')->exists($realisasi->bukti_revisi)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Get the file path
        $filePath = Storage::disk('public')->path($realisasi->bukti_revisi);

        // Load the Excel file
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the data as an array
        $data = $worksheet->toArray();

        // Remove the header row if it exists
        if (!empty($data)) {
            array_shift($data);
        }

        // Prepare the data for JSON response
        $formattedData = [];
        foreach ($data as $row) {
            $formattedData[] = [
                'no' => $row[0] ?? null,
                'jml_revisi' => $row[1] ?? null,
                'bukti_revisi' => $row[2] ?? null,
                'created_at' => $row[3] ?? null,
                // Add more columns as needed
            ];
        }

        // Return the data as JSON
        return response()->json([
            'realisasi' => $realisasi,
            'excel_data' => $formattedData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // variable tambahan
        $modul      = "Realisasi";
        $current    = "Edit";

        // Find the Realisasi by ID
        $realisasi = Realisasis::findOrFail($id);

        // Show form for editing the Realisasi
        // Return the view with the Realisasi data and additional variables
        return view('contents.realisasi.edit', compact('modul', 'current'));
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
        $request->validate([
            'jml_revisi' => 'required|numeric',
            'bukti_revisi' => 'nullable|file|mimes:xlsx,xls|max:2048',
        ]);

        $realisasi = Realisasis::findOrFail($id);
        $realisasi->jml_revisi = $request->jml_revisi;

        if ($request->hasFile('bukti_revisi')) {
            // Delete old file if exists
            if ($realisasi->bukti_revisi && Storage::disk('public')->exists($realisasi->bukti_revisi)) {
                Storage::disk('public')->delete($realisasi->bukti_revisi);
            }

            // Upload new file
            $file = $request->file('bukti_revisi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_revisi', $fileName, 'public');
            $realisasi->bukti_revisi = $filePath;
        }

        try {
            $realisasi->save();
            return redirect()->route('realisasi.index')
                ->with('success', 'Realisasi updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error updating realisasi: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update Realisasi. Please try again.')
                ->withInput();
        }
    }
}