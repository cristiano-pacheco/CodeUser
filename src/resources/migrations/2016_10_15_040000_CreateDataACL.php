<?php

use CodePress\CodeUser\Models\Permission;
use CodePress\CodeUser\Models\Role;
use Illuminate\Database\Migrations\Migration;

class CreateDataACL extends Migration
{
    public function up()
    {
        $roleAdmin = Role::create([
            'name' => Role::ROLE_ADMIN
        ]);

        $roleEditor = Role::create([
            'name' => Role::ROLE_EDITOR
        ]);

        $roleRedator = Role::create([
            'name' => Role::ROLE_REDATOR
        ]);

        $permissionPublishPost = Permission::create([
            'name' => 'publish_post',
            'description' => 'Permissão para publicar posts que estão em rascunho.'
        ]);

        $permissionAccessCategories = Permission::create([
            'name' => 'access_categories',
            'description' => 'Permissão para acesso a área de categorias'
        ]);

        $permissionAccessTags = Permission::create([
            'name' => 'access_tags',
            'description' => 'Permissão para acesso a área de tags'
        ]);

        $permissionAccessUsers = Permission::create([
            'name' => 'access_users',
            'description' => 'Permissão para acesso a área de usuários'
        ]);

        $permissionAccessPosts = Permission::create([
            'name' => 'access_posts',
            'description' => 'Permissão para acesso a área de posts'
        ]);

        $roleEditor->permissions()->save($permissionPublishPost);
        $roleEditor->permissions()->save($permissionAccessPosts);

        $roleRedator->permissions()->save($permissionAccessPosts);
    }

    public function down()
    {

    }
}
