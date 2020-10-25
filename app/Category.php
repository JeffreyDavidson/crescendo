<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $categoriesWithARange = ['hand-bells'];

    public function hasARange()
    {
        return collect($this->categoriesWithARange)->contains($this->slug);
    }
}
