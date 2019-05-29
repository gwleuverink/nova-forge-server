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
}