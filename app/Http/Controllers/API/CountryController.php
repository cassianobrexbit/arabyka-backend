<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Country;
use App\State;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use Carbon\Carbon;

class CountryController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return CountryResource::collection(Country::with('states')->paginate(25));
    }

    public function store(Request $request)
    {
      $country = Country::create([

        'name' => $request->name,
        'code' => $request->code,
        'status' => $request->status,

      ]);

      return new CountryResource($country);

    }

    public function show($id)
    {
        $country = Country::find($id);

        return new CountryResource($country);
    }

    public function update(Request $request, $id)
    {
      $country = Country::find($id);

      $country->update($request->only(['status']));

      return new CountryResource($country);

    }
}
