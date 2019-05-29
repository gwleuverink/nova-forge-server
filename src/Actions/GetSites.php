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

    public function __construct(Forge $forge)
    {
        $this->forge = $forge;
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
        $sites = $this->fetchSites($serverId);
        $favicons = $this->fetchFavicons($sites);

        return $sites;
    }

    /**
     * Fetch all sites from Forge.
     *
     * @param string $serverId
     * @return array
     */
    private function fetchSites(string $serverId) : array
    {
        return $this->forge->sites($serverId);
    }

    /**
     * Fetch all favicons from storage or scrape from the domain
     *
     * @param array $sites
     * @return array
     */
    private function fetchFavicons(array $sites) : array
    {
        // TODO: Implement this method.
        return [];
    }
}