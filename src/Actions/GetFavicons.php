<?php

namespace Leuverink\ForgeServer\Actions;

use Themsaid\Forge\Forge;

class GetFavicons {

    public function __construct()
    {
        //
    }

    /**
     * Fetch favicons either from storage or scrape them from
     * the website and cache locally
     *
     * @param array $sites
     * @return void
     */
    public function execute(array $sites)
    {
        // TOTO: Implement this method
        return $sites;
    }
}