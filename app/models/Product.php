<?php

class Product extends Elegant{
    public $table = 'product';
   public $fillable = array('status','categorie_id','prakad_id','package');
    public function unit(){
        return $this->belongsTo('Unit','unit_id');
    }
    public function user(){
        return $this->belongsTo('User','user_id');
    }
  }
