<?php

namespace Blit\Domains\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Domain extends Model {

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function($model) {
            $model->slug = Str::slug($model->name);
        });

        static::deleted(function($model) {
            $model->permissions()->delete();
        });

        static::created(function($model) {

            $perms = [
                $model->slug . '.index',
                $model->slug . '.create',
                $model->slug . '.edit',
                $model->slug . '.delete',
            ];

            foreach($perms as $perm)
            {
                Permission::firstOrCreate([
                    'domain_id' => $model->id,
                    'name' => $perm,
                    'description' => ''
                ]);
            }

        });

        static::updated(function($model) {

            $perms = [
                $model->slug . '.index',
                $model->slug . '.create',
                $model->slug . '.edit',
                $model->slug . '.delete',
            ];

            Permission::where('domain_id',$model->id)->delete();

            foreach($perms as $perm)
            {
                Permission::firstOrCreate([
                    'domain_id' => $model->id,
                    'name' => $perm,
                    'description' => ''
                ]);
            }

        });

    }

    protected $fillable = [
      'slug','name','active'
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

}