<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the section that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id')->select('id','name');
    }

    /**
     * Get the parentcategory that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentcategory()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id')->select('id','category_name');
    }

    /**
     * Get all of the subcategories for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->where('status',1);
    }
}
