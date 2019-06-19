<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'moha gomaa',
                'email' => 'moha1@moha.com',
                'password' => bcrypt('123456'),
                'mobile' => '0000000000',
                'address' => 'mans',
                'created_at' => '2019-01-01 00:37:09',
                'updated_at' => '2019-01-01 00:37:09',
            ],[
                'name' => 'moasha gomaa',
                'email' => 'bam@bam.com',
                'password' => bcrypt('123456'),
                'mobile' => '0000000000',
                'address' => 'mans',
                'created_at' => '2019-01-01 00:37:09',
                'updated_at' => '2019-01-01 00:37:09',
            ]
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('123456'),
                'created_at' => '2019-01-01 00:37:09',
                'updated_at' => '2019-01-01 00:37:09',
            ],[
                'name' => 'mohamed gomaa',
                'email' => 'gomaa@gomaa.com',
                'password' => bcrypt('123456'),
                'created_at' => '2019-01-01 00:37:09',
                'updated_at' => '2019-01-01 00:37:09',
            ]
        ]);

        DB::table('settings')->insert([
                'sitename_ar'   => 'BAM',
                'sitename_en'   => 'BAM',
                'email'         => 'BAM@BAM.com',
                'created_at'    => '2019-04-05 00:37:09',
                'updated_at'    => '2019-04-05 00:37:09',
        ]);

        DB::table('departments')->insert([
            [
                'name' => 'mens wear',
                'created_at' => '2019-02-05 00:37:09',
                'updated_at' => '2019-02-05 00:37:09',
            ],[
                'name' => 'womens wear',
                'created_at' => '2019-05-12 00:37:09',
                'updated_at' => '2019-05-12 00:37:09',
            ],[
                'name' => 'kids wear',
                'created_at' => '2019-01-21 00:37:09',
                'updated_at' => '2019-01-21 00:37:09',
            ],[
                'name' => 'jewelry',
                'created_at' => '2019-02-28 00:37:09',
                'updated_at' => '2019-02-28 00:37:09',
            ],[
                'name' => 'shoeses',
                'created_at' => '2019-04-22 00:37:09',
                'updated_at' => '2019-04-22 00:37:09',
            ],[
                'name' => 'mix wear',
                'created_at' => '2019-03-20 00:37:09',
                'updated_at' => '2019-03-20 00:37:09',
            ]
        ]);

//        DB::table('products')->insert([
//            [
//                'title'      => 'product1',
//                'photo'      => '1555540272.jpg',
//                'content'    => 'test test test',
//                'price'      => '290',
//                'created_at' => '2019-02-05 00:37:09',
//                'updated_at' => '2019-02-05 00:37:09',
//            ],[
//                'title'      => 'product2',
//                'photo'      => '1555540786.jpg',
//                'content'    => 'test test test',
//                'price'      => '180',
//                'created_at' => '2019-05-12 00:37:09',
//                'updated_at' => '2019-05-12 00:37:09',
//            ],[
//                'title'      => 'product3',
//                'photo'      => '1555542063.jpg',
//                'content'    => 'test test test',
//                'price'      => '100',
//                'created_at' => '2019-01-21 00:37:09',
//                'updated_at' => '2019-01-21 00:37:09',
//            ],[
//                'title'      => 'product4',
//                'photo'      => '1555543431.jpg',
//                'content'    => 'test test test',
//                'price'      => '120',
//                'created_at' => '2019-02-28 00:37:09',
//                'updated_at' => '2019-02-28 00:37:09',
//            ],[
//                'title'      => 'product5',
//                'photo'      => '1555543476.jpg',
//                'content'    => 'test test test',
//                'price'      => '200',
//                'created_at' => '2019-04-22 00:37:09',
//                'updated_at' => '2019-04-22 00:37:09',
//            ],[
//                'title'      => 'product6',
//                'photo'      => '1555548345.jpg',
//                'content'    => 'test test test',
//                'price'      => '300',
//                'created_at' => '2019-03-20 00:37:09',
//                'updated_at' => '2019-03-20 00:37:09',
//            ],[
//                'title'      => 'product7',
//                'photo'      => '1555548385.jpg',
//                'content'    => 'test test test',
//                'price'      => '400',
//                'created_at' => '2019-03-20 00:37:09',
//                'updated_at' => '2019-03-20 00:37:09',
//            ],[
//                'title'      => 'product8',
//                'photo'      => '1555548405.jpg',
//                'content'    => 'test test test',
//                'price'      => '150',
//                'created_at' => '2019-03-20 00:37:09',
//                'updated_at' => '2019-03-20 00:37:09',
//            ],[
//                'title'      => 'product9',
//                'photo'      => '1555549093.jpg',
//                'content'    => 'test test test',
//                'price'      => '250',
//                'created_at' => '2019-03-20 00:37:09',
//                'updated_at' => '2019-03-20 00:37:09',
//            ]
//        ]);

    }
}
