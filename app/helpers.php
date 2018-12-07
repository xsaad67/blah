<?php
	
if(!function_exists('getUniqueSlug')){

	function getUniqueSlug(\Illuminate\Database\Eloquent\Model $model, $value)
	{
		$slug = \Illuminate\Support\Str::slug($value);
		$slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

		return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
	
}

if(!function_exists('unicodeSlug')){

	function unicodeSlug($string, $separator = '-') {
	    $re = "/(\\s|\\".$separator.")+/mu";
	    $str = @trim($string);
	    $subst = $separator;
	    $result = preg_replace($re, $subst, $str);
	    return $result;
	}

}



if(!function_exists('wordToMinutes')){

	function wordToMinutes($content){
	 $words = str_word_count(strip_tags($content));
	 return round(($words/130),0,PHP_ROUND_HALF_DOWN);
	}
	
}


if(!function_exists('mediaUploadedPath')){

	function mediaUploadedPath(){	
			$year_folder=date('y');
		   	$month_folder=date('m');
		   	$path=public_path('/wp-content/uploads/'.$year_folder);

		   	if(\File::exists($path."/".$month_folder)){
		   		return $path."/".$month_folder;
		   	}

		    if(!\File::exists($path)){
		      \File::makeDirectory($path, $mode = 0777, true, true);   
		        if(!\File::exists($path."/".$month_folder)){
		       \File::makeDirectory($path."/".$month_folder, $mode = 0777, true, true);   
		       return $path."/".$month_folder;
		      }

		    }else{

		      if(!\File::exists($path."/".$month_folder)){
		       \File::makeDirectory($path."/".$month_folder, $mode = 0777, true, true);   
		       return $path."/".$month_folder;
		      }
		    }
	}

}


if(!function_exists('trucnateStringh')){
		function trucnateStringh($text, $length=200, $last_string='...') {
		   $length = abs((int)$length);
		   if(strlen($text) > $length) {
		      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1'.$last_string, $text);
		   }
		   return(strip_tags($text));
		}
}


if(!function_exists('noLinkUrls')){

	function noLinkUrls($str,$status = 0){

		$dom = new DOMDocument();

		$dom->preserveWhitespace = FALSE;

		$dom->loadHTML($str);

		$a = $dom->getElementsByTagName('a');

		$host = strtok($_SERVER['HTTP_HOST'], ':');

		foreach($a as $anchor) {
		        $href = $anchor->attributes->getNamedItem('href')->nodeValue;

		        if (preg_match('/^https?:\/\/' . preg_quote($host, '/') . '/', $href) || $status ==1) {
		           continue;
		        }

		        $noFollowRel = 'nofollow';
		        $oldRelAtt = $anchor->attributes->getNamedItem('rel');

		        if ($oldRelAtt == NULL) {
		            $newRel = $noFollowRel;
		        } else {
		            $oldRel = $oldRelAtt->nodeValue;
		            $oldRel = explode(' ', $oldRel);
		            if (in_array($noFollowRel, $oldRel)) {
		                continue;
		            }
		            $oldRel[] = $noFollowRel;
		            $newRel = implode($oldRel,  ' ');
		        }

		        $newRelAtt = $dom->createAttribute('rel');
		        $noFollowNode = $dom->createTextNode($newRel);
		        $newRelAtt->appendChild($noFollowNode);
		        $anchor->appendChild($newRelAtt);

		}
		 $dom->loadHTML($str, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		
		return $dom->saveHTML();
	}	
}

if(!function_exists('remove_useless')){
	function remove_useless($body){
		return str_ireplace(array("\r","\n",'\r','\n'),'', $body);
	}
}

if(!function_exists('extract_desc')){
	function extract_desc($string){
		return substr($string, strpos($string, "<p"), strpos($string, "</p>")+4);
	}
}

function dom_content($string){
		$firstParagraph = "";
		libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($string);
        $xp = new DOMXPath($dom);
        $res = $xp->query('//p'); 
		if($res->length > 0){
			$firstParagraph = $res[0]->nodeValue;
		}
        return $firstParagraph;
}

?>