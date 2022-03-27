<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mejas')->insert(
            array(
                [
                    'id'            => 1,
                    'area_id'       => 1,
                    'nomor_meja'    => '1',
                    'status'        => 1,
                ],
                [
                    'id'            => 2,
                    'area_id'       => 1,
                    'nomor_meja'    => '2',
                    'status'        => 1,
                ],
                [
                    'id'            => 3,
                    'area_id'       => 1,
                    'nomor_meja'    => '3',
                    'status'        => 1,
                ],
                [
                    'id'            => 4,
                    'area_id'       => 1,
                    'nomor_meja'    => '4',
                    'status'        => 1,
                ],
                [
                    'id'            => 5,
                    'area_id'       => 1,
                    'nomor_meja'    => '5',
                    'status'        => 1,
                ],
                [
                    'id'            => 6,
                    'area_id'       => 2,
                    'nomor_meja'    => '6',
                    'status'        => 1,
                ],
                [
                    'id'            => 7,
                    'area_id'       => 2,
                    'nomor_meja'    => '7',
                    'status'        => 1,
                ],
                [
                    'id'            => 8,
                    'area_id'       => 2,
                    'nomor_meja'    => '8',
                    'status'        => 1,
                ],
                [
                    'id'            => 9,
                    'area_id'       => 2,
                    'nomor_meja'    => '9',
                    'status'        => 1,
                ],
                [
                    'id'            => 10,
                    'area_id'       => 3,
                    'nomor_meja'    => '10',
                    'status'        => 1,
                ],
                [
                    'id'            => 11,
                    'area_id'       => 3,
                    'nomor_meja'    => '11',
                    'status'        => 1,
                ],

            )
        );
    }
}
