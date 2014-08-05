<?php

class CategoriesSeeder extends Seeder {

public function slug($title){
	$url = trim($title);

		$url = str_replace(' ','-',$url);

		$url = preg_replace("[^a-zA-Z_0-9ก-๙]","",$url);
		return $url;
}
	public function run()
	{
   $data = array(
   	"กล้อง อุปกรณ์ถ่ายภาพ",
   	"การศึกษา",
   	"กีฬา",
   	"เกมส์ ของเล่น"
   	,"ของสะสม ของเก่า อดิเรก",
   	"คอมพิวเตอร์",
   	"เครื่องใช้ไฟฟ้า",
   	"เครื่องดนตรี",
   	"ต้นไม้ สัตว์เลี้ยง ",
   	"บัตร ตั๋ว ",
   	"ท่องเที่ยว ทัวร์ ที่พัก",
   	"ธุรกิจ งาน",
   	"นาฬิกา จิวเวลลี่ เครื่องประดับ",
   	"บันเทิง เพลง ดนตรี",
   	"เฟอร์นิเจอร์","แฟชั่น เสื้อผ้า",
   	"มือถือ อุปกรณ์สื่อสาร",
   	'แม่และเด็ก'
   	,'รถ ยานพาหนะ',
   	"ศิลปะ หัตถกรรม ของที่ระลึก"
   	,"เสริมสวย สุขภาพ"
   	,"หนังสือ"
   	," อสังหาริมทรัพย์",
   	"อาหาร",
   	" อุตสาหกรรม เครื่องจักร ",
   	"อุปกรณ์สำนักงาน",
   	"อื่นๆ");
	   
		$date = new DateTime;
		foreach ($data as $key => $value) {
			$category[$key] = array(
			'name'      =>  $value,
			'url'=>  $this->slug($value),
			'created_at' => $date->modify('-10 day'),
			'updated_at' => $date->modify('-3 day'),
			'user_id' => 1,
			'deleted_at' => NULL,
		);
		}
		



		// Delete all the blog posts
		DB::table('categories')->truncate();

		// Insert the blog posts
		Category::insert($category);
	}

}
	
