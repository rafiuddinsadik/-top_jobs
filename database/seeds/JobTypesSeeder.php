<?php

use Illuminate\Database\Seeder;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_types = [
            'Freelance','Full Time', 'Internship', 'Part Time', 'Temporary'
        ];

        foreach ($job_types as $job_type){
            \App\Models\JobType::create([
                'user_id' => 3,
                'name' => $job_type
            ]);
        }
    }
}
