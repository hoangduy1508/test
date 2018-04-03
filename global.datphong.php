<?php
global $global_config,$db,$module_name, $module_info, $module_file, $lang_module, $client_info;


$query1 = "SELECT * FROM `giaphong` ORDER BY `giaphong`.`gia` ASC LIMIT 3";
		$result1 = $db->query( $query1 );

		while( $row1 = $result1->fetch() )
		{
			
   			 $phong_list[$row1["id"]] = $row1;
		}

$query2 = "SELECT * FROM `giaphong` ORDER BY `giaphong`.`gia` DESC LIMIT 4";
		$result2 = $db->query( $query2 );

		while( $row2 = $result2->fetch() )
		{
			
   			 $phong_list2[$row2["id"]] = $row2;
		}

$xtpl = new XTemplate( 'global.datphong.tpl', NV_ROOTDIR . '/themes/default/blocks' );
foreach ($phong_list as $value1)
{

    $xtpl->assign( "row1", $value1 );
    $xtpl->parse( "main.row1" );
}
foreach ($phong_list2 as $value2)
{

    $xtpl->assign( "row2", $value2 );
    $xtpl->parse( "main.row2" );
}
$xtpl->parse( 'main' );

$content = $xtpl->text( 'main' );

?>
