<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SEO;
use SEOMeta;
use OpenGraph;
use Twitter;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        SEO::setDescription(setting('app_description', config('app.name')));
        SEOMeta::addKeyword(setting('app_keywords', setting('app_name', config('app.name'))));
        OpenGraph::setUrl(url()->current());
        Twitter::setUrl(url()->current());
    }
}
