<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\TechnicalManager;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnicalManagerResource;
use Carbon\Carbon;

class TechnicalManagerController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return TechnicalManagerResource::collection(TechnicalManager::all());
    }

    public function store(Request $request)
    {
      $manager = TechnicalManager::create([

        'arabyka_credential' => $request->arabyka_credential,
        'status' => $request->status,
        'councyl_register' => $request->councyl_register,
        'user_id' => $request->user_id,

      ]);

      return new TechnicalManagerResource($manager);

    }

    public function show($id)
    {
        $manager = TechnicalManager::find($id);

        return new TechnicalManagerResource($manager);
    }
}
