<?php

namespace Jeelsureja\LaravelDuplicationChecker\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Jeelsureja\LaravelDuplicationChecker\Helpers\DuplicationDetector;

class DuplicationController extends Controller
{
    public function index()
    {
        $detector = new DuplicationDetector();
        $warnings = $detector->checkForDuplications();

        return view('duplication::duplication', compact('warnings'));
    }
}
