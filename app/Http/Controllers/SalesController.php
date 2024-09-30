<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;

class SalesController extends Controller
{
    public function POS()
    {
        return view('sales.create');
    }

    public function Sales()
    {
        return view('sales.view');
    }
}
