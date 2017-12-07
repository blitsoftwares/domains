<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/12/17
 * Time: 15:10
 */

namespace Blit\Domains\Seeds;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DomainsTableSeeder::class);
    }
}