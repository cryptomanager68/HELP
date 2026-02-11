<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expressions_of_interest', function (Blueprint $table) {
            $table->id();
            $table->string('participant_type'); // equity_participant or property_owner
            $table->string('full_name');
            $table->string('mobile_number');
            $table->string('best_time_to_call')->nullable();
            $table->string('email_address');
            $table->string('general_location')->nullable();
            $table->string('approximate_equity')->nullable();
            $table->string('property_type')->nullable();
            $table->string('property_type_other')->nullable();
            $table->string('approximate_land_size')->nullable();
            $table->string('current_use')->nullable();
            $table->boolean('option_outright_sale')->default(false);
            $table->boolean('option_joint_venture')->default(false);
            $table->boolean('option_syndicate')->default(false);
            $table->boolean('option_unsure')->default(false);
            $table->boolean('acknowledgement_1')->default(false);
            $table->boolean('acknowledgement_2')->default(false);
            $table->boolean('acknowledgement_3')->default(false);
            $table->boolean('acknowledgement_4')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expressions_of_interest');
    }
};
