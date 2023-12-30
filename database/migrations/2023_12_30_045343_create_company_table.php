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
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->string("company_name", 100);
            $table->string("company_email", 70);
            $table->boolean("email_verify", 0, 1)->default(0);
            $table->string("company_mobile_number", 20);
            $table->string("company_password", 80);
            $table->string("company_state", 50)->nullable();
            $table->string("company_city", 70)->nullable();
            $table->string("company_pincode", 50)->nullable();
            $table->string("company_address");            
            $table->string("company_document")->nullable();
            $table->enum("company_status", ["pending", "process", "active", "inactive"])->default("pending");
            $table->boolean("deleted_at", 0, 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
