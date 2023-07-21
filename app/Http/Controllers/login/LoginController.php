<?php

namespace App\Http\Controllers\login;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\GaylongModel;
use App\Models\RoleModel;
use App\Models\transaction\SellsDetails;
use App\Models\User;
use App\Models\UserRole;
use App\Traits\AuthUser;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller{
    use AuthUser;
    public function གནང་འཛུལ(Request $request){
        $rules = [
            'email'  =>  'required',
            'password'  =>  'required',
        ];
        $customMessages = [
            'email.required' => 'The CID field is required',
            'password.required' => 'The Password field is required',
        ];
        $this->validate($request, $rules, $customMessages);
        if(Session::get('User_details')==null){
            $user = User::where('email', $request->only('email'))->get();
            if($user!=null && $user!="" && sizeof($user)>0){
                $validated=false;
                $user_dertails=[];
                foreach($user as $us){
                    if (Hash::check($request->password, $us->password)) {
                        $validated=true;
                        if( $us->user_status==0 || $us->user_status=="0"){
                            return view('index',['Invalid'=>'This email is inactive. Please contact admin for more information']);
                        }
                        $role=UserRole::where('user_id',$us->id)->get();
                        $role_names='';
                        $role_ids='';
                        if($role!=null && $role!="" && sizeof($role)>0){
                            foreach($role as $role){
                                $roles=RoleModel::where('id',$role->role_id)->first();
                                if($roles!=null && $roles!=""){
                                    $role_names.=', '.$roles->title;
                                    $role_ids.=', '.$roles->id;
                                }
                            }
                        }else{
                            return view('index',['Invalid'=>'This user is not mapped with role. Please contact system administrator']);
                        }
                        $user_dertails=[
                            'user_id'=>$us->id,
                            'name'=>$us->name,
                            'profile_pic'=>$us->profile_pic,
                            'role_id'=>ltrim(rtrim($role_ids,', '),', '),
                            'role_name'=>ltrim(rtrim($role_names,', '),', '),
                        ];
                        $update_data=[
                            'last_login_date'                       =>  date('Y-m-d h:i:s'),
                        ];
                        User::where('id',$us->id)->update($update_data);
                    }
                }
                if(!$validated){
                    return view('index',['Invalid'=>'ཁྱཽད་ཀྱིས་མིང་རྟགས་དང་ གསང་ཚིག་ རྟགས་མ་མཐུན།']);
                }else{
                    Session::put('User_Details', $user_dertails);
                    return redirect()->route('སྟོན་སྟེགས');
                }
            }else{
                return view('index',['Invalid'=>'དེའི་མིང་རྟགས་ ('.$request->email.') འདི་ཀམ་པིའུ་ཊ་ནང་ ཐོ་བཀོད་མིན་འདུག།']);
            }
        }
    }

    public function སྟོན་སྟེགས(Request $request){
        if(Session::get('User_Details')!=""){
            $response_data = GaylongModel::latest()->take(5)->get();
            $page="dashboard_content";
            return view('dashboard')->with(compact('page','response_data'));
        }else{
            return response()->view('index',['Invalid'=>'Session Time out. Please login again']);
        }
    }

    public function profile(){
        if(Session::get('User_Details')!=""){
            $page="profile";
            $user_id=$this->userId();
            $role_names='';
            $lab_names='';
            $user = User::where('id',$user_id)->first();
            if($user!=null && $user!=""){
                $roles=UserRole::where('user_id',$user_id)->get();
                if($roles!=null && $roles!="" && sizeof($roles)>0){
                    foreach($roles as $role){
                        $roles=RoleModel::where('id',$role->role_id)->first();
                        if($roles!=null && $roles!=""){
                            $role_names.=', '.$roles->title;
                        }
                    }
                    $user->role_name=ltrim(rtrim($role_names,', '),', ');
                }
            }
            return view('dashboard')->with(compact('page','user'));
        }else{
            return response()->view('login',['Invalid'=>'Session Time out. Please login again']);
        }

    }

    public function validate_password($curr_pass){
        $users = User::where('id', Session::get('User_Details')['user_id'])->first();
        if (!Hash::check($curr_pass, $users->password)) {
            return response()->json(false);
        }
        return response()->json(true);
    }

    public function password_change(){
        if(Session::get('User_Details')!=""){
            $page="password_change";
            $user_id=$this->userId();
            $role_names='';
            $lab_names='';
            $user = User::where('id',$user_id)->first();
            if($user!=null && $user!=""){
                $roles=UserRole::where('user_id',$user_id)->get();
                if($roles!=null && $roles!="" && sizeof($roles)>0){
                    foreach($roles as $role){
                        $roles=RoleModel::where('id',$role->role_id)->first();
                        if($roles!=null && $roles!=""){
                            $role_names.=', '.$roles->title;
                        }
                    }
                    $user->role_name=ltrim(rtrim($role_names,', '),', ');
                }
            }
            return view('dashboard')->with(compact('page','user'));
        }else{
            return response()->view('login',['Invalid'=>'Session Time out. Please login again']);
        }

    }
    public function update_user_password(Request $request){
        $rules = [
            'curr_password'  =>  'required',
            'new_password'  =>  'required',
            'confirm_password'  =>  'required',
        ];
        $customMessages = [
            'curr_password.required' => 'The field is required',
            'new_password.required' => 'The field is required',
            'confirm_password.required' => 'The field is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $users = User::where('id', $this->userId())->first();
        if ($users != null && $users != "") {
            $password = $request->confirm_password;
            $pass_data = [
                'password' => Hash::make($password),
            ];
            try {
                $update_data = User::where('id', $this->userId())->update($pass_data);
                if ($update_data != null && $update_data == 1) {
                    $message = "Your password has been changed. Please relogin to verify for your updated password";
                    $alert_type="success";
                } else {
                    $message= 'Not able to update password. Pelase try again';
                    $alert_type="danger";
                }
            } catch (Exception $e) {
                return json_encode('Not able to update password.Errr: ' . $e);
                $alert_type="danger";
            }
        } else {
            return json_encode('No user with this CID/EMAIL. Please check your provied input and try again ');
            $alert_type="danger";
        }
        return redirect()->away('password_change')->with($alert_type, $message);
    }
    public function ཕྱི་མཐོན(){
        Session::forget('User_Details');
        Session::flush();
        return redirect()->away('/');
    }
    public function symlink(){
        $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
        symlink($targetFolder,$linkFolder);
        echo 'Symlink process successfully completed';
    }
    public function viewFiles($full_path = "")
    {
        // return response()->download('public/DzongkhaKeyboard.zip'); //in server
        return response()->download('DzongkhaKeyboard.zip');
    }
}
