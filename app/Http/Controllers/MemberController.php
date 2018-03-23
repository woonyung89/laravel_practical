<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UpdateMember;
use App\Http\Requests\StoreMember;
use App\Member;
use App\Group;
class MemberController extends Controller
{
    //
    public function create(){
		    $member = new Member();

        return view('members.create',[
          'member'=>$member,
        ]);
	}
  public function store(StoreMember $request){


         $member = new Member;
         $member->fill($request->all());
         $member->save();

        return redirect()->route('member.index');
  }

  public function show($id){
    $member = Member::find($id);


    if(!$member) throw new ModelNotFoundException;
    return view('members.show',  [
      'member'=>$member
    ]);
  }

  // public function index(){
  //   //$members = Member::orderBy('name','asc')->get();
  //   $members = Member::simplePaginate(10);
  //   return view('members.index',[
  //     'members'=>$members
  //
  //   ]);
  // }

  public function edit($id){
    $member = Member::find($id);
    $group = Group::orderBy('code','asc')->get();

    if(!$member) throw new ModelNotFoundException;

    return view('members.edit',[
      'member'=>$member,
      'group'=>$group

    ]);
  }

  public function update(UpdateMember $request, $id){
    $member = Member::find($id);


    if(!$member) throw new ModelNotFoundException;
    $member->fill($request->all());
    $group_id = $request->input('group_id');
  //  dd($group_id);
    $member_id = $request->input('membership_no');

    $member->groups()->syncWithoutDetaching($group_id);


    $member->save();

    return redirect()->route('member.index');
  }

  // public function assign($group_id, $member_id){
  //
  //
  //   foreach($group_id as $key => $val) {
  //     $group = Group::find($val);
  //     //if(!$group) throw new ModelNotFoundException;
  //     $group->members()->sync($member_id);
  //     //$group->save();
  //   }
  //
  // }

  public function index(Request $request){
    $members = Member::with('division:id,code,name')
                        ->when($request -> query('membership_no'), function($query) use ($request){
                          return $query -> where('membership_no',$request -> query('membership_no'));
                        })
                        ->when($request -> query('nric'), function($query) use ($request){
                          return $query -> where('nric',$request -> query('nric'));
                        })

                        ->when($request -> query('name'), function($query) use ($request){
                          return $query -> where('name','like','%'.$request -> query('name').'%');
                        })
                        ->when($request -> query('gender'), function($query) use ($request){
                          return $query -> where('gender',$request -> query('gender'));
                        })
                        ->when($request -> query('division_id'), function($query) use ($request){
                          return $query -> where('division_id',$request -> query('division_id'));
                        })
                        ->paginate(10);

              return view('members.index',[
                'members'=>$members,
                'request'=>$request,
              ]);
  }

  public function group($id){
    $member = Member::find($id);
    $group = Group::orderBy('code','asc')->get();

    if(!$member) throw new ModelNotFoundException;
    return view('members.group',  [
      'member'=>$member,
      'group'=>$group
    ]);
  }

  public function upload($id){
    $member = Member::find($id);
    if(!$member) throw new ModelNotFoundException;
    return view('members.upload',[
      'member' => $member,
    ]);
  }
  public function __construct(){
    $this->middleware('auth');
  }
}
