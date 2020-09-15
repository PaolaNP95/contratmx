<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Role;
use App\RoleUser;
use DB;
use App\Notifications\NewUser;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
        $fulldata=User::all();
        $role_user=Role::all();
        
        return view('system/users/index')->with('fulldata',$fulldata)->with('role_user',$role_user);
    }
    function costumer(){
        $fulldata=$this->show_costumer();
        $fulldata2=User::all();
        $role_user=$this->rol_user();
        return view('system/users/costumer')->with('fulldata',$fulldata)->with('fulldata2',$fulldata2)->with('role_user',$role_user);
    }
    function settings(){
        $user_id = Auth::id(); 
        $user=User::find($user_id);
        $user_quantity=DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->where('user_id','LIKE',$user_id)
            ->count();
        return view('system/users/settings')->with('user',$user)->with('user_quantity',$user_quantity);
    }
    function rol_user(){
        $roles=Role::all();
        return $roles;
    }
    function show_costumer(){
        $user_data=Role::with('users')->where('id','LIKE',2)->get();
        /*
        $user_data=DB::table('users')  
                ->join('role_user','role_user.user_id','=','users.id')
                ->join('roles','roles.id','=','role_user.user_id')
                ->select('users.*','role_user.*','roles.*')
                ->where('roles.id','=',2)
                ->get();
        */
        return $user_data;
    }
    function store(Request $request){

        $role_costumer = Role::where('name', 'costumer')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_employ = Role::where('name', 'employ')->first();

        $new_user=new User();
        $user=Auth::id();
        $new_user->user_name=$request->input('name');
        $new_user->lastname=$request->input('lastname');
        $new_user->phone=$request->input('phone');
        $new_user->ocupation=$request->input('ocupation');
        $new_user->email=$request->input('email');
        $new_user->state=$request->input('state');
        $new_user->city=$request->input('city');
        $new_user->zip=$request->input('zip');
        $new_user->address=$request->input('address');

        $email=$request->input('email');
        
        $valid_user=User::where('email','like',$email)->get();
    
        if(count($valid_user)==0)
        {
            $role=$request->input('role');
            if($role==1){
                $new_user->company='CONTRATMX';
                $new_user->password = bcrypt('Pass123$');
                $new_user->save();
                $new_user->roles()->attach($role_admin);

                $fromUser = User::find($user);
                $toUser = User::find($new_user->id);
                
                $toUser->notify(new NewUser($fromUser));
                return redirect()->back()->with('success','Usuario ingresado');

            }
            else if($role==2){
                $new_user->company=$request->input('company');
                $new_user->password = bcrypt('Pass123$');
                $new_user->save();
                $new_user->roles()->attach($role_costumer);
                
                $fromUser = User::find($user);
                $toUser = User::find($new_user->id);
                
                $toUser->notify(new NewUser($fromUser));
                return redirect()->back()->with('success','Usuario ingresado');

            }
            else{
                $new_user->company='CONTRATMX';
                $new_user->password = bcrypt('Pass123$');
                $new_user->save();
                $new_user->roles()->attach($role_employ);
                $fromUser = User::find($user);
                $toUser = User::find($new_user->id);
                
                $toUser->notify(new NewUser($fromUser));
                return redirect()->back()->with('success','Usuario ingresado');
            }
        }else{
            return redirect()->back()->with('error','Correo ya registrado');
        }
    
        
    }
    function delete_user($user_id)
    {
        $current_user=Auth::id();
        try {
            
            if ($current_user!=$user_id) {
                $user=DB::table('users')  
                ->join('role_user','role_user.user_id','=','users.id')
                ->where('users.id','=',$user_id)
                ->delete();
                return redirect()->back()->with('success','Usuario eliminado');
            } else {
                return redirect()->back()->with('error','Accion denegada, Usuario en sesión');
            }
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Accion denegada.');
        }
    }
    function delete_account($user_id)
    {
        $current_user=Auth::id();
        try {
            
                $user=DB::table('users')  
                ->join('role_user','role_user.user_id','=','users.id')
                ->where('users.id','=',$user_id)
                ->delete();

            return view('login');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Accion denegada.');
        }
    }
    function show(Request $request){
        $fulldata=User::all();
        $user_id=$request->input('search_user');
        $user=User::where('id','=',$user_id)
                ->orderBy('user_name')
                ->take(10)
                ->get();
        return view('system/users/single_user')->with('user',$user)->with('fulldata',$fulldata);
    }
    function edit($id){
        $user=User::find($id);
        $roles=Role::all();
        return view('system/users/edit',compact('user','id'))->with('role_user',$roles)->with('success','Información Actualizada');
    }
    function select_user($id){
        $user=User::find($id);
        return view('system/users/info')->with('user',$user);
    }
    function update(Request $request, $id){

        try {
            $user=User::find($id);
            $user->user_name=$request->get('name');
            $user->lastname=$request->get('lastname');
            $user->phone=$request->get('phone');
            $user->ocupation=$request->get('ocupation');
            $user->email=$request->get('email');
            $user->company=$request->get('company');
            $user->state=$request->get('state');
            $user->city=$request->get('city');
            $user->zip=$request->get('zip');
            $user->address=$request->get('address');

            $user->save();
            return redirect()->back()->with('success','Información actualizada');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción Denegada');
        }
    }
    function update_password(Request $request){
        

        $user_id = Auth::id(); 
        $user=User::find($user_id);
        $password=$request->get('password');
        $password_verified=$request->get('password_verified');

        if($password==$password_verified){
            $user->password = bcrypt($password_verified);
            $user->save();
            return redirect()->back()->with('success','Contraseña Actualizada');
        }else{
            return redirect()->back()->with('error','Las contraseñas no coinciden');
        }
    }
}
