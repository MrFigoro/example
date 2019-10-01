<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Migration
{
    protected $adminEmail = 'admin@mailforspam.com';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('insert into `users` (`name`, `email`, `password`, `role`) values("admin", "'.$this->adminEmail
            .'", "'.Hash::make('funlib1234').'", "admin")');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("delete from `users` where `email` = '{$this->adminEmail}'");
    }
}
