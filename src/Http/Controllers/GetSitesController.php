<?php

namespace Leuverink\ForgeServer\Http\Controllers;

use Leuverink\ForgeServer\Actions\GetSites;

class GetSitesController extends BaseController {

    public function __invoke(GetSites $getSites) 
    {
        return $getSites->execute($this->config->server_id);
    }
}