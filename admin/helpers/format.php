<?php
class Format{

public function formDate($date){
	
	return date('F j,Y,g:i a',strtotime($date));
	
}


public function textShorten($text,$limit=1000){

  $text = $text." ";
  $text = substr($text,0,$limit);
  $text = substr($text,0,strrpos($text,' '));
  $text = $text.".....";
  return $text;
}

public function textShort($text,$limit=200){

  $text = $text." ";
  $text = substr($text,0,$limit);
  $text = substr($text,0,strrpos($text,' '));
  $text = $text.".....";
  return $text;
}

public function validation($data){
   $data =trim($data);
   $data =stripcslashes($data);
   $data =htmlspecialchars($data);
   return $data;
}

}
?>