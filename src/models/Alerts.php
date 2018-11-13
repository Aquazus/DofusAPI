<?php

namespace dofus\models;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model {

    protected $table = 'alerts';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'ignore_versions', 'title', 'content', 'cmntt'];
    public $timestamps = true;

}
