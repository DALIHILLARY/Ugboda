<?php

namespace App\Http\Controllers\API;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Report as ReportResource;

class ReportController extends Controller
{
    /**
     * Get report listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $reports = Report::all();

        $geoJSONdata = $reports->map(function ($report) {

            return [
                'type'       => 'Feature',
                'properties' => new ReportResource($report),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' =>array_reverse(explode(",",$report->location)),
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
