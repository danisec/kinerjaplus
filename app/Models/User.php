<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $guard_name = ['web', 'admin'];

    public function scopeFilter($query, array $filters)
    {  
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('fullname', 'like', '%'. $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
        );
    }

    public function getGroupKaryawanId()
    {
        $kodeAlternatif = $this->alternatif->kode_alternatif ?? null;

        if ($this->hasRole('kepala sekolah')) {
            return GroupKaryawan::where('kepala_sekolah', $kodeAlternatif)->value('id_group_karyawan');
        }

        if ($this->hasRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            return GroupKaryawanDetail::where('kode_alternatif', $kodeAlternatif)->value('id_group_karyawan');
        }

        return null;
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'fullname', 'nama_alternatif');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasDirectPermission($permission)
    {
        return $this->getDirectPermissions()->contains('name', $permission);
    }
}
