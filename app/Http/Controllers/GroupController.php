<?php

namespace App\Http\Controllers;
use App\Group;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class GroupController extends Controller
{

  public function index(Request $request){
    $groups = group::orderBy('code','asc')
    -> when($request -> query('name'), function($query) use ($request){
      return $query -> where('name','like','%'.$request -> query('name').'%');
    })
    -> paginate(10);

    return view('groups.index',[
      'groups'=>$groups
    ]);
  }

  public function create(){
    $group = new group();

    return view('groups.create',[
      'group'=>$group,
    ]);
  }

  public function store(Request $request){
    $group = new group;
    $group->fill($request->all());
    $group->save();

    return redirect()->route('group.index');
  }

  public function show($id){
    $group = group::find($id);
    if(!$group) throw new ModelNotFoundException;
    return view('groups.show',  [
      'group'=>$group
    ]);
  }

  public function edit($id){
    $group = group::find($id);
    $member = Member::orderBy('id','asc ')->get();

    if(!$group) throw new ModelNotFoundException;

    return view('groups.edit',[
      'group'=>$group,
      'member'=>$member
    ]);
  }

  public function update(Request $request, $id) {
    $group = group::find($id);
    if(!$group) throw new ModelNotFoundException;

    $group->fill($request->all());

    $member_id = $request->input('member_id');
    $group->members()->sync($member_id);
    $group->save();

    return redirect()->route('group.index');
  }

  public function destroy($id){

  }
  
  public function __construct(){
    $this->middleware('auth');
  }


}
