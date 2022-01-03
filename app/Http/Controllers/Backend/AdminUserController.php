<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('adminuser'));
    }

    public function AddAdminRole(){
        return view('backend.role.admin_role_create');
    }


    public function StoreAdminRole(Request $request)
    {
//        $request->validate([
//            'brand_name_en'=> 'required',
//            'brand_name_hin'=> 'required',
//            'brand_image'=> 'required',
//        ],
//            [
//                'brand_name_en.required'=> 'Input Brand Name English',
//                'brand_name_hin.required'=> 'Input Brand Name Hindi',
//            ]);

        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;

        Admin::insert([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'password' =>Hash::make($request->password),

            'brand' =>$request->brand,
            'category' =>$request->category,
            'product' =>$request->product,
            'slider' =>$request->slider,
            'coupons' =>$request->coupons,
            'shipping' =>$request->shipping,
            'blog' =>$request->blog,
            'setting' =>$request->setting,
            'returnorder' =>$request->returnorder,
            'review' =>$request->review,
            'orders' =>$request->orders,
            'stock' =>$request->stock,
            'reports' =>$request->reports,
            'alluser' =>$request->alluser,
            'adminuserrole' =>$request->adminuserrole,
            'type' =>2,
            'profile_photo_path' =>$save_url,
            'created_at'=> Carbon::now(),


        ]);

        $notification = array(
            'message' =>'Admin User Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin.user')->with($notification);
    }

    public function EditAdminRole($id)
    {
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminuser'));
    }


    public function UpdateAdminRole(Request $request,$id){


        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

        }else{

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,

                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

        } // end else

    } // end method

    public function DeleteAdminRole($id)
    {
        $adminImage = Admin::findOrFail($id);
        $img = $adminImage->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.admin.user')->with($notification);


    }


}
