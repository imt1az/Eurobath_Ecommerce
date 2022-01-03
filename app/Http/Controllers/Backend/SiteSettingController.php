<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));
    }

    public function SiteSettingUpdate(Request $request)
    {
        $setting_id = $request->id;


        if ($request->file('logo'))
        {

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,60)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;

            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' =>$request->phone_one,
                'phone_two' =>$request->phone_two,
                'phone_three' =>$request->phone_three,
                'phone_four' =>$request->phone_four,
                'email' =>$request->email,
                'company_name' =>$request->company_name,
                'company_address' =>$request->company_address,
                'company_address_one' =>$request->company_address_one,
                'company_address_two' =>$request->company_address_two,
                'company_address_three' =>$request->company_address_three,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'linkedin' =>$request->linkedin,
                'youtube' =>$request->youtube,

                'logo' =>$save_url,
            ]);

            $notification = array(
                'message' =>'Site Updated With Images Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('site-setting')->with($notification);

        }

        else
        {
            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' =>$request->phone_one,
                'phone_two' =>$request->phone_two,
                'phone_three' =>$request->phone_three,
                'phone_four' =>$request->phone_four,
                'email' =>$request->email,
                'company_name' =>$request->company_name,
                'company_address' =>$request->company_address,
                'company_address_one' =>$request->company_address_one,
                'company_address_two' =>$request->company_address_two,
                'company_address_three' =>$request->company_address_three,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'linkedin' =>$request->linkedin,
                'youtube' =>$request->youtube,

            ]);

            $notification = array(
                'message' =>'Site Updated Without Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('site-setting')->with($notification);
        }
    }

    public function SeoSetting()
    {
        $seo = Seo::find(1);
        return view('backend.setting.seo_update',compact('seo'));
    }

    public function SeoSettingUpdate(Request $request)
    {
        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' =>$request->meta_title,
            'meta_author' =>$request->meta_author,
            'meta_keyword' =>$request->meta_keyword,
            'meta_description' =>$request->meta_description,
            'google_analytics' =>$request->google_analytics,

        ]);

        $notification = array(
            'message' =>'Seo Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('seo-setting')->with($notification);

    }

}
