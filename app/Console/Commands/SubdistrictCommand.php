<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\SubdistirctController;
use Illuminate\Console\Command;

class SubdistrictCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subdistrict:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch subdistrict data from raja ongkir API.';

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
    public function handle(SubdistirctController  $invokable)
    {
        $invokable();
    }
}
