<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProfessoresDisciplinas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "professores_disciplinas";
    protected $fillable = ['professor', 'disciplina'];
}
