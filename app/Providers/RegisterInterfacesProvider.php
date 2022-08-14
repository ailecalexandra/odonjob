<?php

namespace App\Providers;

use App\Http\Controllers\Admin\repository\AdminRepository;
use App\Http\Controllers\Admin\service\AdminService;
use App\Http\Controllers\Authenticate\repository\AuthenticatedRepository;
use App\Http\Controllers\Authenticate\service\AuthenticatedService;
use App\Http\Controllers\DentalHistory\repository\DentalHistoryRepository;
use App\Http\Controllers\DentalHistory\service\DentalHistoryService;
use App\Http\Controllers\DetailFather\repository\DetailFatherRepository;
use App\Http\Controllers\DetailFather\service\DetailFatherService;
use App\Http\Controllers\DetailMother\repository\DetailMotherRepository;
use App\Http\Controllers\DetailMother\service\DetailMotherService;
use App\Http\Controllers\DetailUser\repository\DetailUserRepository;
use App\Http\Controllers\DetailUser\service\DetailUserService;
use App\Http\Controllers\Location\repository\LocationRepository;
use App\Http\Controllers\Location\service\LocationService;
use App\Http\Controllers\MedicalHistory\repository\MedicalHistoryRepository;
use App\Http\Controllers\MedicalHistory\service\MedicalHistoryService;
use App\Http\Controllers\Occupation\repository\OccupationRepository;
use App\Http\Controllers\Occupation\service\OccupationService;
use App\Http\Controllers\Payment\repository\PaymentRepository;
use App\Http\Controllers\Payment\service\PaymentService;
use App\Http\Controllers\Sector\repository\SectorRepository;
use App\Http\Controllers\Sector\service\SectorService;
use App\Http\Controllers\Type\repository\TypeRepository;
use App\Http\Controllers\Type\service\TypeService;
use App\Http\Controllers\User\repository\UserRepository;
use App\Http\Controllers\User\service\UserService;
use App\Repositories\Repository;
use App\Services\Service;
use Illuminate\Support\ServiceProvider;

class RegisterInterfacesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Service::class ,Repository::class);
        $this->app->bind(UserService::class,UserRepository::class);
        $this->app->bind(AdminService::class,AdminRepository::class);
        $this->app->bind(OccupationService::class,OccupationRepository::class);
        $this->app->bind(SectorService::class,SectorRepository::class);
        $this->app->bind(AuthenticatedService::class,AuthenticatedRepository::class);
        $this->app->bind(DetailFatherService::class,DetailFatherRepository::class);
        $this->app->bind(DetailMotherService::class,DetailMotherRepository::class);
        $this->app->bind(MedicalHistoryService::class,MedicalHistoryRepository::class);
        $this->app->bind(DentalHistoryService::class,DentalHistoryRepository::class);
        $this->app->bind(PaymentService::class,PaymentRepository::class);
        $this->app->bind(TypeService::class, TypeRepository::class);
        $this->app->bind(LocationService::class,LocationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
