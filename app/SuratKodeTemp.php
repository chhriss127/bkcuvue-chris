<?php
namespace App;

use illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\Dataviewer;
use Spatie\Activitylog\Traits\LogsActivity;

class SuratKodeTemp extends Model {
    
    use Dataviewer, LogsActivity, SoftDeletes;

    protected $table = 'surat_kode_temp';
    protected $dates = ['deleted_at'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    
    public static $rules = [
        'kode' => 'required',
    ];

    protected $fillable = ['id_surat_kode','id_user','id_surat','kode'];

    protected $allowedFilters = [
        'id','id_surat_kode','id_user','id_surat','kode','created_at','updated_at',
    ];

    protected $orderable = [
        'id','id_surat_kode','id_user','id_surat','kode','created_at','updated_at'
    ];

    public function surat()
    {
        return $this->belongsTo('App\Surat','id_surat','id')->select('id','kode');
    }
}