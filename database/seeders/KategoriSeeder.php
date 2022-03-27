<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert(
            array(
                [
                    'id'                => 1,
                    'nama_kategori'     => 'Makanan Berat',
                ],
                [
                    'id'                => 2,
                    'nama_kategori'     => 'Snack',
                ],
                [
                    'id'                => 3,
                    'nama_kategori'     => 'Minuman',
                ],

            )
        );
    }
}
