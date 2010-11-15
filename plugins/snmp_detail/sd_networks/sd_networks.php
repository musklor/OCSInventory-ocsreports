<?php
/*
 * 
 * Show sd_networks data
 * 
 */

print_item_header($l->g(82));
	if (!isset($protectedPost['SHOW']))
		$protectedPost['SHOW'] = 'NOSHOW';
	$table_name="sd_networks";
	$list_fields=array($l->g(53)=>'DESCRIPTION',
					   $l->g(66) => 'TYPE',
					   'TYPEMIB'=>'TYPEMIB',
					   'SPEED'=>'SPEED',
					   'MACADDR'=>'MACADDR',
					   'STATUS'=>'STATUS',
					   'IPADDRESS'=>'IPADDRESS',
					   'IPMASK'=>'IPMASK',
					   'IPGATEWAY'=>'IPGATEWAY',
					   'IPSUBNET'=>'IPSUBNET',
					   'IPDHCP'=>'IPDHCP',
					   'DRIVER'=>'DRIVER',
					   'VIRTUALDEV'=>'VIRTUALDEV',
					   'DEVICEID'=>'DEVICEID');
	//$list_fields['SUP']= 'ID';
	$sql=prepare_sql_tab($list_fields);
	//$list_fields["PERCENT_BAR"] = 'CAPACITY';
	$list_col_cant_del=$list_fields;
	$default_fields= $list_fields;
	$sql['SQL']  = $sql['SQL']." FROM %s WHERE (snmp_id=%s)";
	$sql['ARG'][]='snmp_networks';
	$sql['ARG'][]=$systemid;
	$tab_options['ARG_SQL']=$sql['ARG'];
	tab_req($table_name,$list_fields,$default_fields,$list_col_cant_del,$sql['SQL'],$form_name,80,$tab_options);


?>