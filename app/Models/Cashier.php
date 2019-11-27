<?php

namespace App\Models;

use App\Notifications\Cashier\CashierResetPasswordNotification;
use App\Notifications\Cashier\CashierVerifyEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;

class Cashier extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cashiers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'business_id',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new CashierResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification() {
        $this->notify(new CashierVerifyEmailNotification());
    }

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function outlet() {
        return $this->belongsTo(Outlet::class);  
    }

    public function stockHistory() {
        return $this->hasMany(StockHistory::class);  
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);  
    }
}
