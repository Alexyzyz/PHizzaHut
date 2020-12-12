<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'American Favourite',
            'description'   => 'Dengan pepperoni, daging cincang, jamur dan saus spesial PHD.',
            'price'         => 80000,
            'image'         => 'pizza_0.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Pepperoni',
            'description'   => 'Topping pepperoni, keju mozarella dan saus special PHD.',
            'price'         => 80000,
            'image'         => 'pizza_1.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Meat Lovers',
            'description'   => 'Dengan burger sapi, daging cincang, daging asap, sosis sapi, keju mozarella dan saus spesial PHD.',
            'price'         => 80000,
            'image'         => 'pizza_2.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Super Supreme',
            'description'   => 'Dengan chicken luncheon, daging asap, daging & burger sapi, jamur, nanas, paprika merah & hijau, keju mozzarella dan saus spesial PHD.',
            'price'         => 80000,
            'image'         => 'pizza_3.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Cheesy Galore',
            'description'   => 'Dengan ekstra keju mozzarella, bumbu khas italia dan saus special PHD.',
            'price'         => 80000,
            'image'         => 'pizza_4.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Tuna Melt',
            'description'   => 'Dengan tuna, jagung, peterseli, mayones dan keju mozzarella.',
            'price'         => 80000,
            'image'         => 'pizza_5.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Hawaiian Chicken',
            'description'   => 'Dengan nanas, daging ayam, paprika, keju mozzarella dan saus tomat pedas.',
            'price'         => 80000,
            'image'         => 'pizza_6.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Veggie Garden',
            'description'   => 'Dengan jamur, paprika merah dan hijau, nanas, jagung, keju mozzarella dan saus spesial PHD.',
            'price'         => 80000,
            'image'         => 'pizza_7.png'
        ]);

        \Illuminate\Support\Facades\DB::table('pizzas')->insert([
            'name'          => 'Krakatau Burst Pizza',
            'description'   => 'Tantangan baru yang wajib dicoba! Black Pizza dengan ledakan pinggiran kejunya yang maksimal!',
            'price'         => 80000,
            'image'         => 'pizza_8.png'
        ]);
    }
}
