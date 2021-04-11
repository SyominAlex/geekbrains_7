<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

	/**
	 * @var string
	 */
	protected $table = "categories";

	protected $fillable = [
		'title', 'description', 'is_visible'
	];

	protected $casts = [
		'is_visible' => 'boolean'
	];


	public function news(): HasMany
	{
		return $this->hasMany(News::class, 'category_id', 'id');
	}
}
