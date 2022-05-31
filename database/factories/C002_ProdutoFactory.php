<?php

namespace Database\Factories;

use App\Models\C002_Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class C002_ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = C002_Produto::class;

    public function definition()
    {
        return [
            'C002_CodigoBarras' => $this->faker->ean13(),
            'C002_DescricaoProduto' => $this->faker->name,
            'C002_ValorUnitario' => $this->faker->randomDigit(),
            'C002_Quantidade' => $this->faker->randomDigit(),
        ];
    }
}
