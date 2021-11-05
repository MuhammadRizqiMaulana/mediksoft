<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tagihan_RJController extends Controller
{
    public function index()
    {
        return view('Billing.Content.Tagihan_RJ');
    }
}