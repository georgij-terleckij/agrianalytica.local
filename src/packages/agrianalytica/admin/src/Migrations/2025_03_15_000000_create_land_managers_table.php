<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('land_managers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('status', ['active', 'banned'])->default('active')->index();
            $table->foreignId('role_id')->nullable()->constrained()->onDelete('set null')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('land_managers');
    }
};
