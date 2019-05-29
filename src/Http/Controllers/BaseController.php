<?php

namespace Leuverink\ForgeServer\Http\Controllers;

use Themsaid\Forge\Forge;
use Illuminate\Support\Fluent;
use Illuminate\Support\Facades\Config;

class BaseController
{
    /**
     * The config
     *
     * @var Fluent
     */
    protected $config;

    public function __construct() 
    {
        $this->loadConfig();
    }

    /**
     * Set a fluent object containing the config
     *
     * @return void
     */
    private function loadConfig()
    {
        $this->config = new Fluent(
            Config::get('nova-forge-server', [])
        );
    }

}