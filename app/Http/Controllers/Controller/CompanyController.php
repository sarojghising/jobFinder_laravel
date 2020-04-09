<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index($id,Company $company)
    {
         return view('company.index',compact('company'));
    }
}
