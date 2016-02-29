<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormbuilderTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formbuilder__forms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('formbuilder__form_contents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('content');
            $table->longText('json');
            $table->boolean('edited')->default(0);
            $table->timestamps();
        });

        Schema::create('formbuilder__form_messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->string('locale');
            $table->text('success')->nullable();
            $table->text('failure')->nullable();
            $table->text('validation_error')->nullable();
            $table->text('invalid_required')->nullable();
            $table->text('invalid_too_long')->nullable();
            $table->text('invalid_too_short')->nullable();
            $table->text('invalid_date')->nullable();
            $table->text('invalid_date_too_early')->nullable();
            $table->text('invalid_date_too_late')->nullable();
            $table->text('upload_failed')->nullable();
            $table->text('invalid_file_type')->nullable();
            $table->text('invalid_file_size')->nullable();
            $table->text('invalid_number')->nullable();
            $table->text('invalid_number_too_small')->nullable();
            $table->text('invalid_number_too_large')->nullable();
            $table->text('invalid_email')->nullable();
            $table->text('invalid_url')->nullable();
            $table->text('invalid_phone')->nullable();
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('formbuilder__forms')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('formbuilder__form_mail', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->string('locale');
            $table->text('to');
            $table->text('from');
            $table->text('subject');
            $table->text('additional_headers')->nullable();
            $table->longText('body')->nullable();
            $table->text('attachments')->nullable();
            $table->boolean('exclude_blank')->default(1);
            $table->boolean('use_html')->default(1);
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('formbuilder__forms')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('formbuilder__form_submits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->string('locale');
            $table->text('client_ip');
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('formbuilder__forms')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('formbuilder__form_submit_data', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('submit_id')->unsigned();
            $table->string('field_name');
            $table->longText('field_value');
            $table->integer('field_order');
            $table->boolean('is_file')->default(0);
            $table->foreign('submit_id')->references('id')->on('formbuilder__form_submits')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('formbuilder__form_submit_data');
        Schema::drop('formbuilder__form_submits');
        Schema::drop('formbuilder__form_mail');
        Schema::drop('formbuilder__form_messages');
        Schema::drop('formbuilder__form_contents');
        Schema::drop('formbuilder__forms');
    }
}
