<?php 

class Unit extends Elegant{
	public $table = 'unit';
        public $fillable = array('id','name');
	public function amphur(){
		return $this->belongsToMany('Province','province_id');
	}
	public function prakad()
	{
		return $this->hasMany('Prakad','amphur_id');

	}
	// public function scopePrakadby($query)
	// {
	// 	return $query->hasMany('Prakad', 'amphur_id');

	// }
}