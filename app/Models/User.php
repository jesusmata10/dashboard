<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /*public function perfiles()
    {
        return $this->hasOne(Personas::class);
    }*/
    // protected $guard_name = 'web';
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function scopeEmail($query, $email)
    {

        if ($email)
            return $query->where('email', 'LIKE', "%$email%");
    }

    public function scoperol($query, $rol)
    {

        if ($rol)
            return $query->where('rol', 'LIKE', "%$rol%");
    }

    public function modelhasroles()
    {
        return $this->hasOne(ModelhasRoles::class);
    }

    public static function userRol()
    {
        return DB::table('roles as r')->select('r.id', 'r.name')
            ->join('model_has_roles as mhr', 'mhr.role_id', 'r.id')
            ->orderBy('name')->distinct()->get();
    }

    public static function consulta1()
    {
        return DB::table('users')
            ->select(DB::raw('row_number() OVER (ORDER BY name) as numero'), 'id', 'name', 'email')
            ->get();
    }

    public static function consulta($request)
    {

        $data = User::with(['roles', 'personas'])->email($request->email)->rol($request->rol);
        //$data = User::with(['role', 'personas'])->paginate(10);
        //dd($data);
        //$users = $data->paginate(10);
        return $data;

        //dd($data[2]->personas->carnet);

        //$data = Personas::with(['user']);

        /*$data = DB::table('users as u')
            ->select(
                DB::raw('row_number() OVER (ORDER BY p.cedula) as num'),
                'u.id',
                'u.email',
                'p.primer_nombre',
                'p.segundo_nombre',
                'p.primer_apellido',
                'p.segundo_apellido',
                'p.cedula',
                'p.celular',
                'r.name as rol',
            )
            ->leftJoin('personas as p', 'p.user_id', 'u.id')
            ->join('model_has_roles as mhr', 'mhr.model_id', 'u.id')
            ->join('roles as r', 'r.id', 'mhr.role_id');
            //->where('u.id', '=', $search);

            dd($data->get());*/
        /*
        if ($search->cedula != null) {
            $data->where('p.cedula', $search->cedula);
        }
        if ($search->primer_nombre != null) {
            $data->where('p.primer_nombre', $search->primer_nombre);
        }

        if ($search->segundo_nombre != null) {
            $data->where('p.segundo_nombre', $search->segundo_nombre);
        }

        if ($search->primer_apellido != null) {
            $data->where('p.primer_apellido', $search->primer_apellido);
        }

        if ($search->segundo_apellido != null) {
            $data->where('p.segundo_apellido', $search->segundo_apellido);
        }
*/
    }

    public function personas()
    {
        return $this->hasOne(Personas::class)->orderBy('cedula', 'ASC');
    }

    /*public static function sqlReport($search)
    {
        $datatable = DB::table('users as u')
            ->select(
                DB::raw('row_number() OVER (ORDER BY u.cedula) as num'),

            )
            ->join('personas as p', 'p.id', 'u.id')
            ->join('entidades as e', 'e.id', 'd.estado_id')
            ->join('ciudades as ciu', 'ciu.id', 'd.ciudad_id')
            ->join('municipios as m', 'm.id', 'd.municipio_id')
            ->join('parroquias as pa', 'pa.id', 'd.parroquia_id')
            ->join('tzonas as tz', 'tz.id', 'd.tzona')
            ->join('tcalles as t', 't.id', 'd.tcalle')
            ->join('tviviendas as tv', 'tv.id', 'd.tvivienda')
            ->where('p.personas_id', '=', 0);

        if ($search->cedula != null) {
            $datatable->where('p.cedula', $search->cedula);
        }

        if ($search->primer_nombre != null) {
            $datatable->where('p.primer_nombre', $search->primer_nombre);
        }

        if ($search->segundo_nombre != null) {
            $datatable->where('p.segundo_nombre', $search->segundo_nombre);
        }

        if ($search->primer_apellido != null) {
            $datatable->where('p.primer_apellido', $search->primer_apellido);
        }

        if ($search->segundo_apellido != null) {
            $datatable->where('p.segundo_apellido', $search->segundo_apellido);
        }

        return $datatable->orderBy('p.cedula')->distinct();
    }*/
}
