<?php

use CodePress\CodeUser\Models\User;
use CodePress\CodeUser\Models\Role;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $roleAdmin = Role::where('name', Role::ROLE_ADMIN)->first();
        $roleEditor = Role::where('name', Role::ROLE_EDITOR)->first();
        $roleRedator = Role::where('name', Role::ROLE_REDATOR)->first();

        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $admin->roles()->save($roleAdmin);

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $editor->roles()->save($roleEditor);

        $redator = User::create([
            'name' => 'Redator',
            'email' => 'redator@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $redator->roles()->save($roleRedator);
    }

    public function down(){}
}
