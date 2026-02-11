<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressionOfInterest extends Model
{
    use HasFactory;

    protected $table = 'expressions_of_interest';

    protected $fillable = [
        'participant_type',
        'full_name',
        'mobile_number',
        'best_time_to_call',
        'email_address',
        'general_location',
        'approximate_equity',
        'property_type',
        'property_type_other',
        'approximate_land_size',
        'current_use',
        'option_outright_sale',
        'option_joint_venture',
        'option_syndicate',
        'option_unsure',
        'acknowledgement_1',
        'acknowledgement_2',
        'acknowledgement_3',
        'acknowledgement_4',
    ];

    protected $casts = [
        'option_outright_sale' => 'boolean',
        'option_joint_venture' => 'boolean',
        'option_syndicate' => 'boolean',
        'option_unsure' => 'boolean',
        'acknowledgement_1' => 'boolean',
        'acknowledgement_2' => 'boolean',
        'acknowledgement_3' => 'boolean',
        'acknowledgement_4' => 'boolean',
    ];
}
