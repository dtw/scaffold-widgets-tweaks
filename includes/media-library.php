<?php


/*
1. Add FILTERS to the Media Library
*/

/* 1. Add FILTERS to the Media Library
------------------------------------------------------------------------------ */

function modify_post_mime_types( $post_mime_types ) {
 
$post_mime_types['application/pdf'] = array( 'PDFs', 'Manage PDFs', 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' );

$post_mime_types['application/msword'] = array( 'DOC', 'Manage DOCs' , 'DOC <span class="count">(%s)</span>', 'DOCs <span class="count">(%s)</span>' );

$post_mime_types['application/vnd.openxmlformats-officedocument.wordprocessingml.document'] = array( 'DOC X' , 'Manage DOCXs' , 'DOC X <span class="count">(%s)</span>', 'DOCX <span class="count">(%s)</span>' );

$post_mime_types['application/vnd.ms-excel'] = array( 'Excel' , 'Manage Excels' ,  'EXCEL <span class="count">(%s)</span>', 'EXCELs <span class="count">(%s)</span>' );

$post_mime_types['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'] = array( 'EXCEL X' , 'Manage XLSXs' , 'EXCEL X <span class="count">(%s)</span>', 'XLSXs <span class="count">(%s)</span>' );
 
$post_mime_types['application/vnd.ms-powerpoint'] = array( 'PowerPoint' , 'Manage PowerPoints' ,  'PowerPoint <span class="count">(%s)</span>', 'PowerPoints <span class="count">(%s)</span>' );
 
$post_mime_types['application/vnd.openxmlformats-officedocument.presentationml.presentation'] = array(  'PowerPoint X' , 'Manage PPTX' , 'PPTX <span class="count">(%s)</span>', 'PPTXs <span class="count">(%s)</span>' );

return $post_mime_types; 

}

add_filter( 'post_mime_types', 'modify_post_mime_types' );

?>