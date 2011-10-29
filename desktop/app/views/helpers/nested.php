<?php
class NestedHelper extends AppHelper {
	
	function getCategories($key, $categories, &$mainList) {
		$result = '<ul>';
		if(is_array($categories)){
			foreach ( $categories as $catKey => $name ) {
				$result .= $this->getCategory ( $catKey, $name, $mainList );
			}
		}
		$result .= '</ul>';
		return $result;
	}
	
	function getCategory($key, $value, &$mainList) {
		$result = '<li class="home">';
		$result .= $value;
		if (array_key_exists ( $key, $mainList )) {
			$result .= "<a href='#'>".$this->getCategories ( $key, $mainList [$key], $mainList )."</a>";
		}
		$result .= '</li>';
		return $result;
	}
}
?>