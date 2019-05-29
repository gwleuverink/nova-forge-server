<?php

namespace Leuverink\ForgeServer;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class ForgeServer extends Tool
{
    public function __construct($serverId)
    {
        // TODO: How to pass this to the tool? It doesn't get passed.
        $this->withMeta(['serverId' => $serverId]);
    }

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('forge-server', __DIR__.'/../dist/js/tool.js');
        Nova::style('forge-server', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('forge-server::navigation');
    }
}
