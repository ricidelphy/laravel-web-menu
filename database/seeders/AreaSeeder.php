<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert(
            array(
                [
                    'id'            => 1,
                    'nama_area'     => 'Indoor',
                    'status'        => 1,
                ],
                [
                    'id'            => 2,
                    'nama_area'     => 'Teras',
                    'status'        => 1,
                ],
                [
                    'id'            => 3,
                    'nama_area'     => 'Halaman',
                    'status'        => 1,
                ],

            )
        );
    }
}
