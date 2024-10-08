<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('messages', function (Blueprint $table) {
        $table->id();
        $table->string('sender_pseudonym');
        $table->string('receiver_pseudonym');
        $table->text('content')->nullable();
        $table->string('file_path')->nullable();
        $table->timestamp('expiration_time')->nullable();
        $table->boolean('read_status')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
