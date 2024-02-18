<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::factory()
            ->count(10)
            ->hasPayments(12)
            ->hasCharges(15)
            ->create();
 
        Member::factory()
            ->count(8)
            ->hasPayments(9)
            ->hasCharges(10)
            ->create();

        Member::factory()
            ->count(9)
            ->hasPayments(3)
            ->hasCharges(3)
            ->create();
        Member::factory()
            ->count(2)
            ->hasCharges(3)
            ->create();
        Member::factory()
            ->count(4)            
            ->create();
    }
}
