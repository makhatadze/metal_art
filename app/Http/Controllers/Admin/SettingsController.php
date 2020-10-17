<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->isMethod('GET')) {
            $datas = [];
            $settings = Setting::all()->toArray();
            foreach ($settings as $setting) {
                $datas [$setting['key']] = $setting['value'];
            }
            return view('admin.modules.setting.index', compact('datas'));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'site_url' => 'required',
                'site_title_ge' => 'required',
                'site_title_en' => 'required',
                'site_meta_title_ge' => 'required',
                'site_meta_title_en' => 'required',
            ]);
            foreach ($request->all() as $key => $item) {
                if ($key != '_token' && $key != 'site_url') {
                    Setting::where(['key' => $key])->update(['value' => $item]);
                }
            }
            return redirect('admin/settings')->with('success', 'პარამეტრები რედაქტირდა.');
        }
    }

    public function contact(Request $request)
    {
        $request->all();
        $this->validate($request, [
            'admin_email' => 'required',
            'contact_email' => 'required',
            'support_email' => 'required',
            'phone' => 'required',
            'address_ge' => 'required',
            'address_en' => 'required'
        ]);
        foreach ($request->all() as $key => $item) {
            if ($key != '_token') {
                Setting::where(['key' => $key])->update(['value' => $item]);
            }
        }
        return redirect('admin/settings')->with('success', 'პარამეტრები რედაქტირდა.')->with('contact-update', 'true');
    }

    public function social(Request $request)
    {
        $request->all();
        $this->validate($request, [
            'facebook_url' => 'required',
            'instagram_url' => 'required',
            'youtube_url' => 'required',
            'linkedin' => 'required'
        ]);
        foreach ($request->all() as $key => $item) {
            if ($key != '_token') {
                Setting::where(['key' => $key])->update(['value' => $item]);
            }
        }
        return redirect('admin/settings')->with('success', 'პარამეტრები რედაქტირდა.')->with('social-update', 'true');
    }

    public function smtp(Request $request)
    {
        $request->all();
        $this->validate($request, [
            'smtp_host' => 'required',
            'smtp_port' => 'required',
            'smtp_encrypted' => 'required',
            'smtp_email' => 'required',
            'smtp_password' => 'required',
            'smtp_subject' => 'required'
        ]);
        foreach ($request->all() as $key => $item) {
            if ($key != '_token') {
                Setting::where(['key' => $key])->update(['value' => $item]);
            }
        }
        return redirect('admin/settings')->with('success', 'Mailer რედაქტირდა.')->with('mailer-update', 'true');
    }

}
