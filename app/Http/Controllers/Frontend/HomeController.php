<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\skill;
use App\location;


/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
