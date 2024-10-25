<?php

namespace App\Models;

use App\Enums\LogLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Auth\app\Http\Enums\ActionEnum;

abstract class BaseModel extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @throws \Exception
     */
    public function service()
    {
        $class_name = str_replace('Models', 'Services', static::class).'Service';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }

    /**
     * @throws \Exception
     */
    public function repository()
    {
        $class_name = str_replace('Models', 'Repositories', static::class).'Repository';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    public function logging(LogLevelEnum $level, ?string $message = '', ?array $context = []): void
    {
        $this->logs()->create([
            'level_id' => $level->value,
            'message' => $message,
            'context' => $context,
        ]);
    }

    protected static function newFactory()
    {
        $class_name = str_starts_with(static::class,'Modules') ?
            str_replace('app\Models', 'database\factories', static::class).'Factory':
            str_replace('App\Models', 'Database\Factories', static::class).'Factory';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return $class_name::new();
    }
}
