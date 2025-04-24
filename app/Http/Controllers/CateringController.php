<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CateringOrderConfirmation;
use App\Mail\AdminOrderNotification;
use App\Models\CateringOrder;

class CateringController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,13}$/',
            'instagram' => 'nullable|string|max:255',
            'menu_type' => 'required|string',
            'end_date' => 'required|date|after_or_equal:start_date',
            'meal_types' => 'required|array',
            'meal_types.*' => 'in:Lunch,Dinner,Custom',
            'allergies' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Tambahkan nilai default untuk start_date jika diperlukan
        $validated['start_date'] = now();

        // Simpan data ke database
        $message = CateringOrder::create($validated);



        Mail::to('zakariapryutm@gmail.com')->send(new AdminOrderNotification($validated));
        Mail::to($request->email)->send(new CateringOrderConfirmation($validated));
        return redirect('/catering');
    }
}
