<?php 

class ProductController extends BaseController {

	     public function index(){
	            if(Request::isMethod('post')){
	//                dd(Input::all());
	                $product = Product::find(Input::get('id'));
	                if(empty($product)){
	                    $product = new Product;
	                    $product->id = Input::get('id');
	                }
	                
	                $product->name = Input::get('name');
	                $product->save();
	                return Redirect::back()->with('success','เพิ่มข้อมูลสำเร็จ');
	            }else{
	            	$product = Product::all();
	                return View::make('unit.index',array('unit'=>$unit));
	            }
        }
        public function delete($id){
            $product = Product::find($id);
            // dd($unit);
            if($product){
                $product->delete();
                 return Redirect::back()->with('danger','ลบข้อมูลสำเร็จ');
            }
        }
	}