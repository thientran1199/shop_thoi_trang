<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\CateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CateController extends Controller

{
    private $category;
    public function __construct(Category $category)
    {
        $this->category =$category;
    }
    public function getList() {

		$data = Category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data' ));
	}
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->catagoryRecusive($parentId);
        return $htmlOption;
    }

    public function getAdd() {
        $htmlOption = $this->getCategory($parentId = '');
    	$parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent','htmlOption'));
    }

    public function postAdd(CateRequest $request) {
    	$cate = new Category();
    	$cate->name = $request->txtCateName;
    	$cate->alias = $cate->name;
    	//$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->parent_id;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Add Category Complete Success!']);
    }

    public function getDelete($id) {
    	$parent = Category::where('parent_id',$id)->count();
    	if ($parent == 0) {
    		$cate = Category::find($id);
	    	$cate->delete($id);
	    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Delete Category Complete Success!']);
    	} else {
    		echo "<script type='text/javascript'>
    			alert('This Category Can Not Delete!');
    			window.location = '";
    				echo route('admin.cate.list');
    		echo "';
    		</script>";
    	}

    }

    public function getEdit($id) {
    	$cate = Category::find($id);
        $htmlOption = $this->getCategory($cate->parent_id);
    	return view('admin.cate.edit',compact('cate','htmlOption'));
    }

    public function postEdit(Request $request,$id) {
    	$this->validate($request,
    		["txtCateName"=>"required"],
    		["txtCateName.required"=>"Please Enter Category Name!"]
    	);
    	$cate = Category::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->alias = $request->txtCateName;
    	//$cate->order = $request->txtOrder;
    	$cate->parent_id = $request->parent_id;
    	$cate->keywords = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Edit Category Complete Success!']);
    }
}
