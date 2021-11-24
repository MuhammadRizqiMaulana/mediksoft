<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekeningRIController extends Controller
{
    public function index(){
    	
            
    	return view('Billing.Content.RekeningRI');
	}
}
