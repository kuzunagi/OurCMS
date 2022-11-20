<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// Model
use App\Models\SiteSetting;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $site_settings;
    public function __construct()
    {
        $this->site_settings = SiteSetting::select(['name', 'value'])->get();
        view()->share('site_settings', $this->site_settings);
    }
}
