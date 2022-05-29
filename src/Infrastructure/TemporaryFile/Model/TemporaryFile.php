<?php
declare(strict_types = 1);

namespace Infrastructure\TemporaryFile\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryFile extends Model
{
    use HasFactory;

    protected $fillable = ['folder', 'filename'];
}
