<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\SettingsUpdateReqeust;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
use App\Utils\ImageUpload;
use Illuminate\Support\Facades\Storage;
// use Image;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{


    public function index(setting $setting)
    {
        return view('dashboard.settings.index');
    }


    public function update(SettingsUpdateReqeust $request, setting $setting)
    {

        $setting->update($request->validated());

        if ($request->has('logo')) {
           $logo = ImageUpload::uploadImage($request->logo,100,200,'images/');// in images folder inside public
           $setting->update(['logo' => $logo]);
        }

       // dd($logo);

        if ($request->has('favicon')) {
            $favicon = ImageUpload::uploadImage($request->favicon,32,32,'images/');// in images folder inside public
            $setting->update(['favicon' => $favicon]);
         }
        // $imagename = date('Y-m-d') . '.' . $request->logo->extension();
        return redirect()->route('dashboard.settings.index')->with('success', 'تم تحديث الاعدادات بنجاح');
    }
}


// $setting->update($request->validated());
// $imagename = date('Y-m-d') . '.' . $request->logo->extension();
// $logo = Image::make($request->logo->path());
// $logo->fit(200, 200, function ($constraint) {
//     $constraint->upsize();
// })->stream();
// Storage::disk('public')->put($imagename, $logo);
// $setting->update(['logo' => 'public/'.$imagename]);



// return redirect()->route('dashboard.settings.index')->with('success', 'تم تحديث الاعدادات بنجاح');
