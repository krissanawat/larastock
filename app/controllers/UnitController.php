<?php 

class UnitController extends BaseController {

	public function index(){
            if(Request::isMethod('post')){
//                dd(Input::all());
                $unit = Unit::find(Input::get('id'));
                if(empty($unit)){
                    $unit = new Unit;
                    $unit->id = Input::get('id');
                }
                
                $unit->name = Input::get('name');
                $unit->save();
                return Redirect::back()->with('success','เพิ่มข้อมูลสำเร็จ');
            }else{
            	$unit = Unit::all();
                return View::make('unit.index',array('unit'=>$unit));
            }
        }
        public function delete($id){
            $unit = Unit::find($id);
            // dd($unit);
            if($unit){
                $unit->delete();
                 return Redirect::back()->with('danger','ลบข้อมูลสำเร็จ');
            }
        }
   }