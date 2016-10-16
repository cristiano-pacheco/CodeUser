<?php

namespace CodePress\CodeUser\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class Permission extends Model
{
    protected $table = 'codepress_permissions';

    protected $fillable = ['name', 'description'];

    protected $validator;

    public function isValid()
    {
        $validator = $this->validator;

        $validator->setRules([
            'name' => 'required|max:255',
            'description' => 'required',
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

    public function roles()
    {
        return $this->belongsToMany(User::class, 'codepress_permission_roles', 'permission_id', 'role_id');
    }
}
