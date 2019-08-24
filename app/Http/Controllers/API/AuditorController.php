<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Auditor;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuditorResource;
use Carbon\Carbon;

class AuditorController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
        return AuditorResource::collection(Auditor::all());
    }

    public function store(Request $request)
    {
      $auditor = Auditor::create([

        'arabyka_credential' => $request->arabyka_credential,
        'status' => $request->status,
        'councyl_register' => $request->councyl_register,
        'user_id' => $request->user_id,

      ]);

      return new AuditorResource($auditor);

    }

    public function show($id)
    {
        $auditor = Auditor::find($id);

        return new AuditorResource($auditor);
    }

    public function update(Request $request, $id)
    {
      $auditor = Auditor::find($id);

      $auditor->update($request->only(['status']));

      return new AuditorResource($auditor);


    }
}
