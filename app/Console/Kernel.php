<?php

namespace GetCandy\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \GetCandy\Console\Commands\ElasticIndexCommand::class,
        \GetCandy\Console\Commands\ImportAquaSpa::class,
        \GetCandy\Console\Commands\IndexRefreshCommand::class,
        \GetCandy\Console\Commands\SyncDescriptionsCommand::class,
        \GetCandy\Console\Commands\InstallGetCandyCommand::class,
        \GetCandy\Console\Commands\SyncCustomerGroups::class,
        \GetCandy\Console\Commands\FixInvoiceReference::class,
        \GetCandy\Console\Commands\SyncPendingOrders::class,
        \GetCandy\Console\Commands\UpdateTransactionsCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
