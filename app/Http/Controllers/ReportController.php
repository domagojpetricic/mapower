<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Operator;

class ReportController extends Controller
{
    public function index()
    {
    	$reports = Report::all();
    	return view('reports',compact('reports'));
    }

    public function allReports()
    {
    	$reports = Report::all();
    	return response()->json($reports);
    }

    public function operator1reports()
    {
        $reports = Report::where('operator_id', 1)->get();
        return response()->json($reports);
    }

    public function geoJson() 
    {
        $reports = Report::all();

        $original_data = json_decode($reports, true);
        $features = array();

        foreach($original_data as $key => $value) { 
            $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['latitude'],(float)$value['longitude'])),
                    'properties' => array('name' => $value['name'], 'id' => $value['id']),
                    );
            };   

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return json_encode($allfeatures, JSON_PRETTY_PRINT);

    }

   /* public function reportsReady()
    {
    	$reports = Report::with('operators')->get();
		return response()->json($reports);		
    }*/

    public function create(){
    	return view('createreport');
    }

    public function storeReport(){
    	$report = new Report();

    	$report->name = request('name');
    	$report->operator_id = request('operator_id');
    	$report->description = request('description');
    	$report->status = request('status');
    	$report->latitude = request('latitude');
    	$report->longitude = request('longitude');
    	$report->coords = [$report->latitude, $report->longitude];


    	$report->save();
    	return redirect('/reports');
    }
}
