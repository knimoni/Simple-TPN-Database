<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Child;

class ChildSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data dulu agar tidak ada duplikasi
        Child::truncate();

        // Tambahkan 3 data default
        Child::insert([
            [
                'name' => 'Emma',
                'identifier' => '63194',
                'gender' => 'Female',
                'height' => 145,
                'birthday' => '2034-08-22',
                'bloodtype' => 'O',
            ],
            [
                'name' => 'Ray',
                'identifier' => '81194',
                'gender' => 'Male',
                'height' => 150,
                'birthday' => '2034-01-15',
                'bloodtype' => 'AB',
            ],
            [
                'name' => 'Norman',
                'identifier' => '22194',
                'gender' => 'Male',
                'height' => 145,
                'birthday' => '2034-03-21',
                'bloodtype' => 'A',
            ],
        ]);
    }
}

