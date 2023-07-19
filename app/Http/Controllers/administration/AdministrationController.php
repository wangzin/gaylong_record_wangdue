<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use App\Models\administration\Shops;
use App\Models\administration\SystemRole;
use App\Models\administration\UserRole;
use App\Models\GaylongModel;
use App\Models\User;
use App\Traits\AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdministrationController extends Controller{
    use AuthUser;

    public function ལག་ལེན་པའི་རྒྱས(){
        $response_data = User::join('role_user as ur','ur.user_id','users.id')
        ->join('roles as r','r.id','ur.role_id')
        ->select('users.*','r.title','r.id AS roleid')
        ->get();
        $page="administration/user_list";
        $roleList  = SystemRole::where('status','1')->get();
        return view('dashboard')->with(compact('page','response_data','roleList'));
    }

    public function ལག་ལེན་པ་གསརཔ(Request $request){
        $user_data =[
            'name'                      =>  $request->full_name,
            'phone_no'                  =>  $request->mobile_no,
            'email'                     =>  $request->email,
            'designation'               =>  $request->designation,
        ];
        $path=null;
        $files = $request->pro_pic;
        $file_store_path =  'pro_pic';
        if ($files != null && $files != "") {
            if (!is_dir($file_store_path)) {
                mkdir($file_store_path, 0777, TRUE);
            }
            if($request->profile_pic_exis!=null && $request->profile_pic_exis!=""){
                $fle="pro_pic/".$request->profile_pic_exis;
                $result = File::exists($fle);
                if($result){
                    unlink($fle);
                }
            }
            $path = time() . '_' . $files->getClientOriginalName();
            move_uploaded_file($files, $file_store_path . '/' . $path);
        }

        $alert_type="success";
        if($request->action_type=="add"){
            $ceck_user_cid=User::where('email',$request->email)->first();
            if($ceck_user_cid!=null && $ceck_user_cid!=""){
                $alert_type="danger";
                $message="འདི་ལག་ཁྱུར་ཨང་ ཧེ་མ་ལས་བཙུགས་ནུག། ལག་ཁྱུར་ཨང་སོ་སོ་བཙུགས་གནང་།";
                return redirect()->away('ལག་ལེན་པའི་རྒྱས')->with($alert_type, $message);
            }

            $ranpass=$request->password;
            $message="ལག་ལེན་པ་གི་རྒྱས་བཤད་དང་གསང་ཚིག་ ".$ranpass.' འདི་ཐོ་སྐྱེད་འབད་ཡི། བཀའ་དྲིན་ཆེ།';
            $password=Hash::make($ranpass);
            $user_data =$user_data+[
                'password'          =>  $password,
                'profile_pic'       =>  $path,
                'created_at'        =>  date('Y-m-d h:i:s'),
            ];
            $user=User::create($user_data);
            if($user){
                $role_data =[
                    'user_id'                  =>  $user->id,
                    'role_id'                  =>  1,
                ];
                UserRole::create($role_data);
            }
        }
        if($request->action_type=="edit"){
            if(isset($request->password)){
                $password=Hash::make($request->password);
                $user_data =$user_data+[
                    'password'          =>  $password,
                ];
            }
            $user_data =$user_data+[
                'profile_pic'       =>  $path,
                'updated_at'        =>  date('Y-m-d h:i:s'),
            ];
            try{
                $user=User::where('id',$request->record_id)->update($user_data);
                $message="ལག་ལེན་པའི་རྒྱས་བཤད་ཚུ་དུས་མཐུན་བཟོ་ཡི།";
            }catch (\Illuminate\Database\QueryException $e){
                $alert_type="danger";
                $message="ལག་ལེན་པའི་རྒྱས་བཤད་ཚུ་དུས་མཐུན་བཟོ་མ་ཚུགས།::error: ".$e->errorInfo[2];
            }
        }
        return redirect()->away('ལག་ལེན་པའི་རྒྱས')->with($alert_type, $message);
    }
    public function བཏོག༌གཏང(Request $reauest){
        $det=User::where('id',$reauest->record_delete_id)->first();
        $fle="pro_pic/".$det->profile_pic;
        $result = File::exists($fle);
        if($result){
            unlink($fle);
        }
        User::where('id',$reauest->record_delete_id)->delete();
        $alert_type="danger";
        $message="ལག་ལེན་པའི་རྒྱས་བཤད་ཚུ་བཏོག་བཏང་ཡི། བཀའ་དྲིན་ཆེ།";
        return redirect()->away('ལག་ལེན་པའི་རྒྱས')->with($alert_type, $message);
    }

    public function  དགེ་སློང་ཐོ་བཀོད(Request $reauest){
        $response_data = GaylongModel::get();
        $page="administration/gyalong_list";
        return view('dashboard')->with(compact('page','response_data'));
    }
    public function དགེ་སློང་གི་ཐོ་ཡིག་གསརཔ(Request $request){
        $path=$request->profile_pic_exis;
        $files = $request->pro_pic;
        $file_store_path =  'std_pic';
        if ($files != null && $files != "") {
            if (!is_dir($file_store_path)) {
                mkdir($file_store_path, 0777, TRUE);
            }
            if($request->profile_pic_exis!=null && $request->profile_pic_exis!=""){
                $fle=$file_store_path."/".$request->profile_pic_exis;
                $result = File::exists($fle);
                if($result){
                    unlink($fle);
                }
            }
            $path = time() . '_' . $files->getClientOriginalName();
            move_uploaded_file($files, $file_store_path . '/' . $path);
        }
        $user_data =[
            'cid_no'                        =>  $request->cid_no,
            'person_name'                   =>  $request->person_name,
            'choe_name'                     =>  $request->choe_name,
            'dzongkhag'                     =>  $request->dzongkhag,
            'gewog'                         =>  $request->gewog,
            'village'                       =>  $request->village,
            'gung_no'                       =>  $request->gung_no,
            'thrm_no'                       =>  $request->thrm_no,
            'contact_no'                    =>  $request->contact_no,
            'age_name'                      =>  $request->age_name,
            'age'                           =>  $request->age,
            'age_in_std'                    =>  $request->age_in_std,
            'year_of_enrolment'             =>  $request->year_of_enrolment,
            'father_name'                   =>  $request->father_name,
            'mother_name'                   =>  $request->mother_name,
            'identy_no'                     =>  $request->identy_no,

            'dratshang'                     =>  $request->dratshang,
            'deprim'                        =>  $request->deprim,
            'thodabaang'                    =>  $request->thodabaang,
            'blood_group'                   =>  $request->blood_group,
            'father_no'                     =>  $request->father_no,
            'mother_no'                     =>  $request->mother_no,
            'dob'                           =>  $request->dob,
            'gyandey'                       =>  $request->gyandey,
            'guardian_name'                 =>  $request->guardian_name,
            'guardian_no'                   =>  $request->guardian_no,
            
            'pro_pic'                       =>  $path,
            'remarks'                       =>  $request->remarks,
        ];
        $alert_type="success";
        if($request->action_type=="add"){
            $ceck_user_cid=GaylongModel::where('cid_no',$request->cid_no)->first();
            if($ceck_user_cid!=null && $ceck_user_cid!=""){
                $alert_type="danger";
                $message="འདི་ལག་ཁྱུར་ཨང་ ཧེ་མ་ལས་བཙུགས་ནུག། ལག་ཁྱུར་ཨང་སོ་སོ་བཙུགས་གནང་།";
                
            }
            $user_data =$user_data+[
                'created_at'        =>  date('Y-m-d h:i:s'),
                'created_by'        =>  Session::get('User_Details')['user_id'],
            ];
            GaylongModel::create($user_data);
            $message="དགེ་སློང་གི་རྒྱས་བཤད་འདི་ཐོ་སྐྱེད་འབད་ཡི། བཀའ་དྲིན་ཆེ།";
        }
        if($request->action_type=="edit"){
            $user_data =$user_data+[
                'updated_at'        =>  date('Y-m-d h:i:s'),
                'updated_by'        =>  Session::get('User_Details')['user_id'],
            ];
            try{
                GaylongModel::where('id',$request->record_id)->update($user_data);
                $message="དགེ་སློང་གི་རྒྱས་བཤད་ཚུ་དུས་མཐུན་བཟོ་ཡི།";
            }catch (\Illuminate\Database\QueryException $e){
                $alert_type="danger";
                $message="དགེ་སློང་གི་རྒྱས་བཤད་ཚུ་དུས་མཐུན་བཟོ་མ་ཚུགས།::error: ".$e->errorInfo[2];
            }
        }
        return redirect()->away('དགེ་སློང་ཐོ་བཀོད')->with($alert_type, $message);
    }
    
    public function དགེ་སློང་གི་ཐོ་ཡིགབཏོག༌གཏང(Request $reauest){
        $det=GaylongModel::where('id',$reauest->record_delete_id)->first();
        if($det->pro_pic!=null && $det->pro_pic!=""){
            $fle="std_pic/".$det->pro_pic;
            $result = File::exists($fle);
            if($result){
                unlink($fle);
            }
        }
        
        GaylongModel::where('id',$reauest->record_delete_id)->delete();
        $alert_type="danger";
        $message="ལག་ལེན་པའི་རྒྱས་བཤད་ཚུ་བཏོག་བཏང་ཡི། བཀའ་དྲིན་ཆེ།";
        return redirect()->away('དགེ་སློང་ཐོ་བཀོད')->with($alert_type, $message);
    }
    
    public function ཐོ་བཀོད་འཚོལ($param){
        $page="administration/search_index";
        $message='';
        return view('dashboard')->with(compact('page','message','param'));
    }
    
    public function ཐོ་བཀོད་འཚོལ་ནི(Request $request){
        
        $user =GaylongModel::where('cid_no',$request->application_number)->first();
        if($user ==null || $user ==""){
            $message='འདི་ངོ་སྤྲེད་ཨང་གུ་དགེ་སློང་གི་རྒྱས་བཤད་མིན་དུག།';
            $page="administration/search_index";
        }else{
            if($request->param=="འཚོལ"){
                $page="administration/search_details";
            }else{
                $page="administration/print_cid";
            }
            $message='';
        }
        return view('dashboard')->with(compact('page','message','user'));
    }
}
