<?php

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class,20)->create();
        factory(Company::class,20)->create();
        factory(Category::class,20)->create();
        factory(Job::class,20)->create();

    }
}
