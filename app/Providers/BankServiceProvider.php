<?php

namespace App\Providers;

use App\Services\Bank\ABank\ABank;
use App\Services\Bank\ABank\ABankAdapter;
use App\Services\Bank\AccountBalance;
use App\Services\Bank\BankInterface;
use App\Services\Bank\BBank\BBank;
use App\Services\Bank\BBank\BBankAdapter;
use App\Services\Bank\CBank\CBank;
use App\Services\Bank\CBank\CBankAdapter;
use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BankInterface::class , function () {

            $bank = request('bank');
            switch ($bank) {

                case 'A' :
                    return new ABankAdapter(new ABank);
                    break;

                case 'B' :
                    return new BBankAdapter(new BBank);
                    break;

                case 'C' :
                    return new CBankAdapter(new CBank);
                    break;

                case is_array($bank) :
                    return new AccountBalance(
                        new ABankAdapter(new ABank) ,
                        new BBankAdapter(new BBank) ,
                        new CBankAdapter(new CBank) );
                    break;

                default :
                    return "no bank available";
                    break;
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
