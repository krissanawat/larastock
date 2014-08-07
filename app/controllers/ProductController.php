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
	               if(Input::hasFile('pic')){
	                	$pic = Str::random(6).'.png';
	                	$image = Image::make(Input::file('pic'));
	                	$image->fit(100,100)->save(public_path().'/upload/product/'.$pic);
	                	 $product->pic = 'upload/product/'.$pic;
	                }
	                $product->unit_id = Input::get('unit_id');
	                $product->fixstock_id = Input::get('fixstock_id');
	                $product->name = Input::get('name');

	                $product->barcode = Input::get('barcode');
	                $product->user_id = Input::get('user_id');
	                $product->save();
	                return Redirect::back()->with('success','เพิ่มข้อมูลสำเร็จ');
	            }else{
	            	$product = Product::all();
	                return View::make('product.index',array('product'=>$product));
	            }
        }
        public function delete($id){
            $product = Product::find($id);
            // dd($product);
            if($product){
                $product->delete();
                 return Redirect::back()->with('danger','ลบข้อมูลสำเร็จ');
            }
        }
	}