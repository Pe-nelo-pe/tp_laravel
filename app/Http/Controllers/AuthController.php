<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

     /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('welcome');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //page de login
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('auth.create', ['cities'=>$cities ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city_id' => 'required|numeric',
            'birthday' => 'required|date',
            'email'=> 'required|email|unique:users',
            'password'=>['required', 'max:20', Password::min(2)->mixedCase()->letters()->numbers()]
        ]);

  
       $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
       $user->password = Hash::make($request->password);

        $newUser = Student::create([
            'id'=> $user->id,
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'birthday' => $request->birthday,
        ]);
   


       return redirect(route('login'))->withSuccess(trans('lang.msg_1'));
    }


    public function authentification(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:users', 
            'password'=> 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                    ->withErrors(trans('auth.failed')) 
                    ->withInput(); 
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect('dashboard')->withSuccess('Signed in');
        
    }

    public function dashboard(){

        if(Auth::check()){

            return view('dashboard');

        }
        return redirect(route("login"))->withErrors('Vous n\'êtes pas autorisé à accéder cette page');
    }


     /**
     * Log Out.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route('home'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
     
        return view('auth.show', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
  
        $cities = City::all();
        $student = Student::find($user->id);
      
        return view('auth.edit', ['user' => $user, 'cities'=>$cities, 'student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city_id' => 'required|numeric',
            'birthday' => 'required|date',
            'email'=> 'required|email',
            
        ]);

        $user->update([
            'name'=> $request->name,
            'email' => $request->email,
        ]);
        $user->save();
        
        $student = Student::find($user->id);
        $student->update([  
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'birthday' => $request->birthday,
        ]);
        $student->save();

        return redirect(route('dashboard', $user->id))->with('success', 'Modifications effectuées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('welcome'))->withSuccess('Suppression réussite');
    }



}
