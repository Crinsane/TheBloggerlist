<?php

namespace App\Companies;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname',
        'name', 'website', 'avatar', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['user'];

    /**
     * A company belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->where('type', 'company');
    }

    /**
     * Accessor for the username
     *
     * @return string
     */
    public function getUsernameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}
