<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\County;
use App\Farm;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountyResource;
use Carbon\Carbon;

class CountyController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return CountyResource::collection(County::with('farms')->paginate(25));
    }

    public function store(Request $request)
    {
      $county = County::create([

        'name' => $request->name,
        'ibge_code' => $request->ibge_code,
        'status' => $request->status,
        'productive_region_id' => $request->productive_region_id,

      ]);

      return new CountyResource($county);

    }

    public function show($id)
    {
        $county = County::find($id);

        return new CountyResource($county);
    }
}
