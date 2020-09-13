<?php

namespace App\Http\Controllers;
use Auth;
use App\slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    protected $user;
    public function __construct(){
        $this->middleware('checklogin');
        $this->user = Auth::user();
    }
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
                        return true;
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

}
