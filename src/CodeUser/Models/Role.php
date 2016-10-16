<?php

namespace CodePress\CodeUser\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class Role extends Model
{
    const ROLE_ADMIN = 'Admin';
    const ROLE_EDITOR = 'Editor';
    const ROLE_REDATOR = 'Redator';

    protected $table = 'codepress_roles';

    protected $fillable = ['name'];

    protected $validator;

    public function isValid()
    {
        $validator = $this->validator;

        $validator->setRules([
            'name' => 'required|max:255'
        ]);

        $validator->setData($this->getAttributes());

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'codepress_user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'codepress_permission_roles', 'role_id', 'permission_id');
    }
}
