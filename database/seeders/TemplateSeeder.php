<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// class TemplateSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         Template::insert([
//             ['name' => 'Template 1', 'path' => 'frontend/templates/template1'],
//             ['name' => 'Template 2', 'path' => 'frontend/templates/template2'],
//             ['name' => 'Template 3', 'path' => 'frontend/templates/template3'],
//             ['name' => 'Template 4', 'path' => 'frontend/templates/template4'],
//             ['name' => 'Template 5', 'path' => 'frontend/templates/template5'],
//             ['name' => 'Template 6', 'path' => 'frontend/templates/template6'],
//         ]);
//     }
// }
class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            ['name' => 'Template 1', 'path' => 'frontend/templates/template1'],
            ['name' => 'Template 2', 'path' => 'frontend/templates/template2'],
            ['name' => 'Template 3', 'path' => 'frontend/templates/template3'],
            ['name' => 'Template 4', 'path' => 'frontend/templates/template4'],

        ];

        foreach ($templates as $template) {
            Template::firstOrCreate($template);
        }
    }
}
