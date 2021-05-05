<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
      for($i = 0; $i < 10; $i++) {
          App\Condition::create([
            'start'=>$faker->dateTime('now'),
            'diagnosis'=>$faker->dateTime('now'),
            'hospital'=> $faker->word(),
            'others'=> $faker->word(),
            'comment'=> $faker->word(),
            'icon'=> $faker->word(),
            'conditiondata_id'=> $faker->numberBetween(1, 999),
            'user_id'=> $faker->numberBetween(1, 10),
             ]);
    }
}
}
