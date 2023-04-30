<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Dashboard\SettingsUpdateReqeust;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
class SettingController extends Controller
{









        public function index(setting $setting)
        {
            // return view('dashboard.settings.index');
            dd($setting->id);
        }


        public function update(SettingsUpdateReqeust $request, setting $setting)
        {
            dd($setting->id);
            // $setting->update($request->validated());
            // $imagename = date('Y-m-d') . '.' . $request->logo->extension();
            // $logo = Image::make($request->logo->path());
            // $logo->fit(200, 200, function ($constraint) {
            //     $constraint->upsize();
            // })->stream();
            // Storage::disk('public')->put($imagename, $logo);
            // $setting->update(['logo' => 'public/' . $imagename]);



            // return redirect()->route('dashboard.settings.index')->with('success', 'تم تحديث الاعدادات بنجاح');
        }
    }


