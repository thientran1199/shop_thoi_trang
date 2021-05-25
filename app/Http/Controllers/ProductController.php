<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function getList() {
		$data = Product::select('id','name','price', 'price_new', 'status','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}

    public function getAdd() {
    	$cate = Category::all();
    	return view('admin.product.add',compact('cate' ));
    }


    public function postAdd(ProductRequest $product_request) {
    	$file_name = $product_request->file('fImages')->getClientOriginalName();
    	$product = new Product();
    	$product->name = $product_request->txtName;
    	$product->alias = $product->name;
    	$product->price = $product_request->txtPrice;
    	$product->price_new = 0;
    	$product->status = 1;
    	$product->intro = $product_request->txtIntro;
    	$product->content = $product_request->txtContent;
    	$product->image = $file_name;
    	$product->keywords = $product_request->txtKeywords;
    	$product->description = $product_request->txtDescription;
    	$product->user_id = Auth::user()->id;
    	$product->cate_id = $product_request->sltParent;
    	$product_request->file('fImages')->move('resources/upload/',$file_name);
    	$product->save();
    	$product_id = $product->id;
    	if ($product_request->hasFile('fProductDetail')) {
    		//print_r(Input::file('fProductDetail'));
    		foreach ($product_request->file('fProductDetail') as $file) {
    			$product_img = new Product_image();
    			if (isset($file)) {
    				$product_img->image = $file->getClientOriginalName();
    				$product_img->product_id = $product_id;
    				$file->move('resources/upload/detail/',$file->getClientOriginalName());
    				$product_img->save();
    			}
    		}
    	}
    	if(!empty( $product_request->input('SizeAddDetail'))){
    	foreach ($product_request->get('SizeAddDetail') as $size) {
        		$product_size = new Product_size();
        		if ($size != '') {
        			$product_size->size = $size;
        			$product_size->product_id = $product_id;
        			$product_size->save();
        		}
        	}
        }
    	return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Add Product Complete Success!']);
    }

    public function getDelete($id) {
    	$product_detail = Product::find($id)->product_image->toArray();
    	foreach ($product_detail as $value) {
    		File::delete('resources/upload/detail/'.$value["image"]);
    	}
    	$product = Product::find($id);
    	File::delete('resources/upload/'.$product->image);
    	$product->delete($id);
    	return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Delete Product Complete Success!']);
    }

    public function getEdit($id){
    	$cate = Category::all();
    	$product = Product::find($id);
    	$product_image = Product::find($id)->product_image;
        $product_size = Product::find($id)->product_size;
    	return view('admin.product.edit',compact('cate','product','product_image','product_size'));
    }

    public function postEdit(Request $request ,$id){
        $product = Product::find($id);
        $product->name = $request->input('txtName');
        $product->alias = $request->input('txtName');
        $product->price = $request->input('txtPrice');
        $product->price_new = $request->input('txtPriceNew');
        $product->status = $request->input('status');
        $product->intro = $request->input('txtIntro');
        $product->content = $request->input('txtContent');
        $product->keywords = $request->input('txtKeywords');
        $product->description = $request->input('txtDescription');
        $product->user_id = Auth::user()->id;
        $product->cate_id = $request->input('sltParent');
        $img_current = 'resources/upload/'.$request->input('img_current');
        if (!empty($request->file('fImages'))) {
            $file_name =$request->file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            $request->file('fImages')->move('resources/upload/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }else{
            echo "ko co file";
        }
        $product->save();

        if (!empty($request->file('fEditDetail'))) {
            foreach ($request->file('fEditDetail') as $file) {
                $product_img = new Product_image();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        if(!empty($request->input('idSize')) && !empty($request->input('SizeEditDetail'))){
            foreach (array_combine($request->input('idSize'),$request->input('SizeEditDetail')) as $size_id => $size_edit) {
                $product_size = Product_size::find($size_id);
                if(empty($size_edit)){
                    $product_size->delete($size_id);

                }else{
                    $product_size->size = $size_edit;
                    $product_size->product_id = $id;
                    $product_size->save();
                }

            }
        }
        if(!empty($request->input('SizeAddDetail'))){
            foreach ($request->input('SizeAddDetail') as $size) {
                $product_size = new Product_size();
                if ($size != '') {
                    $product_size->size = $size;
                    $product_size->product_id = $id;
                    $product_size->save();
                }
            }
        }

        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Edit Product Complete Success!']);
    }

    public function getDelImg( Request $request,$id) {
        if($request->ajax()){
            $idImg = (int)$request->get('idImg');
            $image_detail = Product_image::find($idImg);
            if (!empty($image_detail)) {
                $img = 'resources/upload/detail/'.$image_detail->image;
                if (File::exists($img)) {
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Ok!";
        }

    }
}
