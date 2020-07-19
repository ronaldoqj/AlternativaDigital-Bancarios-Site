<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Support\Str;
use App\Models\File as SelfFile;

class File extends Model
{
    protected $table = 'files';

}
