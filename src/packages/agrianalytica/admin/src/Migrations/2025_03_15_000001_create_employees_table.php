<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID вместо ID
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('role_id')->index(); // Оптимизируем запросы по ролям
//            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->index();
            $table->enum('status', ['active', 'banned'])->default('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
