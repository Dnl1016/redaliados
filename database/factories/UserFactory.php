<?php

namespace Database\Factories;
use App\Models\Ally;
use App\Models\People;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
           // 'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified'=> $verificado= fake()->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
           // 'verificacion_token' =>$verificado == User::USUARIO_VERIFICADO? null: User::generarVerificationToken(),
            'admin'=> fake()->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR]),
            'status' => fake()->randomElement(['available', 'unavailable']),
            'people_id' => function(){
                return People::all()->random();
            },
            'allies_id' => function(){
                return Ally::all()->random();
            },

        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

