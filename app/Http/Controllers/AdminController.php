<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Group;
use Auth;
use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{
    /*
     * admin index
     */
    public function getIndex()
    {
        return view('admin.index');
    }

    public function getCreateUser()
    {
        $roles=Role::all();
        $groups=Group::all();
        $users=User::paginate(10);
        return view('admin.user')->withRoles($roles)->withGroups($groups)->withUsers($users);
    }

    public function postCreateUser(Request $request){
        $this->validate($request,[
           'userName'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'

        ]);
        $userName=$request->userName;
        $email=$request->email;
        $password=bcrypt($request->password);
        $roleName=$request->roleName;
        $groupName=$request->groupName;
        $user=new User();
        $user->name=$userName;
        $user->email=$email;
        $user->password=$password;
        $user->status=1;
        $user->group_id=$groupName;
        $user->save();
        if(!empty($roleName)){
            $user->roles()->attach($roleName);
        }

        return redirect()->back()->withInput()->withErrors(['notice'=>'user has been created']);
    }

    public function getEditUser($id){
        $user=User::find($id);
        $roles=Role::all();
        $groups=Group::all();
        return view('admin.editUser')->withUser($user)->withRoles($roles)->withGroups($groups);

    }
    public function getActiveUser($id){
        $user=User::find($id);
        if($user->status=="1"){
            $user->status="0";
        }else if($user->status=="0"){
            $user->status="1";
        }
        $user->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'user has been updated']);
    }
    public function getDeleteUser($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->withInput()->withErrors(['notice'=>'user deleleted']);
    }
    public function postUpdateUser(Request $request){
        $userName=$request->userName;
        $email=$request->email;
        $password=bcrypt($request->password);
        $roleName=$request->roleName;
        $groupName=$request->groupName;
        $user=User::find($request->id);
        $user->name=$userName;
        $user->email=$email;
        $user->password=$password;
        $user->status=1;
        $user->group_id=$groupName;
        $user->save();
        $user->roles()->detach();
        if(!empty($roleName)){
            $user->roles()->attach($roleName);
        }

        return redirect()->route('createUser')->withInput()->withErrors(['notice'=>'user has been updated']);
    }

    public function getCreateGroup()
    {
        $groups = Group::paginate(10);
        return view('admin.group')->withGroups($groups);
    }

    public function postCreateGroup(Request $request)
    {
        $this->validate($request, [
            'groupName' => 'required',
            'groupType' => 'required'
        ]);
        $groupName = $request->groupName;
        $groupType = $request->groupType;
        $groupDescription = $request->groupDescription;
        $group = new Group();
        $group->name = $groupName;
        $group->type = $groupType;
        $group->description = $groupDescription;
        $group->save();
//        $group->users()->attach(Auth::user()->id);
        return redirect()->back()->withInput()->withErrors(['notice' => 'group has been created']);

    }

    public function getEditGroup($id)
    {
        $group = Group::find($id);
        return view('admin.editGroup')->withGroup($group);
    }

    public function getDeleteGroup($id)
    {
        $group = Group::find($id);
        $group->delete();
        $users=User::where('group_id',$id)->get();
        foreach ($users as $user){
            $user=User::find($user->id);
            $user->group_id=Null;
            $user->save();
        }
        return redirect()->back()->withInput()->withErrors(['notice' => 'group has been deleted']);
    }

    public function getActive($id)
    {
        $group = Group::find($id);
        if ($group->active == '1') {
            $group->active = "0";
        } else if ($group->active == '0') {
            $group->active = '1';
        }
        $group->save();
        return redirect()->back()->withInput()->withErrors(['notice' => 'status group has been updated']);
    }

    public function postUpdateGroup(Request $request)
    {
        $id = $request->id;
        $groupName = $request->groupName;
        $groupType = $request->groupType;
        $groupDescription = $request->groupDescription;
        $group = Group::find($id);
        $group->name = $groupName;
        $group->type = $groupType;
        $group->description = $groupDescription;
        $group->save();
        return redirect()->route('createGroup')->withInput()->withErrors(['notice' => 'group has been updated']);

    }

    public function getSearchGroup(Request $request){
        $search=$request->search;
        $groups=Group::where('name','LIKE','%'.$search.'%')->get();
        return view('admin.searchGroup')->with('groups',$groups);
    }

    public function getCreateRole()
    {
        $roles = Role::paginate(10);
        return view('admin.role')->withRoles($roles);
    }

    public function postCreateRole(Request $request)
    {
        $this->validate($request, [
            'roleName' => 'required',

        ]);
        $roleName = $request->roleName;
        $roleDescription = $request->roleDescription;
        $role = new Role();
        $role->name = $roleName;
        $role->permission = $request->rolePermission;
        $role->description = $roleDescription;
        $role->save();
        return redirect()->back()->withInput()->withErrors(['notice' => 'role has been created']);
    }

    public function getEditRole($id)
    {
        $role = Role::find($id);
        return view('admin.editRole')->withRole($role);
    }

    public function getDeleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->withInput()->withErrors(['notice' => 'role has been deleted']);

    }

    public function postUpdateRole(Request $request)
    {
        $this->validate($request, [
            'roleName' => 'required',

        ]);
        $roleName = $request->roleName;
        $roleDescription = $request->roleDescription;
        $role = Role::find($request->id);
        $role->name = $roleName;
        $role->permission = $request->rolePermission;
        $role->description = $roleDescription;
        $role->save();
        return redirect()->route('createRole')->withInput()->withErrors(['notice'=>'role has been updated']);
    }

    public function getSetting(){
        $setting=Setting::first();
        return view('admin.setting')->withSetting($setting);
    }

    public function postSetting(Request $request){
        $setting=Setting::first();
        $autoBackup=$request->autoBackup;
        $backupDate=$request->backupDate;
        $alertDateline=$request->alertDateline;
        if($autoBackup){
            $autoBackup="1";
        }else{
            $autoBackup="0";
        }

        if($alertDateline){
            $alertDateline="1";
        }else{
            $alertDateline="0";
        }

        if(!count($setting)){
            $setting=new Setting();
            $setting->auto_backup=$autoBackup;
            $setting->alert=$alertDateline;
            $setting->date=$backupDate;
            $setting->save();
            return redirect()->back()->withInput()->withErrors(['notice'=>'setting has been saved']);

        }else{
            $setting=Setting::find($setting->id);
            $setting->auto_backup=$autoBackup;
            $setting->alert=$alertDateline;
            $setting->date=$backupDate;
            $setting->save();
            return redirect()->back()->withInput()->withErrors(['notice'=>'setting has been updated']);
        }
    }

    public function getAccountAdmin(){
        return view('admin.adminAccount');
    }
    public function getUpdateProfile(Request $request){
        $id=$request->id;
        $user=User::find($id);
        $name=$request->userName;
        $password=$request->password;
        if(!empty($password)){
            $password=bcrypt($password);
            $user->password=$password;
        }
        $user->name=$name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('AccountAdmin')->withInput()->withErrors(['notice'=>'Profile has been updated']);
    }
    public  function  getUpdateMyProfile(Request $request){
        return view('admin.profile');
    }
    public  function getLeaderUpdateMyProfile(Request  $request){
        return view('leader.profile');
    }
    public  function getMemberUpdateMyProfile(){
        return view('member.profile');
    }
    public function postUpdateMyProfile(Request $request){
        $id=Auth::user()->id;
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        $user->save();
        return redirect()->back()->withInput()->withErrors(['notice'=>'profile update complete']);
    }


}
