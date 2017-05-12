<?php 
namespace App;
use Illuminate\Database\Eloquent\Model; 
class Student  extends Model 
{
	protected $primaryKey = 'student_id';
	public $incrementing = false;
	public $timestamps = false;
	protected  $table = 'student';
	protected $fillable = array('Name', 'Email', 'Age','ContactNo','Address');
	
}