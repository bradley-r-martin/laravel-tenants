<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/hyn/multi-tenant
 */

use Hyn\Tenancy\Abstracts\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettings extends AbstractMigration
{
    protected $system = true;

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hostname_id')->unsigned();
            $table->foreign('hostname_id')->references('id')->on('hostnames')->onDelete('cascade');

            $table->string('logo')->nullable();
            $table->string('hero')->nullable();
            $table->integer('mask')->default(1);
            $table->text('palette')->nullable();
            $table->string('color')->nullable();

            $table->text('privacy')->nullable();
            $table->text('terms')->nullable();

            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->nullable();
            $table->timestamp('deletedAt')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
