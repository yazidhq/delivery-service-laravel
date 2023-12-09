<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\TitikAntar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titikantar_id',
        'kategori_id',
        'nomor_resi',
        'nama_barang',
        'deskripsi',
        'berat_kg',
        'lebar_cm',
        'panjang_cm',
        'tinggi_cm',
        'nama_pengirim',
        'nomor_penerima',
        'lokasi_penerima',
        'tanggal_pengiriman',
        'status_pengiriman',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function titikantar(): BelongsTo
    {
        return $this->belongsTo(TitikAntar::class, 'titikantar_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
