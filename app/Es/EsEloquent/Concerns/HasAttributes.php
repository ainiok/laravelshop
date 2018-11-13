<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Date Time: 2018/11/13 19:23
 * Email:  job@ainiok.com
 */

namespace App\Es\EsEloquent\Concerns;

use DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait HasAttributes
{
    /**
     * ElasticSearch attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     *
     * 应该被转化为原生类型的属性.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    public function getAttribute($key)
    {
        if (!$key) return;
        if (array_key_exists($key, $this->attributes) ||
            $this->hasGetMutator($key)) {
            return $this->getAttributeValue($key);
        }
    }

    public function getAttributeValue($key)
    {
        $value = $this->getAttributeFromArray($key);
        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $value);
        }
        if ($this->hasCast($key)) {
            return $this->castAttribute($key, $value);
        }
        if (in_array($key, $this->getDates()) && !is_null($value)) {
            return $this->asDateTime($value);
        }

        return $value;
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param  string $key
     * @return mixed
     */
    protected function getAttributeFromArray($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        switch ($this->getCastType($key)) {
            case 'int':
            case 'integer':
                return (int)$value;
            case 'real':
            case 'float':
            case 'double':
                return (float)$value;
            case 'string':
                return (string)$value;
            case 'bool':
            case 'boolean':
                return (bool)$value;
            case 'object':
                return $this->fromJson($value, true);
            case 'array':
            case 'json':
                return $this->fromJson($value);
            case 'collection':
                return new BaseCollection($this->fromJson($value));
            case 'date':
                return $this->asDate($value);
            case 'datetime':
                return $this->asDateTime($value);
            case 'timestamp':
                return $this->asTimestamp($value);
            default:
                return $value;
        }
    }

    /**
     * Get the type of cast for a model attribute.
     *
     * @param  string $key
     * @return string
     */
    protected function getCastType($key)
    {
        return trim(strtolower($this->getCasts()[$key]));
    }

    /**
     * 设置当前模型的属性值
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if ($this->hasSetMutator($key)) {
            $method = 'set' . Str::studly($key) . 'Attribute';
            return $this->{$method}($value);
        }
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param  string $key
     * @return bool
     */
    public function hasSetMutator($key)
    {
        return method_exists($this, 'set' . Str::studly($key) . 'Attribute');
    }

    public function hasGetMutator($key)
    {
        return method_exists($this, 'get', Str::studly($key) . 'Attribute');
    }

    /**
     * Decode the given JSON back into an array or object.
     *
     * @param  string $value
     * @param  bool $asObject
     * @return mixed
     */
    public function fromJson($value, $asObject = false)
    {
        return json_decode($value, !$asObject);
    }

    /**
     * Return a timestamp as DateTime object with time set to 00:00:00.
     *
     * @param  mixed $value
     * @return \Illuminate\Support\Carbon
     */
    protected function asDate($value)
    {
        return $this->asDateTime($value)->startOfDay();
    }

    /**
     * Return a timestamp as DateTime object.
     *
     * @param  mixed $value
     * @return \Illuminate\Support\Carbon
     */
    protected function asDateTime($value)
    {
        if ($value instanceof Carbon) {
            return $value;
        }

        if ($value instanceof DateTimeInterface) {
            return new Carbon(
                $value->format('Y-m-d H:i:s.u'), $value->getTimezone()
            );
        }

        if (is_numeric($value)) {
            return Carbon::createFromTimestamp($value);
        }

        if ($this->isStandardDateFormat($value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
        }

        return Carbon::createFromFormat(
            str_replace('.v', '.u', $this->getDateFormat()), $value
        );
    }

    /**
     * Determine if the given value is a standard date format.
     *
     * @param  string $value
     * @return bool
     */
    protected function isStandardDateFormat($value)
    {
        return preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $value);
    }

    protected function mutateAttribute($key, $value)
    {
        return $this->{'get' . Str::studly($key) . 'Attribute'}($value);
    }

    protected function getDateFormat()
    {
        return $this->dateFormat ?: 'Y-m-d H:i:s';
    }

    public function hasCast($key, $types = null)
    {
        if (array_key_exists($key, $this->getCasts())) {
            return $types ? in_array($this->getCastType($key), (array)$types, true) : true;
        }
    }

    public function getCasts()
    {
        return $this->casts;
    }
}