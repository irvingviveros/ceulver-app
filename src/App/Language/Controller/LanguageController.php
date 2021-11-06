<?php
declare(strict_types=1);

namespace App\Language\Controller;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    //
    public function swap($locale){
        // available language in template array
        $availLocale=['en' => 'en', 'es' => 'es'];
        // check for existing language
        if(array_key_exists($locale,$availLocale)){
            session()->put('locale',$locale);
        }
        return redirect()->back();
    }
}