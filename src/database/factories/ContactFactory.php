<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'gender'=>$this->faker->randomElement(['男性', '女性', 'その他']),
            'tel'=>$this->faker->phoneNumber,
            'email'=>$this->faker->unique()->safeEmail,
            'address'=>$this->faker->address,
            'building'=>$this->faker->optional()->secondaryAddress,
            'category_id'=>$this->faker->numberBetween(1,5),
            'detail'=>$this->faker->text(120),
        ];
    }
}
