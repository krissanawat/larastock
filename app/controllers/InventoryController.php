<?php 

class InventoryController extends BaseController {


	public function index(){
            if(Request::isMethod('post')){
                $inventory = Inventory::find(Input::get('id'));
                if(empty($inventory)){
                    $inventory = new Inventory;
                    $inventory->id = Input::get('id');
                }
                
                $inventory->name = Input::get('name');
                $inventory->save();
                return Redirect::back()->with('success','เพิ่มข้อมูลสำเร็จ');
            }else{
            	$inventory = Inventory::all();
                return View::make('inventory.index',array('inventory'=>$inventory));
            }
        }
        public function delete($id){
            $inventory = Inventory::find($id);
            // dd($Inventory);
            if($inventory){
                $inventory->delete();
                 return Redirect::back()->with('danger','ลบข้อมูลสำเร็จ');
            }
        }

	}