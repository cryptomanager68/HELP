<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpressionOfInterest;
use Illuminate\Support\Facades\Mail;

class EOIController extends Controller
{
    public function equityParticipantGateway()
    {
        return view('equity-participant-gateway');
    }

    public function propertyOwnerGateway()
    {
        return view('property-owner-gateway');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'participant_type' => 'required|in:equity_participant,property_owner',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:50',
            'best_time_to_call' => 'nullable|string|max:100',
            'email_address' => 'required|email|max:255',
            'general_location' => 'nullable|string|max:255',
            'approximate_equity' => 'nullable|string|max:255',
            'property_type' => 'nullable|string|max:100',
            'property_type_other' => 'nullable|string|max:255',
            'approximate_land_size' => 'nullable|string|max:255',
            'current_use' => 'nullable|string|max:255',
            'option_outright_sale' => 'nullable|boolean',
            'option_joint_venture' => 'nullable|boolean',
            'option_syndicate' => 'nullable|boolean',
            'option_unsure' => 'nullable|boolean',
            'acknowledgement_1' => 'required|accepted',
            'acknowledgement_2' => 'required|accepted',
            'acknowledgement_3' => 'required|accepted',
            'acknowledgement_4' => 'required|accepted',
        ]);

        // Store the EOI
        $eoi = ExpressionOfInterest::create($validated);

        // Send confirmation email (optional)
        // Mail::to($validated['email_address'])->send(new EOIConfirmation($eoi));

        return view('eoi-success', ['eoi' => $eoi]);
    }
}
