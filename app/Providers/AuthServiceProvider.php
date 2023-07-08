<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin\Data\PkkmbGrup;
use App\Models\Admin\MasterData\Mahasiswa;
use App\Models\Admin\MasterData\Pegawai;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('masterdata', function (Pegawai $pegawai) {
            return $pegawai->is_masterdata;
        });

        Gate::define('is_koor_pkkmb', function (Mahasiswa $mahasiswa) {
            $list_pkkmb_grup = PkkmbGrup::all();
            foreach ($list_pkkmb_grup as $grup) {
                if ($grup->is_koor_1 === $mahasiswa->id || $grup->is_koor_2 === $mahasiswa->id) {
                    return true;
                }
            }
        });
    }
}
