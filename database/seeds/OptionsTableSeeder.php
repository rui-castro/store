<?php

use Illuminate\Database\Seeder;
use Store\Option;
use Store\OptionValue;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option_color = Option::create(['name' => 'color']);
        OptionValue::create([
            'option_id' => $option_color->id,
            'value' => 'yellow'
        ]);
        OptionValue::create([
            'option_id' => $option_color->id,
            'value' => 'white'
        ]);
        OptionValue::create([
            'option_id' => $option_color->id,
            'value' => 'pink'
        ]);
        $option_karat = Option::create(['name' => 'karat']);
        OptionValue::create([
            'option_id' => $option_karat->id,
            'value' => '8',
        ]);
        OptionValue::create([
            'option_id' => $option_karat->id,
            'value' => '9',
        ]);
        OptionValue::create([
            'option_id' => $option_karat->id,
            'value' => '14',
        ]);
        OptionValue::create([
            'option_id' => $option_karat->id,
            'value' => '18',
        ]);
        OptionValue::create([
            'option_id' => $option_karat->id,
            'value' => '19.2',
        ]);
    }
}
