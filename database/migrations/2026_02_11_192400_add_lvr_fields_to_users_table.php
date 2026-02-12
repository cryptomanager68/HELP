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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('number_of_properties')->nullable()->after('profile_completion_modal_shown');
            $table->decimal('total_mortgage', 15, 2)->nullable()->after('number_of_properties');
            $table->decimal('total_valuation', 15, 2)->nullable()->after('total_mortgage');
            $table->decimal('lvr_percentage', 5, 2)->nullable()->after('total_valuation');
            $table->boolean('lvr_submitted')->default(false)->after('lvr_percentage');
            $table->timestamp('lvr_submitted_at')->nullable()->after('lvr_submitted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'number_of_properties',
                'total_mortgage',
                'total_valuation',
                'lvr_percentage',
                'lvr_submitted',
                'lvr_submitted_at'
            ]);
        });
    }
};
