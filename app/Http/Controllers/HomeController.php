<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Area;

class HomeController extends Controller
{
    public function index(){
        $division = Division::all();
        // dd($division);
        return view('welcome',compact('division'));
    }

    public function get_district_data(Request $request){
        // dd($request->all());
        $district = District::where('division_id', $request->getdivision)->get();
        
        return response()->json(array('district' => $district));
    }

    public function get_area(Request $request){
        // dd($request->all());
        $area = Area::where('district_id', $request->getdistrict)->get();
        // dd($area);
        return response()->json(array('area' => $area));

    }

    public function getdivision(){
        $division = Division::all();
        return response()->json(['division'=> $division]);
    }

    public function addDivision(Request $request){
        // dd($request->all());
        // return response()->json(['ss'=> $request->all()]);
        $brand = new Division();
        $brand->name = $request->name;
     
        $brand->save();
        return response()->json(['division'=> $brand]);
    }
    public function addDistrict(Request $request){
        // dd($request->all());
        // return response()->json(['ss'=> $request->all()]);
        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
     
        $district->save();
        return response()->json(['district'=> $district]);
    }

    public function deleteDivision(Request $request)
    {
        // dd($request->all());
        $brand = Division::where('id', $request->id)->first();
        
        $brand->delete();

        return response()->json(['brand'=>$brand]);
    }

    public function getdistrict(Request $request){
        
        $district = District::where('division_id',$request->id)->get();
        return response()->json(['district'=> $district]);
    }

    public function deleteDistrict(Request $request){
        $district = District::where('id', $request->id)->first();
        
        $district->delete();

        return response()->json(['district'=>$district]);
    }

    public function getArea(Request $request){
        // dd($request->all());
        $division = Division::where('id', $request->divId)->first();
        $district = District::where('division_id',$request->distId)->first();
        $area = Area::where('district_id', $request->distId)->get();
        return $area;

    }
}
