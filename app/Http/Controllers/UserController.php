<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Auth;

class UserController extends Controller{
    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('superadmin');
      // $this->middleware('superadmin');
    }

//goggle login
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function loginWithGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('12345678')
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            // dd($exception->getMessage());
            Session::flash('error','This email is registered. You cannot log in with the email which you used in your Google Account!');
            return redirect('/login');
        }
    }

    //facebook login
        public function facebookRedirect()
        {
            return Socialite::driver('facebook')->redirect();
        }


        public function loginWithFacebook()
        {
            try {

                $user = Socialite::driver('facebook')->user();
                $isUser = User::where('fb_id', $user->id)->first();

                if($isUser){
                    Auth::login($isUser);
                    return redirect('/dashboard');
                }else{
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'fb_id' => $user->id,
                        'password' => encrypt('12345678')
                    ]);

                    Auth::login($createUser);
                    return redirect('/dashboard');
                }

            } catch (Exception $exception) {
                Session::flash('error',"This email is registered. You cannot log in with the email which you used in your Facebook Account!");
                return redirect('/login');
            }
        }


    public function index(){
      $allUser=User::orderBy('id','DESC')->get();
      return view('admin.user.all',compact('allUser'));
    }

    public function add(){
      return view('admin.user.add');
    }

    public function edit($slug){

    }

    public function view(){
      return view('admin.user.view');
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required'],
      ],[
        'name.required'=>'Please Enter Name!',
        'email.required'=>'Please Enter Email!',
        'password.required'=>'Please Enter Password!',
        'role.required'=>'Please Select Your Role!',
      ]);
      $insert=User::insertGetId([
        'name'=>$request['name'],
        'phone'=>$request['phone'],
        'email'=>$request['email'],
        'password'=>Hash::make($request['password']),
        'role'=>$request['role'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/users/'.$imageName);

        User::where('id',$insert)->update([
          'photo'=>$imageName,
        ]);
      }

      if($insert){
        Session::flash('success','Successfully add User information.');
        return redirect('dashboard/user/add');
      }else{
        Session::flash('error','Opps! please try again.');
        return redirect('dashboard/user/add');
      }

    }

    public function update(){

    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }

}
