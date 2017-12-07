<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/12/17
 * Time: 15:11
 */

namespace Blit\Domains\Seeds;


use Blit\Domains\Models\Domain;
use Illuminate\Database\Seeder;

class DomainsTableSeeder extends  Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'User',
                'active' => 1,
            ]
        ];

        foreach($data as $reg)
        {
            Domain::firstOrCreate($reg);
        }
    }

}