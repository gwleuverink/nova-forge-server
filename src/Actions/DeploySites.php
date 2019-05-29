<?php

namespace Leuverink\ForgeServer\Actions;

use Themsaid\Forge\Forge;

class DeploySites {

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
     * Deploy all websites passed
     *
     * @param string $serverId
     * @param array $sites
     * @return void
     */
    public function execute(string $serverId, array $sites, $wait = false)
    {
        collect($sites)->each(function($site) use ($serverId, $wait) {
            $this->forge->deploySite($serverId, $site, $wait);
        });
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