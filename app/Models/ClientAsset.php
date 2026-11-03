<?php

namespace App\Models;

use Database\Factories\ClientAssetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientAsset extends Model
{
    /** @use HasFactory<ClientAssetFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'file_path',
        'file_type',
        'alt',
        'sort_order',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/'.$this->file_path);
    }
}
