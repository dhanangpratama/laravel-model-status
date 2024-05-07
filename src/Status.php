<?php

namespace Spatie\ModelStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Status extends Model
{
    protected $guarded = [];

    protected $table = 'statuses';

    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string)Str::orderedUuid();
        });
    }

    public function getIncrementing(): bool {
        return false;
    }

    public function getKeyType(): string {
        return 'string';
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
