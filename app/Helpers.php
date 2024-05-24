<?php

namespace App\Helpers;

use App\Models\Activityhistory;
use App\Models\Category;
use App\Models\Employees;
use Illuminate\Support\Facades\File;

class Helper {

    public static function Image_upload($image,$path){
        $extention = $image->getClientOriginalExtension();
        $filename = rand() . '.' . $extention;
        $image->move(storage_path($path), $filename);

        return $filename;
    }
    public static function Image_delete($old_image,$path){
            $file_path = storage_path($path) . $old_image;
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
    }
    public static function Activity_history($change){
        Activityhistory::create(['admin_id' => session('admin.id'), 'admin_name' => session('admin.name'), 'changes' => $change]);

    }

}