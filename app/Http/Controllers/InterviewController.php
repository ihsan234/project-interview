<?php

namespace App\Http\Controllers;

use App\Exports\InterviewExport;
use App\Models\Interview;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interviews = Interview::orderBy('created_at' , 'DESC')->simplePaginate(10);
        // compact untuk kirim data
        return view("index", compact('interviews'));
    }

        public function data(Request $request)
        {
            $search = $request->search;
            $interviews = Interview::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
            // compact untuk kirim data
            return view("dashboard.data.response", compact('interviews'));

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'nama' => 'required|min:3',
                'email' => 'required',
                'age' => 'required',
                'no_tlp' => 'required',
                'last_education' => 'required',
                'education_name' => 'required',
                'cv_file' => 'required|image|mimes:jpeg,jpg,png,svg',
            ]);

            $image = $request->file('cv_file');
            $imgName = rand(). '.' .  $image->extension();
            $path = public_path('assets/image/');
            $image->move($path, $imgName);

            Interview::create([
                'name' => $request->nama,
                'email' => $request->email,
                'age' => $request->age,
                'no_tlp' => $request->no_tlp,
                'last_education' => $request->last_education,
                'education_name' => $request->education_name,
                'cv_file' => $imgName,

            ]);

            return redirect()->back()->with('Succes', 'Berhasil menambahkan data baru!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interview $interview)
    {
        //
    }



    public function dataType(Request $request)
    {
            $search = $request->search;
            if ($search) {
                $interviews = Interview::with('response')->whereRelation('response', 'type' , '=', $search)->orderBy('created_at', 'DESC')->get();
            } else {
                $interviews = Interview::with('response')->orderBy('created_at', 'DESC')->get();
            }
            // compact untuk kirim data
            return view("dashboard.data.type", compact('interviews'));

    }

    public function dataAdmin(Request $request)
    {
        $search = $request->search;
        $interviews = Interview::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        // compact untuk kirim data
        return view("dashboard.admin.response", compact('interviews'));

    }


    public function export()
    {
        return Excel::download(new InterviewExport, 'interview.xlsx');
    }

    public function exportPDF() {
        $interviews = Interview::get();
        $pdf = PDF::loadView('pdf-export', ['interviews' => $interviews]);
        return $pdf->download('InterviewPDF.pdf');
    }


}
