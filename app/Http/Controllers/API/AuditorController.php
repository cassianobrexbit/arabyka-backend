<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Auditor;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuditorResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        'arabyka_credential' => 'ARBK'.Carbon::now()->year.'AD'.(\DB::table('auditors')->count() + 1),
        'status' => $request->status,
        'councyl_register' => $request->councyl_register,
        'user_id' => $request->user_id,
        'insert_user_id' => \Auth::id(),

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

      if ($auditor->insert_user_id == \Auth::id()) {

          $auditor->update($request->only(['status']));

          return new AuditorResource($auditor);
      }

      return new AuditorResource($auditor);

    }
}
