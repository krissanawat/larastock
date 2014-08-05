<?php 

class FixstockController extends BaseController {


public function index(){
            if(Request::isMethod('post')){
                $fixstock = Fixstock::find(Input::get('id'));
                if(empty($fixstock)){
                    $fixstock = new Fixstock;
                    $fixstock->id = Input::get('id');
                }
                
                $fixstock->name = Input::get('name');
                $fixstock->save();
                return Redirect::back()->with('success','เพิ่มข้อมูลสำเร็จ');
            }else{
            	$fixstock = Fixstock::all();
                return View::make('fixstock.index',array('fixstock'=>$fixstock));
            }
        }
        public function delete($id){
            $fixstock = Fixstock::find($id);
            // dd($fixstock);
            if($fixstock){
                $fixstock->delete();
                 return Redirect::back()->with('danger','ลบข้อมูลสำเร็จ');
            }
        }
	}