<?php

namespace CodePress\CodeUser\Tests\Repository;

use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Models\Permission;
use CodePress\CodeUser\Models\Role;
use CodePress\CodeUser\Models\User;
use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use CodePress\CodeUser\Repository\UserRepositoryEloquent;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use CodePress\CodeUser\Tests\AbstractMailTestCase;
use Illuminate\Support\Facades\Hash;

class AuthorizationTest extends AbstractMailTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_can_create_user()
    {
        $user = $this->createUser();

        $this->assertEquals('Teste', $user->name);
        $this->assertEquals('teste@teste.com', $user->email);
        $this->assertTrue(Hash::check('123456', $user->password));
    }

    public function test_can_create_role()
    {
        $this->createUser();
        $this->createRoles();

        $this->assertCount(3, $this->app->make(RoleRepositoryInterface::class)->all());
        $this->app->make(UserRepositoryInterface::class)->addRoles(1, [1,2,3]);

        $this->assertCount(3, User::find(1)->roles);
        $this->assertCount(1, Role::find(1)->users);
        $this->assertTrue(User::find(1)->isAdmin());

    }

    public function test_can_create_permission()
    {
        $this->createRoles();
        $this->createPermissions();

        $this->assertCount(3, $this->app->make(PermissionRepositoryInterface::class)->all());

        $this->app->make(RoleRepositoryInterface::class)->addPermissions(1, [1,2]);
        $this->app->make(RoleRepositoryInterface::class)->addPermissions(2, [1]);
        $this->app->make(RoleRepositoryInterface::class)->addPermissions(3, [1,2,3]);

        $this->assertCount(1, Role::find(2)->permissions);
        $this->assertCount(2, Role::find(1)->permissions);
        $this->assertCount(3, Role::find(3)->permissions);
        //$this->assertCount(3, Permission::find(1)->roles);

    }

    private function createUser()
    {
        $this->expectsEvents(UserCreatedEvent::class);

        $user = $this->app->make(UserRepositoryInterface::class)->create([
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => '123456'
        ]);

        return $user;
    }

    private function createRoles()
    {
        $this->app->make(RoleRepositoryInterface::class)->create([
            'name' => 'Admin'
        ]);

        $this->app->make(RoleRepositoryInterface::class)->create([
            'name' => 'Editor'
        ]);

        $this->app->make(RoleRepositoryInterface::class)->create([
            'name' => 'Redator'
        ]);
    }

    private function createPermissions()
    {
        $this->app->make(PermissionRepositoryInterface::class)->create([
            'name' => 'insert'
        ]);

        $this->app->make(PermissionRepositoryInterface::class)->create([
            'name' => 'update'
        ]);

        $this->app->make(PermissionRepositoryInterface::class)->create([
            'name' => 'remove'
        ]);
    }
}