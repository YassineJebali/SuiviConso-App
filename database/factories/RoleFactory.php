<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->randomElement(['inputuser', 'localmanager', 'admin']),
            'description' => $this->faker->sentence,
            'permission_id' => Permission::factory(),
        ];
    }
}