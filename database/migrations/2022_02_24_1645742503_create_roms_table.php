<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CreateRomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("brand_id")->constrained("brands")->references("id");
            $table->foreignId("category_id")->constrained("categories")->references("id");
            $table->string('model')->nullable();
            $table->string('model_name')->nullable();
            $table->string('region')->nullable();
            $table->string('security_level')->nullable();
            $table->string('security_date')->nullable();
            $table->foreignId("version_id")->constrained("versions")->references("id");
            $table->string('build date')->nullable();
            $table->string('status')->nullable();
            $table->string('url1')->nullable();
            $table->string('url2')->nullable();
            $table->string('url3')->nullable();
            $table->string('views')->nullable();
            $table->longtext('info')->nullable();
            $table->string('tags')->nullable();
            $table->string('root_mode')->nullable();
            $table->string('key_id')->nullable();
            $table->string('imei')->nullable();
            $table->string('baseband')->nullable();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roms');
    }
}