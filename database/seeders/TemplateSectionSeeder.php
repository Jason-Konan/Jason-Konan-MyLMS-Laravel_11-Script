<?php

namespace Database\Seeders;

use App\Models\TemplateSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TemplateSection::insert([


            // Template 2
            ['name' => 'hero-section', 'template_path' => 'frontend/templates/template2/components/hero-section.blade.php',],
            ['name' => 'about-section', 'template_path' => 'frontend/templates/template2/components/about-section.blade.php'],
            ['name' => 'features-section', 'template_path' => 'frontend/templates/template2/components/features-section.blade.php'],
            ['name' => 'categories-section', 'template_path' => 'frontend/templates/template2/components/categories-section.blade.php'],
            ['name' => 'courses-section', 'template_path' => 'frontend/templates/template2/components/courses-section.blade.php'],
            ['name' => 'stats-section', 'template_path' => 'frontend/templates/template2/components/stats-section.blade.php'],
            ['name' => 'faqs-section', 'template_path' => 'frontend/templates/template2/components/faqs-section.blade.php'],
            ['name' => 'blogs-section', 'template_path' => 'frontend/templates/template2/components/blogs-section.blade.php'],



            // Template 3

        ]);
    }
}
