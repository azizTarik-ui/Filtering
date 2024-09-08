<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Division;
use App\Models\Upazilas;
use App\Models\Schools;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        // Fetch all divisions
        $divisions = Division::all();

        // Initialize other variables for the view
        $districts = collect(); // Empty collection
        $upazilas = collect(); // Empty collection
        $schools = collect(); // Empty collection

        return view('filter.index', compact('divisions', 'districts', 'upazilas', 'schools'));
    }

    public function filter(Request $request)
    {
        // Fetch all divisions
        $divisions = Division::all();

        // Fetch districts based on the selected division
        $districts = $request->division_id ? Districts::where('division_id', $request->division_id)->get() : collect();

        // Fetch upazilas based on the selected district
        $upazilas = $request->district_id ? Upazilas::where('district_id', $request->district_id)->get() : collect();

        // Fetch schools based on the selected upazila
        $schools = $request->upazila_id ? Schools::where('upazila_id', $request->upazila_id)->get() : collect();

        return view('filter.index', compact('divisions', 'districts', 'upazilas', 'schools'));
    }
}
