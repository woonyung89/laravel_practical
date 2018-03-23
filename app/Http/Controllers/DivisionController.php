<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class DivisionController extends Controller
{
    public function create(){
		    $division = new Division();

        return view('divisions.create',[
          'division'=>$division,
        ]);
	}
  public function store(Request $request){
         $division = new Division;
         $division->fill($request->all());
         $division->save();

         return redirect()->route('division.index');
      }

  public function index(Request $request){
    $divisions = Division::orderBy('name','asc')
      ->when($request -> query('code'),function($query) use ($request){
        return $query -> where('code', $request -> query('code'));
    })
      ->when($request -> query('name'),function($query) use ($request){
        return $query -> where('name', 'like','%'. $request -> query('name').'%');
      })
      ->when($request -> query('state'),function($query) use ($request){
        return $query -> where('state', $request -> query('state'));
      })
      ->paginate(10);

    return view('divisions.index',[
      'divisions'=>$divisions
    ]);
  }

  public function show($id){
    $division = Division::find($id);
    if(!$division) throw new ModelNotFoundException;
    return view('divisions.show',  [
      'division'=>$division
    ]);
  }

  public function edit($id){
    $division = Division::find($id);
    if(!$division) throw new ModelNotFoundException;

    return view('divisions.edit',[
      'division'=>$division
    ]);
  }

  public function update(Request $request, $id){
    $division = Division::find($id);
    if(!$division) throw new ModelNotFoundException;

    $division->fill($request->all());

    $division->save();

    return redirect()->route('division.index');
  }

  public function __construct(){
    $this->middleware('auth');
  }
}
