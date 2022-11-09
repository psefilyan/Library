<?php

namespace App\Models;
use \App\Models\Traits\AuthorRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    use AuthorRelationships;
    protected $fillable = ['name','surname','book_id'];
}
