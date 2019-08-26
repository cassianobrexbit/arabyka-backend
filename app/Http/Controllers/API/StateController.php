<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\State;
use App\ProductiveRegion;
use App\Http\Controllers\Controller;
use App\Http\Resources\StateResource;
use Carbon\Carbon;

class StateController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return StateResource::collection(State::with('productiveRegions')->paginate(25));
    }

    public function store(Request $request)
    {
      $state = State::create([

        'name' => $request->name,
        'code' => $request->code,
        'status' => $request->status,
        'country_id' => $request->country_id,

      ]);

      return new StateResource($state);

    }

    public function show($id)
    {
        $state = State::find($id);

        return new StateResource($state);
    }

    public function update(Request $request, $id)
    {
      $state = State::find($id);

      $state->update($request->only(['status']));

      return new StateResource($state);

    }
}
