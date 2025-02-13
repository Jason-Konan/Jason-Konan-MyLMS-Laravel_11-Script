<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->lang;

        if (!in_array($lang, ['en', 'it', 'fr', 'es'])) {
            abort(400);
        }

        Session::put('locale', $lang);

        return redirect()->back();
    }
}
