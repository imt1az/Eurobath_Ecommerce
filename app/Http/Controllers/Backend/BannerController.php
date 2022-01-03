<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BannerOne;
use App\Models\BannnerTwo;
use App\Models\InnerBanner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function BannerOneView(){
        $banner_one = BannerOne::latest()->get();
        return view('backend.banner.bannerOneView',compact('banner_one'));
    }

    public function BannerOneStore(Request $request){

        $request->validate([
            'bannerOne_img'=> 'required',
        ],
            [
                'bannerOne_img.required'=> 'Please Slect One Image ',

            ]);

        $image = $request->file('bannerOne_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1500,400)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        BannerOne::insert([
            'title' =>$request->title,
            'description' =>$request->description,
            'bannerOne_img' =>$save_url,
        ]);

        $notification = array(
            'message' =>'Banner One Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function BannerOneEdit($id){
        $banner_one = BannerOne::findOrFail($id);
        return view('backend.banner.banner_one_edit',compact('banner_one'));
    }

    public function BannerOneUpdate(Request $request){

        $bannerOne_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('bannerOne_img'))
        {
            unlink($old_img);
            $image = $request->file('bannerOne_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1500,400)->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;

            BannerOne::findOrFail($bannerOne_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'bannerOne_img' =>$save_url,
            ]);

            $notification = array(
                'message' =>'Banner One Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-BannerOne')->with($notification);

        }

        else
        {
            BannerOne::findOrFail($bannerOne_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,


            ]);

            $notification = array(
                'message' =>'Banner One Updated Without Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-BannerOne')->with($notification);
        }
    }

    public function BannerOneDelete($id)
    {
        $bannerOne_id = BannerOne::findOrFail($id);
        $old_img = $bannerOne_id->bannerOne_img;
        unlink($old_img);

        BannerOne::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Banner One Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

    public function BannerOneInactive($id)
    {
        BannerOne::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' =>'Banner One Inactive Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function BannerOneActive($id)
    {
        BannerOne::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' =>'Banner One Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }


    //Banner Two Started

    public function BannerTwoView(){
        $banner_two = BannnerTwo::latest()->get();
        return view('backend.banner.bannerTwoView',compact('banner_two'));
    }

    public function BannerTwoStore(Request $request){

        $request->validate([
            'bannerTwo_img'=> 'required',
        ],
            [
                'bannerTwo_img.required'=> 'Please Slect One Image ',

            ]);

        $image = $request->file('bannerTwo_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1500,400)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        BannnerTwo::insert([
            'title' =>$request->title,
            'description' =>$request->description,
            'bannerTwo_img' =>$save_url,
        ]);

        $notification = array(
            'message' =>'Banner Two Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function BannerTwoEdit($id){
        $banner_two = BannnerTwo::findOrFail($id);
        return view('backend.banner.banner_two_edit',compact('banner_two'));
    }

    public function BannerTwoUpdate(Request $request){

        $bannerTwo_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('bannerTwo_img'))
        {
            unlink($old_img);
            $image = $request->file('bannerTwo_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1500,400)->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;

            BannnerTwo::findOrFail($bannerTwo_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'bannerTwo_img' =>$save_url,
            ]);

            $notification = array(
                'message' =>'Banner Two Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-BannerTwo')->with($notification);

        }

        else
        {
            BannnerTwo::findOrFail($bannerTwo_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,


            ]);

            $notification = array(
                'message' =>'Banner Two Updated Without Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-BannerTwo')->with($notification);
        }
    }

    public function BannerTwoDelete($id)
    {
        $bannerTwo_id =BannnerTwo::findOrFail($id);
        $old_img = $bannerTwo_id->bannerTwo_img;
        unlink($old_img);

        BannnerTwo::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Banner two Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

    public function BannerTwoInactive($id)
    {
        BannnerTwo::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' =>'Banner Two Inactive Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function BannerTwoActive($id)
    {
        BannnerTwo::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' =>'Banner Two Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }


//    Inner Banner

    public function InnerBannerView(){
        $innerBanner = InnerBanner::latest()->get();
        return view('backend.banner.innerBannerView',compact('innerBanner'));
    }

    public function InnerBannerStore(Request $request){

        $request->validate([
            'innerBanner_img'=> 'required',
        ],
            [
                'innerBanner_img.required'=> 'Please Slect One Image ',

            ]);

        $image = $request->file('innerBanner_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(850,400)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        InnerBanner::insert([
            'title' =>$request->title,
            'description' =>$request->description,
            'innerBanner_img' =>$save_url,
        ]);

        $notification = array(
            'message' =>'Inner Banner Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function InnerBannerEdit($id){
        $innerBanner = InnerBanner::findOrFail($id);
        return view('backend.banner.innerBannerEdit',compact('innerBanner'));
    }

    public function InnerBannerUpdate(Request $request){

        $innerBanner_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('innerBanner_img'))
        {
            unlink($old_img);
            $image = $request->file('innerBanner_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(850,400)->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;

            InnerBanner::findOrFail($innerBanner_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'innerBanner_img' =>$save_url,
            ]);

            $notification = array(
                'message' =>'Inner Banner Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-InnerBanner')->with($notification);

        }

        else
        {
            InnerBanner::findOrFail($innerBanner_id)->update([
                'title' =>$request->title,
                'description' =>$request->description,


            ]);

            $notification = array(
                'message' =>'Inner Banner Updated Without Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-InnerBanner')->with($notification);
        }
    }

    public function InnerBannerDelete($id){
        $innerBanner =InnerBanner::findOrFail($id);
        $old_img = $innerBanner->innerBanner_img;
        unlink($old_img);

        InnerBanner::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Inner Banner Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

    public function InnerBannerInactive($id)
    {
        InnerBanner::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' =>'Inner Banner Inactive Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function InnerBannerActive($id)
    {
        InnerBanner::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' =>'Inner Banner Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }
}
