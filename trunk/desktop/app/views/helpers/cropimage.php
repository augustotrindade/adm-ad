<?php  
class CropimageHelper extends Helper { 
    var $helpers = array('Html', 'Javascript', 'Form'); 

    function createJavaScript($imgW, $imgH, $thumbW, $thumbH) { 
    	return  $this->output("<script type=\"text/javascript\">
	    	(function($) {
				$(function(){
					var jcrop_api;
					var bounds, boundx, boundy;
					$('#thumbnail').Jcrop({
						onChange: showPreview,
						onSelect: showPreview,
						aspectRatio: 1
					},function(){
						jcrop_api = this;
						bounds = jcrop_api.getBounds();
						boundx = bounds[0];
						boundy = bounds[1];
					});
					function showPreview(coords)
					{
						if (parseInt(coords.w) > 0)
						{
							var rx = $thumbW / coords.w;
							var ry = $thumbH / coords.h;
	
							$('#preview').css({
								width: Math.round(rx * $imgW) + 'px',
								height: Math.round(ry * $imgH) + 'px',
								marginLeft: '-' + Math.round(rx * coords.x) + 'px',
								marginTop: '-' + Math.round(ry * coords.y) + 'px'
							});
						}
						jQuery('#x1').val(coords.x);
						jQuery('#y1').val(coords.y);
						jQuery('#x2').val(coords.x2);
						jQuery('#y2').val(coords.y2);
						jQuery('#w').val(coords.w);
						jQuery('#h').val(coords.h);
					};
	
				});
	
			}(jQuery));
    	</script>");
    } 

    function createForm($imagePath, $tH, $tW){ 
        $x1 =     $this->Form->hidden('x1', array("value" => "", "id"=>"x1")); 
        $y1 =     $this->Form->hidden('y1', array("value" => "", "id"=>"y1")); 
        $x2 =     $this->Form->hidden('x2', array("value" => "", "id"=>"x2",)); 
        $y2 =     $this->Form->hidden('y2', array("value" => "", "id"=>"y2")); 
        $w  =     $this->Form->hidden('w',  array("value" => "", "id"=>"w")); 
        $h  =     $this->Form->hidden('h',  array("value" => "", "id"=>"h")); 
        $imgP =   $this->Form->hidden('imagePath', array("value" => $imagePath)); 
        $imgTum = $this->Html->image($imagePath, array('style'=>'float: left; margin-right: 10px;', 'id'=>'thumbnail', 'alt'=>'Create Thumbnail')); 
        $imgTumPrev = $this->Html->image($imagePath, array('style'=>'position: relative;', 'id'=>'preview', 'alt'=>'Thumbnail Preview')); 
        
        return $this->output("
        	<table>
        		<tr>
        			<td>$imgTum</td>
        			<td> 
        				<div style=\"width:".$tW."px;height:".$tH."px;overflow:hidden;\">
			                $imgTumPrev 
			            </div> 
		            </td>
            	</tr>
            </table>
            <br style=\"clear:both;\"/>$x1 $y1 $x2 $y2 $w $h $imgP"); 
    }  
} 
?>