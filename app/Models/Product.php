<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'price_usd' => 'float',
        'price_clp' => 'integer',
        'original_price_usd' => 'float',
        'original_price_clp' => 'integer',
        'features' => 'array',
        'requirements' => 'array',
        'gallery' => 'array',
        'faqs' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getFormattedPriceUsdAttribute(): string
    {
        return '$' . number_format($this->price_usd, 0) . ' USD';
    }

    public function getFormattedPriceClpAttribute(): string
    {
        return '$' . number_format($this->price_clp, 0, ',', '.') . ' CLP';
    }

    public function getFormattedOriginalPriceUsdAttribute(): ?string
    {
        return $this->original_price_usd ? '$' . number_format($this->original_price_usd, 0) . ' USD' : null;
    }

    public function getFormattedOriginalPriceClpAttribute(): ?string
    {
        return $this->original_price_clp ? '$' . number_format($this->original_price_clp, 0, ',', '.') . ' CLP' : null;
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if ($this->original_price_usd && $this->original_price_usd > $this->price_usd) {
            return (int) round((($this->original_price_usd - $this->price_usd) / $this->original_price_usd) * 100);
        }
        return null;
    }
}
