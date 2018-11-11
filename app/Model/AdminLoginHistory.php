<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminLoginHistory extends Model
{
    protected $fillable = [
        'ip', 'platform', 'device', 'uuid', 'msg', 'status', 'admin_id', 'user_name'
    ];

    protected $hidden = [
        'platform', 'device', 'admin_id', 'updated_at', 'id', 'uuid'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }

    protected static function boot()
    {
        parent::boot();
        self::saved(function (self $loginHistory) {
            $loginHistory->admin()->update(['login_at' => $loginHistory->created_at]);
        });
    }
}
