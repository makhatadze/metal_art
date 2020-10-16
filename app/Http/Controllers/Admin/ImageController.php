<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends AdminController
{

    public function delete(Request $request)
    {
        $request->all();
        $this->validate($request, [
            'id' => 'required|integer'
        ]);
        $image = Image::where(['id' => $request->id])->first();
        if ($image) {
            if (!Storage::delete('public/product/' . $image->imageable_id . '/' . $image->name)) {
                return false;
            }
            if (!$image->delete()) {
                return false;
            }
            return true;

        }
    }

    public function brandImageDelete(Request $request)
    {
        $request->all();
        $this->validate($request, [
            'id' => 'required|integer'
        ]);
        $image = Image::where(['id' => $request->id])->first();
        if ($image) {
            if (!Storage::delete('public/brand/' . $image->imageable_id . '/' . $image->name)) {
                return false;
            }
            if (!$image->delete()) {
                return false;
            }
            return true;

        }
    }
}