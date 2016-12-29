<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Store\Option;
use Store\Product;
use Store\ProductOption;
use Store\Repositories\ProductRepository;
use Store\User;
use Store\Variant;
use Store\VariantValue;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Guest',
            'email' => 'guest@galeiras.pt',
            'password' => Hash::make('galeiras')
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'store@galeiras.pt',
            'password' => Hash::make('g4l31r4s!2017')
        ])->update(['admin' => true]);
   }
}