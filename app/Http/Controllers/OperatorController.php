<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Report;

class OperatorController extends Controller
{
    public function reportsReady()
    {
  		$reports = Operator::with('reports')->get();
			return response()->json($reports);		
    }

    public function geoJson () 
    {
    	$reports = Operator::with('reports')->get();

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
}
