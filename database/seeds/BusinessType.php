<?php

use Illuminate\Database\Seeder;

class BusinessType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessType = [];
        $businessType[] = [
            'name' => 'Restoran/Cafe'
        ];
        $businessType[] = [
            'name' => 'Retail'
        ];
        $businessType[] = [
            'name' => 'Salon'
        ];
        $businessType[] = [
            'name' => 'Fashion'
        ];
        $businessType[] = [
            'name' => 'Bengkel'
        ];
        $businessType[] = [
            'name' => 'Laundry'
        ];
        $businessType[] = [
            'name' => 'Jasa'
        ];

        foreach ($businessType as $row) {
            DB::table('business_types')->insert([
                'name' => $row['name'],
            ]);
        }
    }
}
