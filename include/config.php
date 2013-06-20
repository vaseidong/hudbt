<?php
# IMPORTANT: Do not edit below unless you know what you are doing!
if(!defined('IN_TRACKER'))
die('Hacking attempt!');

$CONFIGURATIONS = array('ACCOUNT', 'ADVERTISEMENT', 'ATTACHMENT', 'AUTHORITY', 'BASIC', 'BONUS', 'CODE', 'MAIN', 'SECURITY', 'SMTP', 'TORRENT', 'TWEAK', 'SNS');
function ReadConfig ($configname = NULL) {
	global $CONFIGURATIONS;
	if ($configname) {
		$configname = basename($configname);
		$tmp = oldReadConfig($configname);
		WriteConfig($configname, $tmp);
		@unlink('./config/'.$configname);
		return $tmp;
	} else {
		foreach ($CONFIGURATIONS as $CONFIGURATION) {
			$GLOBALS[$CONFIGURATION] = ReadConfig($CONFIGURATION);
		}
	}
}

function oldReadConfig ($configname) {
	if (strstr($configname, ',')) {
		$configlist = explode(',', $configname);
		foreach ($configlist as $key=>$configname) {
			ReadConfig(trim($configname));
		}
	} else {
		$configname = basename($configname);
		$path = './config/'.$configname;
		if (!file_exists($path)) {
				die("Error! File <b>".htmlspecialchars($configname)."</b> doesn't exist!</font><br /><font color=blue>Before the setup starts, please ensure that you have properly configured file and directory access permissions. Please see below.</font><br /><br />chmod 777 config/<br />chmod 777 config/".$configname);
		}

		$fp = fopen($path, 'r');
		$content = '';
		while (!feof($fp)) {
			$content .= fread($fp, 102400);
		}
		fclose($fp);

		if (empty($content)) {
			return array();
		}
		$tmp = @unserialize($content);

		if (empty($tmp)) {
			die("Error! <font color=red>Cannot read configuration file <b>".htmlspecialchars($configname)."</b></font><br /><font color=blue>Before the setup starts, please ensure that you have properly configured file and directory access permissions. For *nix system, please see below.</font><br />chmod 777 config <br />chmod 777 config/".$configname."<br /><br /> If access permission is alright, perhaps there's some misconfiguration or the configuration file is corrupted. Please check config/".$configname);
		}
		$GLOBALS[$configname] = $tmp;
		return $tmp;
	}
}


if (file_exists($rootpath . 'config/allconfig.php')) {
	require($rootpath . 'config/allconfig.php');
} else {
	ReadConfig();
}

$SITENAME = $BASIC['SITENAME'];
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != '127.0.0.1') {
  if ($_SERVER['HTTP_HOST'] == 'sp-pt.hust.edu.cn') {
    $BASEURL = $_SERVER['HTTP_HOST'] . ':81' . $BASIC['BASEDIR'];
  }
  else {
    $BASEURL = $_SERVER['HTTP_HOST'] . $BASIC['BASEDIR'];
  }
}
else {
  $BASEURL = $BASIC['BASEURL'];
}
$cakedir = $BASIC['CAKEDIR'];
$CAKEURL = $BASIC['BASEURL'] . '/' . $BASIC['CAKEDIR'];
$announce_urls = [$BASIC['announce_url']];
$possibleUrls = array_merge([$BASEURL], $BASIC['possible_urls']);

$SITE_ONLINE = $MAIN['site_online'];
$max_torrent_size = $MAIN['max_torrent_size'];
$announce_interval = (int)$MAIN['announce_interval'];
$annintertwoage = (int)$MAIN['annintertwoage'];
$annintertwo = (int)$MAIN['annintertwo'];
$anninterthreeage = (int)$MAIN['anninterthreeage'];
$anninterthree = (int)$MAIN['anninterthree'];
$signup_timeout = $MAIN['signup_timeout'];
$minoffervotes = $MAIN['minoffervotes'];
$offervotetimeout_main = $MAIN['offervotetimeout'];
$offeruptimeout_main = $MAIN['offeruptimeout'];
$maxsubsize_main = $MAIN['maxsubsize'];
$maxnewsnum_main = $MAIN['maxnewsnum'];
$forumpostsperpage = $MAIN['postsperpage'];
$forumtopicsperpage_main = $MAIN['topicsperpage'];
$torrentsperpage_main = (int)$MAIN['torrentsperpage'];
$max_dead_torrent_time = $MAIN['max_dead_torrent_time'];
$maxusers = $MAIN['maxusers'];
$torrent_dir = $MAIN['torrent_dir'];
$iniupload_main = $MAIN['iniupload'];
$SITEEMAIL = $MAIN['SITEEMAIL'];
$ACCOUNTANTID = (int)$MAIN['ACCOUNTANTID'];
$ALIPAYACCOUNT = $MAIN['ALIPAYACCOUNT'];
$PAYPALACCOUNT = $MAIN['PAYPALACCOUNT'];
$SLOGAN = $MAIN['SLOGAN'];
$icplicense_main = $MAIN['icplicense'];
$autoclean_interval_one = $MAIN['autoclean_interval_one'];
$autoclean_interval_two = $MAIN['autoclean_interval_two'];
$autoclean_interval_three = $MAIN['autoclean_interval_three'];
$autoclean_interval_four = $MAIN['autoclean_interval_four'];
$autoclean_interval_five = $MAIN['autoclean_interval_five'];
$REPORTMAIL = $MAIN['reportemail'];
$invitesystem = $MAIN['invitesystem'];
$registration = $MAIN['registration'];
$showmovies['hot'] = $MAIN['showhotmovies'];
$showmovies['classic'] = $MAIN['showclassicmovies'];
$showextinfo['imdb'] = $MAIN['showimdbinfo'];
$enablenfo_main = $MAIN['enablenfo'];
$showschool = $MAIN['enableschool'];
$restrictemaildomain = $MAIN['restrictemail'];
$showpolls_main = $MAIN['showpolls'];
$showstats_main = $MAIN['showstats'];
$stickylimit = (int)$MAIN['stickylimit'];
$wechattoken = $MAIN['wechattoken'];
$douban_apikey = $MAIN['douban_apikey'];
$useCronTriggerCleanUp = $MAIN['cron_cleanup'];
//$showlastxforumposts_main = $MAIN['showlastxforumposts'];
$showlastxtorrents_main = $MAIN['showlastxtorrents'];
$showtrackerload = $MAIN['showtrackerload'];
$showshoutbox_main = $MAIN['showshoutbox'];
$showfunbox_main = $MAIN['showfunbox'];
$enableoffer = $MAIN['showoffer'];
$enablerequest = $MAIN['showrequest'];
$sptime = $MAIN['sptime'];
$showhelpbox_main = $MAIN['showhelpbox'];
$enablebitbucket_main = $MAIN['enablebitbucket'];
$smalldescription_main = $MAIN['smalldescription'];
$altname_main = $MAIN['altname'];
$enableextforum = $MAIN['extforum'];
$extforumurl = $MAIN['extforumurl'];
$deflang = $MAIN['defaultlang'];
$defcss = $MAIN['defstylesheet'];
$enabledonation = $MAIN['donation'];
$enablespecial = $MAIN['spsct'];
$browsecatmode = (int)$MAIN['browsecat'];
$specialcatmode = (int)$MAIN['specialcat'];
$waitsystem = $MAIN['waitsystem'];
$maxdlsystem = $MAIN['maxdlsystem'];
$bitbucket = $MAIN['bitbucket'];
$torrentnameprefix = $MAIN['torrentnameprefix'];
$showforumstats_main = $MAIN['showforumstats'];
$verification = $MAIN['verification'];
$invite_count = $MAIN['invite_count'];
$invite_timeout = $MAIN['invite_timeout'];
$seeding_leeching_time_calc_start = $MAIN['seeding_leeching_time_calc_start'];
$logo_main = $MAIN['logo'];


$emailnotify_smtp = $SMTP['emailnotify'];
$smtptype = $SMTP['smtptype'];
$smtp_host = $SMTP['smtp_host'];
$smtp_port = $SMTP['smtp_port'];
if (strtoupper(substr(PHP_OS,0,3)=='WIN'))
$smtp_from = $SMTP['smtp_from'];
$smtpaddress = $SMTP['smtpaddress'];
$smtpport = $SMTP['smtpport'];
$accountname = $SMTP['accountname'];
$accountpassword = $SMTP['accountpassword'];

$securelogin = $SECURITY['securelogin'];
$securetracker = $SECURITY['securetracker'];
$https_announce_urls = array();
$https_announce_urls[] = $SECURITY['https_announce_url'];
$iv = $SECURITY['iv'];
$maxip = $SECURITY['maxip'];
$maxloginattempts = $SECURITY['maxloginattempts'];
$disableemailchange = $SECURITY['changeemail'];
$cheaterdet_security = $SECURITY['cheaterdet'];
$nodetect_security = $SECURITY['nodetect'];

$defaultclass_class = $AUTHORITY['defaultclass'];
$staffmem_class = $AUTHORITY['staffmem'];
$newsmanage_class = $AUTHORITY['newsmanage'];
$newfunitem_class = $AUTHORITY['newfunitem'];
$funmanage_class = $AUTHORITY['funmanage'];
$sbmanage_class = $AUTHORITY['sbmanage'];
$pollmanage_class = $AUTHORITY['pollmanage'];
$applylink_class = $AUTHORITY['applylink'];
$linkmanage_class = $AUTHORITY['linkmanage'];
$postmanage_class = $AUTHORITY['postmanage'];
$commanage_class = $AUTHORITY['commanage'];
$forummanage_class = $AUTHORITY['forummanage'];
$viewuserlist_class = $AUTHORITY['viewuserlist'];
$torrentmanage_class = $AUTHORITY['torrentmanage'];
$torrentsticky_class = $AUTHORITY['torrentsticky'];
$torrentonpromotion_class = $AUTHORITY['torrentonpromotion'];
$askreseed_class = $AUTHORITY['askreseed'];
$viewnfo_class = $AUTHORITY['viewnfo'];
$torrentstructure_class = $AUTHORITY['torrentstructure'];
$sendinvite_class = $AUTHORITY['sendinvite'];
$viewhistory_class = $AUTHORITY['viewhistory'];
$topten_class = $AUTHORITY['topten'];
$log_class = $AUTHORITY['log'];
$confilog_class = $AUTHORITY['confilog'];
$confiforumlog_class = $AUTHORITY['confiforumlog'];
$userprofile_class = $AUTHORITY['userprofile'];
$torrenthistory_class = $AUTHORITY['torrenthistory'];
$prfmanage_class = $AUTHORITY['prfmanage'];
$cruprfmanage_class = $AUTHORITY['cruprfmanage'];
$uploadsub_class = $AUTHORITY['uploadsub'];
$delownsub_class = $AUTHORITY['delownsub'];
$submanage_class = $AUTHORITY['submanage'];
$updateextinfo_class = $AUTHORITY['updateextinfo'];
$viewanonymous_class = $AUTHORITY['viewanonymous'];
$beanonymous_class = $AUTHORITY['beanonymous'];
$addoffer_class = $AUTHORITY['addoffer'];
$offermanage_class = $AUTHORITY['offermanage'];
$upload_class = $AUTHORITY['upload'];
$uploadspecial_class = $AUTHORITY['uploadspecial'];
$movetorrent_class = $AUTHORITY['movetorrent'];
$chrmanage_class = $AUTHORITY['chrmanage'];
$viewinvite_class = $AUTHORITY['viewinvite'];
$buyinvite_class = $AUTHORITY['buyinvite'];
$seebanned_class = $AUTHORITY['seebanned'];
$againstoffer_class = $AUTHORITY['againstoffer'];
$userbar_class = $AUTHORITY['userbar'];

$where_tweak = $TWEAK['where'];
$iplog1 = $TWEAK['iplog1'];
$bonus_tweak = $TWEAK['bonus'];
$titlekeywords_tweak = $TWEAK['titlekeywords'];
$metakeywords_tweak = $TWEAK['metakeywords'];
$metadescription_tweak = $TWEAK['metadescription'];
$datefounded = $TWEAK['datefounded'];
$enablelocation_tweak = $TWEAK['enablelocation'];
$enablesqldebug_tweak = $TWEAK['enablesqldebug'];
$sqldebug_tweak = $TWEAK['sqldebug'];
$cssdate_tweak = $TWEAK['cssdate'];
$enabletooltip_tweak = $TWEAK['enabletooltip'];
$prolinkimg = $TWEAK['prolinkimg'];
$analyticscode_tweak = $TWEAK['analyticscode'];
$oday_bot_id = $TWEAK['oday_bot_id'];
$oday_forum_id = $TWEAK['oday_forum_id'];
$enableattach_attachment = $ATTACHMENT['enableattach'];
$classone_attachment = $ATTACHMENT['classone'];
$countone_attachment = $ATTACHMENT['countone'];
$sizeone_attachment = $ATTACHMENT['sizeone'];
$extone_attachment = $ATTACHMENT['extone'];
$classtwo_attachment = $ATTACHMENT['classtwo'];
$counttwo_attachment = $ATTACHMENT['counttwo'];
$sizetwo_attachment = $ATTACHMENT['sizetwo'];
$exttwo_attachment = $ATTACHMENT['exttwo'];
$classthree_attachment = $ATTACHMENT['classthree'];
$countthree_attachment = $ATTACHMENT['countthree'];
$sizethree_attachment = $ATTACHMENT['sizethree'];
$extthree_attachment = $ATTACHMENT['extthree'];
$classfour_attachment = $ATTACHMENT['classfour'];
$countfour_attachment = $ATTACHMENT['countfour'];
$sizefour_attachment = $ATTACHMENT['sizefour'];
$extfour_attachment = $ATTACHMENT['extfour'];
$savedirectory_attachment = $ATTACHMENT['savedirectory'];
$httpdirectory_attachment = $ATTACHMENT['httpdirectory'];
$savedirectorytype_attachment = $ATTACHMENT['savedirectorytype'];
$thumbnailtype_attachment = $ATTACHMENT['thumbnailtype'];
$thumbquality_attachment = $ATTACHMENT['thumbquality'];
$thumbwidth_attachment = $ATTACHMENT['thumbwidth'];
$thumbheight_attachment = $ATTACHMENT['thumbheight'];
$watermarkpos_attachment = $ATTACHMENT['watermarkpos'];
$watermarkwidth_attachment = $ATTACHMENT['watermarkwidth'];
$watermarkheight_attachment = $ATTACHMENT['watermarkheight'];
$watermarkquality_attachment = $ATTACHMENT['watermarkquality'];
$altthumbwidth_attachment = $ATTACHMENT['altthumbwidth'];
$altthumbheight_attachment = $ATTACHMENT['altthumbheight'];


$enablead_advertisement = $ADVERTISEMENT['enablead'];
$enablenoad_advertisement = $ADVERTISEMENT['enablenoad'];
$noad_advertisement = $ADVERTISEMENT['noad'];
$enablebonusnoad_advertisement = $ADVERTISEMENT['enablebonusnoad'];
$bonusnoad_advertisement = $ADVERTISEMENT['bonusnoad'];
$bonusnoadpoint_advertisement = $ADVERTISEMENT['bonusnoadpoint'];
$bonusnoadtime_advertisement = $ADVERTISEMENT['bonusnoadtime'];
$adclickbonus_advertisement = $ADVERTISEMENT['adclickbonus'];

$mainversion_code = $CODE['mainversion'];
$subversion_code = $CODE['subversion'];
$releasedate_code = $CODE['releasedate'];
$website_code = $CODE['website'];

$donortimes_bonus = $BONUS['donortimes'];
$perseeding_bonus = $BONUS['perseeding'];
$maxseeding_bonus = $BONUS['maxseeding'];
$tzero_bonus = $BONUS['tzero'];
$nzero_bonus = $BONUS['nzero'];
$bzero_bonus = $BONUS['bzero'];
$l_bonus = $BONUS['l'];
$ka_bonus = $BONUS['ka'];
$kb_bonus = $BONUS['kb'];
$uploadtorrent_bonus = $BONUS['uploadtorrent'];
$interval_no_deduct_bonus_on_deletion = $BONUS['interval_no_deduct_bonus_on_deletion'];
$uploadsubtitle_bonus = $BONUS['uploadsubtitle'];
$starttopic_bonus = $BONUS['starttopic'];
$makepost_bonus = $BONUS['makepost'];
$addcomment_bonus = $BONUS['addcomment'];
$pollvote_bonus = $BONUS['pollvote'];
$offervote_bonus = $BONUS['offervote'];
$funboxvote_bonus = $BONUS['funboxvote'];
$saythanks_bonus = $BONUS['saythanks'];
$receivethanks_bonus = $BONUS['receivethanks'];
$funboxreward_bonus = $BONUS['funboxreward'];
$onegbupload_bonus = $BONUS['onegbupload'];
$fivegbupload_bonus = $BONUS['fivegbupload'];
$tengbupload_bonus = $BONUS['tengbupload'];
$ratiolimit_bonus = $BONUS['ratiolimit'];
$dlamountlimit_bonus = $BONUS['dlamountlimit'];
$oneinvite_bonus = $BONUS['oneinvite'];
$customtitle_bonus = $BONUS['customtitle'];
$vipstatus_bonus = $BONUS['vipstatus'];
$bonusgift_bonus = $BONUS['bonusgift'];
$basictax_bonus = 0+$BONUS['basictax'];
$taxpercentage_bonus = 0+$BONUS['taxpercentage'];
$prolinkpoint_bonus = $BONUS['prolinkpoint'];
$prolinktime_bonus = $BONUS['prolinktime'];

$neverdelete_account = $ACCOUNT['neverdelete'];
$neverdeletepacked_account = $ACCOUNT['neverdeletepacked'];
$deletepacked_account = $ACCOUNT['deletepacked'];
$deleteunpacked_account = $ACCOUNT['deleteunpacked'];
$deletenotransfer_account = $ACCOUNT['deletenotransfer'];
$deletenotransfertwo_account = $ACCOUNT['deletenotransfertwo'];
$deletepeasant_account = $ACCOUNT['deletepeasant'];
$psdlone_account = $ACCOUNT['psdlone'];
$psratioone_account = $ACCOUNT['psratioone'];
$psdltwo_account = $ACCOUNT['psdltwo'];
$psratiotwo_account = $ACCOUNT['psratiotwo'];
$psdlthree_account = $ACCOUNT['psdlthree'];
$psratiothree_account = $ACCOUNT['psratiothree'];
$psdlfour_account = $ACCOUNT['psdlfour'];
$psratiofour_account = $ACCOUNT['psratiofour'];
$psdlfive_account = $ACCOUNT['psdlfive'];
$psratiofive_account = $ACCOUNT['psratiofive'];
$putime_account = $ACCOUNT['putime'];
$pudl_account = $ACCOUNT['pudl'];
$puprratio_account = $ACCOUNT['puprratio'];
$puderatio_account = $ACCOUNT['puderatio'];
$eutime_account = $ACCOUNT['eutime'];
$eudl_account = $ACCOUNT['eudl'];
$euprratio_account = $ACCOUNT['euprratio'];
$euderatio_account = $ACCOUNT['euderatio'];
$cutime_account = $ACCOUNT['cutime'];
$cudl_account = $ACCOUNT['cudl'];
$cuprratio_account = $ACCOUNT['cuprratio'];
$cuderatio_account = $ACCOUNT['cuderatio'];
$iutime_account = $ACCOUNT['iutime'];
$iudl_account = $ACCOUNT['iudl'];
$iuprratio_account = $ACCOUNT['iuprratio'];
$iuderatio_account = $ACCOUNT['iuderatio'];
$vutime_account = $ACCOUNT['vutime'];
$vudl_account = $ACCOUNT['vudl'];
$vuprratio_account = $ACCOUNT['vuprratio'];
$vuderatio_account = $ACCOUNT['vuderatio'];
$exutime_account = $ACCOUNT['exutime'];
$exudl_account = $ACCOUNT['exudl'];
$exuprratio_account = $ACCOUNT['exuprratio'];
$exuderatio_account = $ACCOUNT['exuderatio'];
$uutime_account = $ACCOUNT['uutime'];
$uudl_account = $ACCOUNT['uudl'];
$uuprratio_account = $ACCOUNT['uuprratio'];
$uuderatio_account = $ACCOUNT['uuderatio'];
$nmtime_account = $ACCOUNT['nmtime'];
$nmdl_account = $ACCOUNT['nmdl'];
$nmprratio_account = $ACCOUNT['nmprratio'];
$nmderatio_account = $ACCOUNT['nmderatio'];
$getInvitesByPromotion_class = $ACCOUNT['getInvitesByPromotion'];

$prorules_torrent = $TORRENT['prorules'];
$randomhalfleech_torrent = $TORRENT['randomhalfleech'];
$randomfree_torrent = $TORRENT['randomfree'];
$randomtwoup_torrent = $TORRENT['randomtwoup'];
$randomtwoupfree_torrent = $TORRENT['randomtwoupfree'];
$randomtwouphalfdown_torrent = $TORRENT['randomtwouphalfdown'];
$randomthirtypercentdown_torrent = $TORRENT['randomthirtypercentdown'];
$largesize_torrent = $TORRENT['largesize'];
$largepro_torrent = $TORRENT['largepro'];
$expirehalfleech_torrent = $TORRENT['expirehalfleech'];
$expirefree_torrent = $TORRENT['expirefree'];
$expiretwoup_torrent = $TORRENT['expiretwoup'];
$expiretwoupfree_torrent = $TORRENT['expiretwoupfree'];
$expiretwouphalfleech_torrent = $TORRENT['expiretwouphalfleech'];
$expirethirtypercentleech_torrent = $TORRENT['expirethirtypercentleech'];
$expirenormal_torrent = $TORRENT['expirenormal'];
$hotdays_torrent = $TORRENT['hotdays'];
$hotseeder_torrent = $TORRENT['hotseeder'];
$halfleechbecome_torrent = $TORRENT['halfleechbecome'];
$freebecome_torrent = $TORRENT['freebecome'];
$twoupbecome_torrent = $TORRENT['twoupbecome'];
$twoupfreebecome_torrent = $TORRENT['twoupfreebecome'];
$twouphalfleechbecome_torrent = $TORRENT['twouphalfleechbecome'];
$thirtypercentleechbecome_torrent = $TORRENT['thirtypercentleechbecome'];
$normalbecome_torrent = $TORRENT['normalbecome'];
$uploaderdouble_torrent = $TORRENT['uploaderdouble'];
$deldeadtorrent_torrent = $TORRENT['deldeadtorrent'];
$self_deletion_before_torrent = 86400 * intval($TORRENT['self_deletion_before']);
$no_deduct_bonus_on_deletion_torrent = 86400 * intval($TORRENT['no_deduct_bonus_on_deletion']);

$sns = $SNS;

$promotion_text = array(array('name' => 'normal', 'lang' => 'text_normal'), array('name' => 'free', 'lang' => 'text_free'), array('name'=>'twoup', 'lang'=>'text_two_times_up'), array('name' => 'twoupfree', 'lang'=> 'text_free_two_times_up'), array('name' => 'halfdown', 'lang' => 'text_half_down'), array('name' => 'twouphalfdown','lang' => 'text_half_down_two_up'), array('name' => 'thirtypercent', 'lang' => 'text_thirty_percent_down'));
$expire_limits = array(NULL, 0, $expirefree_torrent, $expiretwoup_torrent, $expiretwoupfree_torrent, $expirehalfleech_torrent, $expiretwouphalfleech_torrent, $expirethirtypercentleech_torrent);

foreach ($CONFIGURATIONS as $CONFIGURATION) {
	unset($GLOBALS[$CONFIGURATION]);
}

//Directory for subs
$SUBSPATH = "subs";

//Whether clean-up is triggered by cron, instead of the default browser clicks.
//Set MAIN['cron_cleanup'] to true ONLY if you have setup other method to schedule the clean-up process.
//e.g. cron on *nix, add the following line (without "") in your crontab file
//"*/5 * * * * wget -O - -q -t 1 http://www.kmgtp.org/cron.php"
//NOTE:
//Make sure you have wget installed on your OS
//replace "http://www.kmgtp.org/" with your own site address

//some promotion rules
//$promotionrules_torrent = array(0 => array("mediumid" => array(1), "promotion" => 5), 1 => array("mediumid" => array(3), "promotion" => 5), 2 => array("catid" => array(402), "standardid" => array(3), "promotion" => 4), 3 => array("catid" => array(403), "standardid" => array(3), "promotion" => 4));
$promotionrules_torrent = array();



