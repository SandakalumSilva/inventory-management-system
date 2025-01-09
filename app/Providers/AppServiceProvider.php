<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\Pos\CategoryInterface;
use App\Interfaces\Pos\CustomerInterface;
use App\Interfaces\Pos\DefaultInterface;
use App\Interfaces\Pos\ProductInterface;
use App\Interfaces\Pos\PurchaseInterface;
use App\Interfaces\Pos\UnitInterface;
use App\Interfaces\SupplierInterface;
use App\Repository\AdminRepository;
use App\Repository\Pos\CategoryRepository;
use App\Repository\Pos\CustomerRepository;
use App\Repository\Pos\DefaultRepository;
use App\Repository\Pos\ProductRepository;
use App\Repository\Pos\PurchaseRepository;
use App\Repository\Pos\UnitRepository;
use App\Repository\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(UnitInterface::class, UnitRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(PurchaseInterface::class, PurchaseRepository::class);
        $this->app->bind(DefaultInterface::class,DefaultRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
