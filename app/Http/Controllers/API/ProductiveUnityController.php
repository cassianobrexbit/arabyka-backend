<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Farm;
use App\User;
use App\ProductiveUnity;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductiveUnityResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductiveUnityController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return ProductiveUnityResource::collection(ProductiveUnity::with('productiveUnities')->paginate(25));
    }

    public function store(Request $request)
    {
      $productiveUnity = ProductiveUnity::create([

        'plant_date' => $request->plant_date,
        'estimated_production' => $request->estimated_production,
        'variety' => $request->variety,
        'planted_area' => $request->planted_area,
        'specie_id' => $request->specie_id,
        'insert_user_id' => \Auth::id(),
        'farm_id' => $request->farm_id,
        'technical_manager_id' => $request->technical_manager_id,
        'lat' => $request->lat,
        'long' => $request->long,
        'status' => $request->status,

      ]);

      return new ProductiveUnityResource($productiveUnity);

    }

    public function show($id)
    {
        $productiveUnity = ProductiveUnity::find($id);

        return new ProductiveUnityResource($productiveUnity);
    }
}
