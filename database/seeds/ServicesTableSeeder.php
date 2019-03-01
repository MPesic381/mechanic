<?php
    
    use App\Service;
    use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' =>'Veliki servis',
            'time_required' => '6:00:00',
            'warranty' => '50000',
            'cost' => '20000'
        ]);
        
        Service::create([
            'name' =>'Mali servis',
            'time_required' => '3:00:00',
            'warranty' => '1000',
            'cost' => '20000'
        ]);
        
        Service::create([
            'name' =>'Zamena amortizera',
            'time_required' => '1:45:00',
            'warranty' => '25000',
            'cost' => '20000'
        ]);
        
        Service::create([
            'name' =>'Popravka alternatora',
            'time_required' => '2:30:00',
            'warranty' => '50000',
            'cost' => '500'
        ]);
        
        Service::create([
            'name' =>'Set zupcenja',
            'time_required' => '1:30:00',
            'warranty' => '10000',
            'cost' => '4500'
        ]);
        
        Service::create([
            'name' =>'Sredjivanje korozije',
            'time_required' => '1:45:00',
            'warranty' => '100000',
            'cost' => '2000'
        ]);
        
        Service::create([
            'name' =>'Zamena bosch pumpe',
            'time_required' => '0:50:00',
            'warranty' => '100000',
            'cost' => '2000'
        ]);
        
        Service::create([
            'name' =>'Spustanje glave motora',
            'time_required' => '3:30:00',
            'warranty' => '100000',
            'cost' => '2000'
        ]);
    
        Service::create([
            'name' =>'Ispravka limarije',
            'time_required' => '0:55:00',
            'warranty' => '100000',
            'cost' => '2000'
        ]);
    }
}
