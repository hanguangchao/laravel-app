<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DbTest extends TestCase
{
    
    use RefreshDatabase;

    protected $seeder = DatabaseSeeder::class;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDBInit()
    {
        $this->assertEquals(10, DB::table('users')->count());
    }
}
