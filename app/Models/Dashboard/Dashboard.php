<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['faskes','value', 'status'];
}
