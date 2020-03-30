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

class CreateSmtpFields extends AbstractMigration
{
    protected $system = true;

    public function up()
    {
      Schema::table('settings', function (Blueprint $table) {
        $table->string('smtpEmail')->nullable();
        $table->string('smtpName')->nullable();
        $table->string('smtpHost')->nullable();
        $table->string('smtpPort')->nullable();
        $table->string('smtpUsername')->nullable();
        $table->string('smtpPassword')->nullable();
        $table->string('smtpEncryption')->nullable();
      });
    }

    public function down()
    {
      Schema::table('settings', function (Blueprint $table) {
        $table->dropColumn('smtpEmail');
        $table->dropColumn('smtpName');
        $table->dropColumn('smtpHost');
        $table->dropColumn('smtpPort');
        $table->dropColumn('smtpUsername');
        $table->dropColumn('smtpPassword');
        $table->dropColumn('smtpEncryption');
      });
    }
}
