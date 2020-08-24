<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'test1',
            'phone' => '001001001',
            'address' => 'Usa',
            'email' => 'test@gmail.com',
        ]);

        Customer::create([
            'name' => 'cust1',
            'phone' => '002001001',
            'address' => 'Canada',
            'email' => 'cust@gmail.com',
        ]);

        Customer::create([
            'name' => 'cust2',
            'phone' => '003002001',
            'address' => 'China',
            'email' => 'cust2@gmail.com',
        ]);
        Customer::create([
            'name' => 'cust3',
            'phone' => '003003002',
            'address' => 'Europe',
            'email' => 'cust3@gmail.com',
        ]);
        Customer::create([
            'name' => 'test2',
            'phone' => '004003002',
            'address' => 'China',
            'email' => 'test2@gmail.com',
        ]);
    }
}
