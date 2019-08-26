<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Farm;
use App\ProductiveUnity;
use App\Http\Controllers\Controller;
use App\Http\Resources\FarmResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return FarmResource::collection(Farm::with('productiveUnities')->paginate(25));
    }

    public function store(Request $request)
    {
      $farm = Farm::create([

        'farm_classification' => $request->farm_classification,
        'farm_denomination' => $request->farm_denomination,
        'car_number' => $request->car_number,
        'incra_number' => $request->incra_number,
        'irf_number' => $request->irf_number,
        'farm_registry' => $request->farm_registry,
        'consumer_unity' => $request->consumer_unity,
        'total_area' => $request->total_area,
        'lat' => $request->lat,
        'long' => $request->long,
        'status' => $request->status,
        'county_id' => $request->county_id,
        'user_id' => $request->user_id,
        'insert_user_id' => \Auth::id(),

      ]);

      return new FarmResource($farm);

    }

    public function show($id)
    {
        $farm = Farm::find($id);

        return new FarmResource($farm);
    }

    public function update(Request $request, $id)
    {

      $farm = Farm::find($id);

      if ($farm->insert_user_id == \Auth::id()) {

          $farm->update($request->only(['status']));

          return new FarmResource($farm);
      }

      return new FarmResource($farm);

    }
}
