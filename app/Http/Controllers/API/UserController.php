<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserController extends Controller
{

   public $successStatus = 200;
   /**
   * login api
   *
   * @return \Illuminate\Http\Response
   */
   public function login(){

      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

          $user = Auth::user();
          $success['token'] =  $user->createToken('MyApp')-> accessToken;

          return response()->json(['success' => $success], $this-> successStatus);
      }
      else{
          return response()->json(['error'=>'Unauthorised'], 401);
      }

   }
   /**
   * Register api
   *
   * @return \Illuminate\Http\Response
   */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpf' => 'string|max:14|required_without:cnpj',
            'cnpj' => 'string|max:18',
            'corporate_name' => 'string|required_without:cpf',
            'address' => 'required',
            'cep' => 'string|max:10',
            'phone' => 'required',
            'cell_phone' => 'string',
            'is_active' => 'required',
            'county_id' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['email'] =  $user->email;
        $success['cpf'] =  $user->cpf;
        $success['cnpj'] =  $user->cnpj;
        $success['corporate_name'] =  $user->corporate_name;
        $success['address'] =  $user->address;
        $success['cep'] =  $user->cep;
        $success['phone'] =  $user->phone;
        $success['cell_phone'] =  $user->cell_phone;
        $success['is_active'] =  $user->is_active;
        $success['county_id'] =  $user->county_id;

        return response()->json(['success'=>$success], $this-> successStatus);

      }
    /**
    * details api
    *
    * @return \Illuminate\Http\Response
    */

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
