<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(AuthRequest $request){
        $user = (new User())->getUserByEmail( $request->all());
        if($user && Hash::check($request->input('password'), $user->password)){
            $user_data['token'] = $user->CreateToken($user->email)->plainTextToken;
            $user_data['name'] = $user->name;
            $user_data['email'] = $user->email;;

            return response()->json($user_data);
        }
        throw ValidationException::withMessages([
            'email' => ['Email or password is wrong!']
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(['msg' => 'your are logged out']);
    }
}
