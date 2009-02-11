<?
/***************************************************************************
					clients.php
					------------
	product			: TypicalInvoice Professional
	version			: 1.0 build 1 (Beta)
	released		: Sunday September 7 2003
	copyright		: Copyright � 2001-2003 Jeremy Hubert
	email			: support@typicalgeek.com
	website			: http://www.typicalgeek.com

    Lists the current clients in the database. DO NOT EDIT unless you know
    what you are doing.

***************************************************************************/

define('SITE_ROOT','../');
require_once(SITE_ROOT . 'includes/common.php');

securePage('admin');

$message = '';

if ( isset($_GET['del']) && isset($_GET['id']) )
{
    $ISL->DeleteClient($_GET['id']);

    logItem($_SESSION['ses_client_id'],$_GET['id'],2,8);

    $message = "<b>Sub User deleted</b><br><br>";
}

$tpl = & new TemplateSystem();

$tpl->set('page_title','Sub Users');

$tpl->set('clients',$ISL->FetchClients('staff'));
$tpl->set('message',$message);

$tpl->set('tbody','admin/subusers.tpl');

$tpl->display();
exit;

?>