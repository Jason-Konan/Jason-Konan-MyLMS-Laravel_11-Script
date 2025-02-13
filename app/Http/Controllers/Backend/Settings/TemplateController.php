<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

// class TemplateController extends Controller
// {
//     // public static function middleware()
//     // {
//     //     return ['Admin'];
//     // }

//     public function index()
//     {
//         $templates = Template::all();
//         $selectedTemplate = Setting::where('key', 'current_template')->first()->value ?? null;
//         return view('backend.templates.index', compact('templates', 'selectedTemplate'));
//     }

//     public function select($id)
//     {
//         $template = Template::find($id);
//         Setting::updateOrCreate(
//             ['key' => 'current_template'],
//             ['value' => $template->path]
//         );
//         return redirect()->back()->with('ok', __('messages.templates-success'));
//     }
// }
class TemplateController extends Controller
{
    const CURRENT_TEMPLATE_KEY = 'current_template';

    public function index()
    {
        $templates = Template::all();
        $selectedTemplate = Setting::where('key', self::CURRENT_TEMPLATE_KEY)->first()->value ?? null;
        return view('backend.templates.index', compact('templates', 'selectedTemplate'));
    }

    public function select($id)
    {
        $template = Template::findOrFail($id); // Valide que le template existe
        Setting::updateOrCreate(
            ['key' => self::CURRENT_TEMPLATE_KEY],
            ['value' => $template->path]
        );
        return redirect()->back()->with('ok', __('messages.templates-success'));
    }
}
