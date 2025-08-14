<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'first_name'=>$this->faker->name,
            'last_name'=>$this->faker->name,
            'gender'=>$this->faker->randomElement(['男性','女性','その他']),
            'email'=>$this->faker->safeEmail,
            'tel'=>$this->faker->phoneNumber,
            'address'=>$this->faker->address,
            'building'=>$this->faker->secondaryAddress,
            'type='=>$this->faker->randomElement(['商品のお届けについて','商品の交換について','商品トラブル','ショップへのお問合わせ','その他']),
            'content'=>$this->faker->realText(60),
        ];
    }
}
