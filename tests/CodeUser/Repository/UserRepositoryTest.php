<?php

namespace CodePress\CodeUser\Tests\Repository;

use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use CodePress\CodeUser\Repository\UserRepositoryEloquent;
use CodePress\CodeUser\Tests\AbstractTestCase;
use Illuminate\Support\Facades\Hash;
use Mockery as m;

class UserRepositoryTest extends AbstractTestCase
{
    /**
     * @var UserRepositoryEloquent
     */
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $roleRepositoryMock = m::mock(RoleRepositoryInterface::class);
        $this->repository = new UserRepositoryEloquent($roleRepositoryMock);
    }

    public function test_can_create_user()
    {
        $this->expectsEvents(UserCreatedEvent::class);

        $user = $this->repository->create([
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => '123456'
        ]);

        $this->assertEquals('Teste', $user->name);
        $this->assertEquals('teste@teste.com', $user->email);
        $this->assertTrue(Hash::check('123456', $user->password));
    }
}