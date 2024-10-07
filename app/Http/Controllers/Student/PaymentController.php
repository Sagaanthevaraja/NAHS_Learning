<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->get();

        return view('student.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('student.payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|string|max:255',
            'receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle the file upload
        $path = $request->file('receipt')->store('receipts', 'public');

        // Create a new payment record
        Payment::create([
            'user_id' => Auth::id(),
            'month' => $request->month,
            'receipt_path' => $path,
        ]);

        return redirect()->route('student.payments.index')->with('success', 'Payment receipt uploaded successfully.');
    }
}
