<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;
Use Carbon\Carbon;

class IncomeFactory extends Factory{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'incate_id' => 1,
          'income_title' => $this->faker->name(),
          'income_date' => $this->faker->date('d-m-y'),
          'income_amount' => $this->faker->randomDigit(),
          'income_creator' =>1,
          'income_slug' => "IN".uniqid(),
          'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
