<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Lists;
use App\Models\StatusWhatsapp;
use App\Models\Template;
use App\Models\User;
use App\Models\WhatsappId;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $fakers = Factory::create();
        Client::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'address' => 'Giza',
            'phone' => '01111289180',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt("123456789"),
            'phone' => "201111289180",
            'client_id' => Client::first()->id,
        ]);

        User::create([
            'name' => 'Ahmed Hamada',
            'email' => 'tesst@admin.com',
            'password' => bcrypt("123456789"),
            'phone' => "201159885047",
            'client_id' => Client::first()->id,
        ]);

        WhatsappId::create([
            'client_id' => Client::first()->id,
            'whatsapp_id' => "100250016417498",
            'name' => "Admin",
        ]);

        StatusWhatsapp::create([
            'client_id' => Client::first()->id,
            'whatsapp_id' => WhatsappId::first()->id,
            'name' => 'Active',
        ]);

        StatusWhatsapp::create([
            'client_id' => Client::first()->id,
            'whatsapp_id' => WhatsappId::first()->id,
            'name' => 'padding',
        ]);
        Template::create([
            'client_id' => Client::first()->id,
            'name' => 'hello_world',
        ]);

        Lists::create([
            'client_id' => Client::first()->id,
            'text_header' => fake()->name(),
            'text_body' => fake()->name(),
            'text_footer' => fake()->name(),
            'text_button'=> fake()->name(),
            'title'=>fake()->title(),
            'body'=> [
                'id'=> fake()->name.fake()->numberBetween(1,5555),
                'title'=> fake()->title(),
                'description'=> fake()->title()
            ],
        ]);

        for ($i = 0, $ii = 3; $i < $ii; $i++) {
            Client::create([
                'name' => $fakers->name(),
                'email' => $fakers->unique()->safeEmail(),
                'address' => $fakers->address(),
                'phone' => $fakers->numberBetween(0, 99999),
            ]);

            User::create([
                'name' => $fakers->name(),
                'email' => $fakers->unique()->safeEmail(),
                'password' => bcrypt("123456789"),
                'phone' => $fakers->unique()->phoneNumber(),
                'client_id' => $fakers->randomElement(Client::where('name', '!=', 'admin')->pluck('id')->toArray()),
            ]);

            WhatsappId::create([
                'client_id' => $fakers->randomElement(Client::where('name', '!=', 'admin')->pluck('id')->toArray()),
                'whatsapp_id' => $fakers->numberBetween(0, 99999999),
                'name' => $fakers->name(),
            ]);

            StatusWhatsapp::create([
                'client_id' => $fakers->randomElement(Client::where('name', '!=', 'admin')->pluck('id')->toArray()),
                'whatsapp_id' => $fakers->randomElement(WhatsappId::all()->pluck('id')),
                'name' => $fakers->randomElement(['active', 'padding', 'block']),
            ]);

            Template::create([
                'client_id' => $fakers->randomElement(Client::where('name', '!=', 'admin')->pluck('id')->toArray()),
                'name' => 'hello_world',
            ]);

            Lists::create([
                'client_id' => $fakers->randomElement(Client::where('name', '!=', 'admin')->pluck('id')->toArray()),
                'text_header' => fake()->name(),
                'text_body' => fake()->name(),
                'text_footer' => fake()->name(),
                'text_button'=> fake()->name(),
                'title'=>fake()->title(),
                'body'=> [
                    'id'=> fake()->name.fake()->numberBetween(1,5555),
                    'title'=> fake()->title(),
                    'description'=> fake()->title()
                ],
            ]);
        }

    }
}
