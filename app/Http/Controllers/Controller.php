<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      title="Cobuccio Securitizadora API",
     *      version="0.1"
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $service;
    public function __construct($service = null)
    {
        $this->service = $service;
    }
}
