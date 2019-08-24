<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\ProductiveRegion;
use App\County;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductiveRegionResource;
use Carbon\Carbon;

class ProductiveRegionController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return ProductiveRegionResource::collection(ProductiveRegion::with('counties')->paginate(25));
    }

    public function store(Request $request)
    {
      $region = ProductiveRegion::create([

        'name' => $request->name,
        'status' => $request->status,
        'state_id' => $request->state_id,

      ]);

      return new ProductiveRegionResource($region);

    }

    public function show($id)
    {
        $region = ProductiveRegion::find($id);

        return new ProductiveRegionResource($region);
    }
}
