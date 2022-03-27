<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert(
            array(
                [
                    'id'                => 1,
                    'kategori_id'       => 1,
                    'nama_produk'       => 'Pizza',
                    'favorit'           => 1,
                    'harga'             => 100000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-1.jpg'
                ],
                [
                    'id'                => 2,
                    'kategori_id'       => 1,
                    'nama_produk'       => 'Crispy giant squid',
                    'favorit'           => 0,
                    'harga'             => 30000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-2.jpg'
                ],
                [
                    'id'                => 3,
                    'kategori_id'       => 1,
                    'nama_produk'       => 'Nasi Goreng',
                    'favorit'           => 0,
                    'harga'             => 25000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-3.jpg'
                ],
                [
                    'id'                => 4,
                    'kategori_id'       => 1,
                    'nama_produk'       => 'Bakso',
                    'favorit'           => 1,
                    'harga'             => 20000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-4.jpg'
                ],
                [
                    'id'                => 5,
                    'kategori_id'       => 2,
                    'nama_produk'       => 'Kentang goreng saus keju',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-5.jpg'
                ],
                [
                    'id'                => 6,
                    'kategori_id'       => 2,
                    'nama_produk'       => 'Potato wedges',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-6.jpg'
                ],
                [
                    'id'                => 7,
                    'kategori_id'       => 2,
                    'nama_produk'       => 'Buttermilk waffle',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-7.jpg'
                ],
                [
                    'id'                => 8,
                    'kategori_id'       => 2,
                    'nama_produk'       => 'Pancake pisang',
                    'favorit'           => 0,
                    'harga'             => 25000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-8.jpg'
                ],
                [
                    'id'                => 9,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Ice Blend',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-9.jpg'
                ],
                [
                    'id'                => 10,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Milk Shake',
                    'favorit'           => 0,
                    'harga'             => 20000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-10.jpg'
                ],
                [
                    'id'                => 11,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Milk Tea',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-11.jpg'
                ],
                [
                    'id'                => 12,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Fruit Tea',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-12.jpg'
                ],
                [
                    'id'                => 13,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Flavoured Soda',
                    'favorit'           => 0,
                    'harga'             => 15000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-13.jpg'
                ],
                [
                    'id'                => 14,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Latte',
                    'favorit'           => 1,
                    'harga'             => 20000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-14.jpg'
                ],
                [
                    'id'                => 15,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Macchiato',
                    'favorit'           => 0,
                    'harga'             => 20000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-15.jpg'
                ],
                [
                    'id'                => 16,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Hot Chocolate',
                    'favorit'           => 0,
                    'harga'             => 20000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-16.jpg'
                ],
                [
                    'id'                => 17,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Fruit Yogurt',
                    'favorit'           => 0,
                    'harga'             => 25000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-17.jpg'
                ],
                [
                    'id'                => 18,
                    'kategori_id'       => 3,
                    'nama_produk'       => 'Mocktail',
                    'favorit'           => 0,
                    'harga'             => 30000,
                    'status'            => 1,
                    'deskripsi'         => 'lorem ipsum',
                    'gambar'            => 'gambar-produk-18.jpg'
                ],


            )
        );
    }
}
