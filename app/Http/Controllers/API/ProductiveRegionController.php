<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\ProductiveRegion;
use App\County;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductiveRegionResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        'insert_user_id' => \Auth::id(),

      ]);

      return new ProductiveRegionResource($region);

    }

    public function show($id)
    {
        $region = ProductiveRegion::find($id);

        return new ProductiveRegionResource($region);
    }

    public function update(Request $request, $id)
    {
      $region = ProductiveRegion::find($id);

      if ($region->insert_user_id == \Auth::id()) {

          $region->update($request->only(['status']));

          return new ProductiveRegionResource($region);
      }

      return new ProductiveRegionResource($region);

    }
}
