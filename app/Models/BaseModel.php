<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if($model->columnExists('uuid')){
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        $query = $this->where(DB::raw('cast(id as char)'), $value);

        if ($this->columnExists('uuid')) {
            $query->orWhere('uuid', $value);
        }
        if ($this->columnExists('slug')) {
            $query->orWhere('slug', $value);
        }
        return $query->first() ?? abort(404);
    }

    private function columnExists(string $columnName)
    {
        $schema = $this->getConnection()->getSchemaBuilder();
        $table = $this->getTable();
        return ($schema->hasColumn($table, $columnName)) ?  true : false;
    }
}
