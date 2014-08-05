<?php

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('หน้าแรก', route('home'));
});

Breadcrumbs::register('province', function($breadcrumbs,$name) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($name, url("ประกาศใน/'$name"));
});
Breadcrumbs::register('amphur', function($breadcrumbs,$province,$amphur) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($province, url("ประกาศใน/'$province"));
     $breadcrumbs->push($amphur, url("ประกาศใน/'$amphur"));
});
Breadcrumbs::register('maincat', function($breadcrumbs,$maincat) {
     $breadcrumbs->parent('home');    
    $breadcrumbs->push($maincat, route('หมวดหมู่หลัก',array('title'=>$maincat)));


});

Breadcrumbs::register('innercat', function($breadcrumbs,$maincat, $subcat) {
    $breadcrumbs->parent('home');    
    $breadcrumbs->push($maincat, route('หมวดหมู่หลัก',array('title'=>$maincat)));
    $breadcrumbs->push($subcat, route('หมวดหมู่รอง',array('title'=>$maincat,'subcat'=>$subcat   
        )));
});

