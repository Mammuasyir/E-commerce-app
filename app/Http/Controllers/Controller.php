<?php

namespace App\Http\Controllers;

use App\Models\kategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View as FacadesView;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

public function __construct()
{
    $kategory = kategory::orderBy('id', 'desc')->get();
    FacadesView::share([
        'kategory' => $kategory,
    ]);
}

}