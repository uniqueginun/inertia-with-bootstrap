<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'phone_no' => 'required|max:10'
        ]);

        Customer::create($attributes);
    }
}
