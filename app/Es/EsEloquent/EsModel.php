<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Date Time: 2018/11/12 11:15
 * Email:  job@ainiok.com
 */

namespace App\Es\EsEloquent;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

abstract class EsModel implements Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    use Concerns\HasAttributes;
    /**
     * ElasticSearch 索引
     * @var string
     */
    public $_index;
    /**
     * ElasticSearch 类型
     * @var string
     */
    public $_type;
    /**
     * Indicates if the ElasticSearch should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array
     */
    protected $visible = [];


}