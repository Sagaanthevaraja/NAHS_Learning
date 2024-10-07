<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Fetch all payments and eager load the associated user
        $payments = Payment::with('user')->get();

        return view('admin.payments.index', compact('payments'));
    }
}
