<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\TechnicalManager;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnicalManagerResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        'arabyka_credential' => 'ARBK'.Carbon::now()->year.'RT'.(\DB::table('technical_managers')->count() + 1),
        'status' => $request->status,
        'councyl_register' => $request->councyl_register,
        'user_id' => $request->user_id,
        'insert_user_id' => \Auth::id(),

      ]);

      return new TechnicalManagerResource($manager);

    }

    public function show($id)
    {
        $manager = TechnicalManager::find($id);

        return new TechnicalManagerResource($manager);
    }

    public function update(Request $request, $id)
    {
      
        $manager = TechnicalManager::find($id);

        if ($manager->insert_user_id == \Auth::id()) {

            $manager->update($request->only(['status']));

            return new TechnicalManagerResource($manager);
        }

        return new TechnicalManagerResource($manager);

    }
}
