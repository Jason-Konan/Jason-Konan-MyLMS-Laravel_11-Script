<?php

namespace Database\Seeders;

use App\Models\TemplateSection;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $role = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Teacher']);
        Role::create(['name' => 'Student']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123456')
        ]);

        $user->assignRole([$role->id]);
        $this->call(TemplateSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TemplateSectionSeeder::class);
    }
}
