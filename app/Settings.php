<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    public $timestamps = false;
 

    public function getJsonAttribute($value){
        $value =  json_decode($value);
        return $value;
    }

    public function getLogo($w = null, $h = null){
        if (!empty($this->logo)){
            $path = 'storage/uploads/logo/'.$this->logo;
        }else {
            $path = "images/logo.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
    public function getFooterLogo($w = null, $h = null){
        if (!empty($this->footer_logo)){
            $path = 'storage/uploads/footerlogo/'.$this->footer_logo;
        }else {
            $path = "images/logo-small.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
    public function getFavicon($w = null, $h = null){
        if (!empty($this->favicon)){
            $path = 'storage/uploads/favicon/'.$this->favicon;
        }else {
            $path = "images/favicon.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
}
