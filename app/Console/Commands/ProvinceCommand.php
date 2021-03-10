<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\GrabbingController;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Province;

class ProvinceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'province:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch province data from raja ongkir API.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProvinceController $invokable)
    {
        $invokable();
    }
}
