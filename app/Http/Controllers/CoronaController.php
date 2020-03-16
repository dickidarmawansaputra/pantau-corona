<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CoronaController extends Controller
{
    public function index()
    {
    	$corona_indonesia = 'https://api.kawalcorona.com/indonesia';
    	$api_indonesia = json_decode(file_get_contents($corona_indonesia), true);
    	$negara = $api_indonesia[0]['name'];
    	$positif = $api_indonesia[0]['positif'];
    	$sembuh = $api_indonesia[0]['sembuh'];
    	$meninggal = $api_indonesia[0]['meninggal'];
    	// $update = $api_indonesia[1]['lastupdate'];

    	return view('index', compact('negara', 'positif', 'sembuh', 'meninggal'));
    }

    public function data()
    {
    	$corona_global = 'https://api.kawalcorona.com';
    	$api_global = json_decode(file_get_contents($corona_global), true);
    	return Datatables::of($api_global)
    		->addColumn('negara', function($data) {
                return $data['attributes']['Country_Region'];
            })
            ->addColumn('positif', function($data) {
                return $data['attributes']['Confirmed'];
            })
            ->addColumn('sembuh', function($data) {
                return $data['attributes']['Recovered'];
            })
            ->addColumn('meninggal', function($data) {
                return $data['attributes']['Deaths'];
            })
            ->addIndexColumn()
			->rawColumns(['negara', 'positif', 'sembuh', 'meninggal'])
			->make(true);
    }
}
