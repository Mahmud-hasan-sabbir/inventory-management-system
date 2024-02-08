<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\setting;

class settingController extends Controller
{
    public static $products,$product,$image,$imageName,$imageUrl,$directory;
    public function setting()
    {
        $allSetting = setting::all();
        return view('layouts.pages.setting.setting',compact('allSetting'));
    }

    public static function uploadImage($request,$updateSetting= null)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            if ($updateSetting)
            {
                if (file_exists($updateSetting->com_logo))
                {
                    unlink($updateSetting->com_logo);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'public/assets/images/setting-logo/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
        }else{
            if ($updateSetting)
            {
                self::$imageUrl = $updateSetting->com_logo;
            }else{
                self::$imageUrl = null;
            }

        }

        return self::$imageUrl;
    }

   


    public function storeSettingInfo(Request $request)
    {
        $storeSetting = new setting();
        $storeSetting->com_name = $request->com_name;
        $storeSetting->com_email = $request->com_email;
        $storeSetting->com_phone = $request->com_phone;
        $storeSetting->com_mobile = $request->com_mobile;
        $storeSetting->com_city = $request->com_city;
        $storeSetting->com_country = $request->com_country;
        $storeSetting->com_zipcode = $request->com_zipcode;
        $storeSetting->com_address = $request->com_address;
        $storeSetting->com_logo = self::uploadImage($request);
        $storeSetting->save();
        $notification = array('messege' => 'Setting Save Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editSettingInfo(Request $request)
    {
        $editSetting = setting::where('id', $request->id)->first();
        return response()->json($editSetting);
    }

    public function updateSettingInfo(Request $request)
    {
        $updateSetting = setting::where('id', $request->hiddenId)->first();
        $updateSetting->com_name = $request->com_name;
        $updateSetting->com_email = $request->com_email;
        $updateSetting->com_phone = $request->com_phone;
        $updateSetting->com_mobile = $request->com_mobile;
        $updateSetting->com_city = $request->com_city;
        $updateSetting->com_country = $request->com_country;
        $updateSetting->com_zipcode = $request->com_zipcode;
        $updateSetting->com_address = $request->com_address;
        $updateSetting->com_logo = self::uploadImage($request,$updateSetting);
        $updateSetting->save();
        $notification = array('messege' => 'Setting Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function settingInfoView(Request $request)
    {
        $viewInfoSetting = setting::where('id', $request->id)->first();
        return response()->json($viewInfoSetting);
    }

}
