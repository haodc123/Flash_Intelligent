<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email', 'user_pass'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_pass', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role) {
        // foreach (UserRole::RolesArr as $key=>$value) {
        //     if ($role == $key)
        //         return true;
        // }
        // return false;
        if ($this->role == $role)
            return true;
        return false;
    }

    public function username() {
        return 'user_email';
    }

    public function getAuthPassword() {
        return $this->user_pass;
    }

    /**
     * Insert or Update user
     * Return id
     */
    public function save_user() {
        if ($this->user_email && !empty($this->user_email)) { // Update
            return $this->update_user();
        }
        // Insert
        $this->save();
        return $this->id;
    }

    public function update_user() { 
        self::where('user_email', $this->user_email)
            ->update([
                'user_name'=>$this->user_name,
                'user_tel'=>$this->user_tel,
                'user_addr'=>$this->user_addr
        ]);
        return self::where('user_email', $this->user_email)->first()->id;
    }

    public function update_user_addr() {
        return self::where('id', $this->id)->update([
            'user_addr' => $this->user_addr
        ]);
    }

    public function delete_user() {
        return self::destroy($this->id);
    }

    public function getAllUsersPagination() {
        return self::paginate(\Config::get('constants.general.per_page'));
    }
}
