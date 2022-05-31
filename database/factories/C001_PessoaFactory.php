<?php

namespace Database\Factories;

use App\Models\C001_Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class C001_PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = C001_Pessoa::class;

    public function definition()
    {
        return [
            'C001_CPF' => $this->faker->ean13(),
            'C001_NomePessoa' => $this->faker->name,
            'C001_Email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
