<?php

namespace App\Http\Controllers;

use App\attribiute;
use Auth;
use App\slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\brand;
use App\category;
use App\Helper\Helper;
use App\product;

class AdminPanelController extends Controller
{
    protected $user;
    public function __construct(){
        $this->middleware('checklogin');
        Helper::updateproducts();
    }

    //slider functions
    public function slider(Request $request){
        switch ($request->method()) {
            case 'GET':
                    $slider_images = slider::all();
                    return view('slider' , compact('slider_images'));
                break;
            
            default:
                return view('slider');
                break;
        }
    }
    public function addslider(Request $request){
        switch ($request->method()) {
            case 'GET':
                    return view('addslider');
                break;
            case 'POST':
                $image = $request->file('image');
                $altimage = $request->input('altimage');
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048000',
                ]);
                if(validator()){
                    $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
                    $slider = new slider();
                    $slider->img = 'images/'.$imageName;
                    $slider->alt = $altimage;
                    if($slider->save()){
                        return redirect()->route('add.slider');
                    }else{
                        return false;
                    }
                }
            break;
            
            default:
                return view('addslider');
                break;
        }
    }
    public function deletslider(Request $request){
        $id = $request->input('id');
        $slider = slider::where('slider_image_id' , $id)->delete();
        if($slider){
            return true;
        }else{
            return false;
        }
    }
    public function editslider(Request $request , $id){
        
            $slider = slider::where('slider_image_id' , $id)->first();
            return view('editslider' , compact('slider'));

    }
    public function editsliderform(Request $request){
        $image = $request->file('image');
        $altimage = $request->input('altimage');
        $id = $request->input('id');
        $slider = slider::where('slider_image_id' , $id)->first();
        if($image == null){
            if($altimage != null){
                $slider->alt = $altimage;
                if($slider->save()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            File::delete($slider->img);
            $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            if($altimage == null){
                $slider->img = 'images/'.$imageName;
                if($slider->save()){
                    return true;
                }else{
                    return false;
                }
            }else{
                $slider->img = 'images/'.$imageName;
                $slider->alt = $altimage;
                if($slider->save()){
                    return true;
                }else{
                    return false;
                }
            }



        }
    }

    //brand functions
    public function brand(Request $request){
        switch ($request->method()) {
            case 'GET':
                    $brands = brand::all();
                    return view('brand' , compact('brands'));
                break;
            
            default:
                return view('brand');
                break;
        }
    }
    public function addbrand(Request $request){
        switch ($request->method()) {
            case 'GET':
                    return view('addbrand');
                break;
            case 'POST':
                $image = $request->file('image');
                $brand_title = $request->input('brand-title');
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048000',
                ]);
                if(validator()){
                    $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
                    $brand = new brand();
                    $brand->img = 'images/'.$imageName;
                    $brand->brand_title = $brand_title;
                    if($brand->save()){
                        return redirect()->route('add.brand');
                    }else{
                        return false;
                    }
                }
            break;
            
            default:
                return view('addbrand');
                break;
        }
    }
    public function deletbrand(Request $request){
        $id = $request->input('id');
        $brand = brand::where('brand_id' , $id)->delete();
        if($brand){
            return true;
        }else{
            return false;
        }
    }
    public function editbrand($id){
        
            $brand = brand::where('brand_id' , $id)->first();
            return view('editbrand' , compact('brand'));

    }
    public function editbrandform(Request $request){
        $image = $request->file('image');
        $brandtitle = $request->input('brand-title');
        $id = $request->input('id');
        $brand = brand::where('brand_id' , $id)->first();
        if($image == null){
            if($brandtitle != null){
                $brand->brand_title = $brandtitle;
                if($brand->save()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            File::delete($brand->img);
            $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            if($brandtitle == null){
                $brand->img = 'images/'.$imageName;
                if($brand->save()){
                    return true;
                }else{
                    return false;
                }
            }else{
                $brand->img = 'images/'.$imageName;
                $brand->brand_title = $brandtitle;
                if($brand->save()){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    //category functions 
    public function category(Request $request){
        return view('category');
    }
    public function addcatgory(Request $request){
        $name = $request->input('catgory-name');
        $attrs = $request->input('attrname');
        $edit_id = $request->input('edit-cat-id');
        if($edit_id ==null){
            $category = new category();
            $category->category_title = $name ;
            if($category->save()){
                if($attrs != null){
                    foreach($attrs as $s){
                        $att = new attribiute();
                        $att->attr_title = $s;
                        $att->cat_id = $category->category_id;
                        $att->save();
                    }
                }
                return true;
            }else{
                return false;
            }
        }else{
            $category = category::where('category_id' , $edit_id)->first();
            $category->category_title = $name;
            if($category->save()){
                attribiute::where('cat_id' , $edit_id)->delete();
                if($attrs != null){
                    foreach($attrs as $s){
                        $att = new attribiute();
                        $att->attr_title = $s;
                        $att->cat_id = $category->category_id;
                        $att->save();
                    }
                }
                return true;
            }
        }

    } 

    public function cat_builder($cats){
        $mycat = [];   
        foreach($cats as $cat){
            $res = category::select()->where('parent_id', $cat->category_id)->get();
            if(count($res) > 0){
                $mycat[] = ["name" => $cat->category_title, "id" => $cat->category_id, "children" => $this->cat_builder($res)];
            } else {
                $mycat[] = ["name" => $cat->category_title, "id" => $cat->category_id];
            }
        }
        return $mycat;
    }

    public function cat_json()
    {
        $res = category::select()->where('parent_id', 0)->get();
        $json = $this->cat_builder($res);

        return json_encode($json);
    }
    public function changeparent(Request $request){
        $cat_id = $request->input('cat_id');
        $parent_id = $request->input('parent_id');
        $category = category::where('category_id' , $cat_id)->first();
        $category->parent_id = $parent_id;
        if($category->save()){
            return true;
        }else{
            return false;
        }    
        
    }
    public function editcategory(Request $request){
        $id = $request->input('id');
        $category = category::select()->Leftjoin('attributes' , 'attributes.cat_id' , '=' , 'categories.category_id')
        ->where('categories.category_id' , $id)->get();
        return json_encode($category);
    }


    //Product functions 

    public function product(Request $request){
        $products = product::all();
        return view('product' , compact('products'));
    }
    public function addproduct(Request $request){
        switch ($request->method()) {
            case 'GET':
                return view('addproduct');
                break;
            case 'POST':
                $title = $request->input('title');
                $desc = $request->input('description');
                $balance = $request->input('balance');
                $review = $request->input('editor1');
                $offer_type = $request->input('offer-type');
                $offer = $request->input('offer-price');
                $special = $request->input('special-value');
                $specialfromdate = $request->input('start-date');
                $specialtodate = $request->input('finish-date');
                $image = $request->file('image');
                $price = $request->input('price');

                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048000',
                ]);
                if(validator()){
                    $imageName = time() . '.' . request()->file('image')->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
                    $product = new product();
                    $product->title = $title;
                    $product->description = $desc;
                    $product->price = floatval($price);
                    $product->balance = $balance;
                    $product->offer_type_id = $offer_type;
                    if($offer != null){
                        $product->offer = $offer;
                    }
                    $product->Review = $review;
                    $product->special = $special;
                    if($specialtodate != null && $specialfromdate != null){
                        $product->special_from = $specialfromdate;
                        $product->special_to = $specialtodate;
                    }
                    $product->main_image = 'images/'.$imageName;
                    if($product->save()){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
                break;
            
            default:
                return view('addproduct');
                break;
        }
    }
    public function ckeditoruploader(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

}
