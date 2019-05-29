<?php

namespace Leuverink\ForgeServer\Http\Controllers;

use Illuminate\Http\Request;
use Leuverink\ForgeServer\Actions\DeploySites;

class DeploySitesController extends BaseController {

    public function __invoke(Request $request, DeploySites $deploySites) 
    {
        return $deploySites->execute($this->config->server_id, $request->sites);
    }
}