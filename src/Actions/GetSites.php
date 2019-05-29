<?php

namespace Leuverink\ForgeServer\Actions;

use Themsaid\Forge\Forge;

class GetSites {

    /**
     * The forge sdk instance
     *
     * @var Forge
     */
    public $forge;

    /**
     * The GetFavicons Action
     * 
     * @var GetFavicons
     */

    public function __construct(Forge $forge, GetFavicons $getFavicons)
    {
        $this->forge = $forge;
        $this->getFavicons = $getFavicons;
    }

    /**
     * Get all sites and additional info belonging 
     * to the server and return merged data.
     *
     * @param string $serverId
     * @return void
     */
    public function execute(string $serverId)
    {
        $sites = $this->forge->sites($serverId);
        $favicons = $this->getFavicons->execute($sites);
        // TODO: Merge favicons with site response

        return $sites;
    }
}