<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = "news";


    public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

}
