<html>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<body bgcolor="#1e1e1e" text="white">
<style>
  @import url('https://fonts.googleapis.com/css?family=Staatliches');

textarea {
max-width: 90%;
width: 300;
height: 250px;
resize: none;
outline: none;
overflow: auto;
background: transparent;
color: #ffffff;
}

button {
  background: transparent;
    font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

input {
  background: transparent;
  font-family: Staatliches;
  color: #ffffff;
  border-color: #ffffff;
  cursor: pointer;
}

font {
  font-family: Staatliches;
}

body::-webkit-scrollbar {
  width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
  background: #1e1e1e;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
  background-color: #1e1e1e;    /* color of the scroll thumb */
  border: 3px solid gray;  /* creates padding around scroll thumb */
}
</style>
</html>
<?php
error_reporting(0);
set_time_limit(0);
echo "
<title>
[+] URL Fuzzer ( Finder ) [+]
</title><center>
<head>
<form method='POST' action=''>
</head>
<font face=courier new size=4>Url Fuzzer</font><hr><font size=2 face=courier new>Berguna untuk mencari hidden files atau hidden directory</font><br>
<style>
textarea {
  outline: none;
  resize: none;
}
</style>
<style>
.asu {
  background-color: #000000;
  border: none;
  color: white;
  padding: 4px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>";
echo "
<br><font face=arial size=2>Site : </font><input type='text' class='search' name='url' value='https://www.google.com'/>
</center>
<center><font face=courier new size=3>Directory / File</font></center>
<p dir='ltr' align='center'>
<textarea cols='50' class='area'  rows='20' name='dir'>
images\r\ncss\r\nLC_MESSAGES\r\njs\r\ntmpl\r\nlang\r\ndefault\r\nREADME\r\ntemplates\r\nlangs\r\nconfig\r\nGNUmakefile\r\nthemes\r\nen\r\nimg\r\nadmin\r\nuser\r\nplugins\r\nshow\r\nlevel\r\nexec\r\npo\r\nicons\r\nclasses\r\nincludes\r\n_notes\r\nsystem\r\nlanguage\r\nMANIFEST\r\nmodules\r\nerror_log\r\nviews\r\nbackup\r\ndb\r\nlib\r\nfaqweb\r\narticleweb\r\nsystem32\r\nskins\r\n_vti_cnf\r\nmodels\r\nnews\r\ncache\r\nCVS\r\nmain\r\nhtml\r\nfaq\r\nupdate\r\nextensions\r\njscripts\r\nPackages\r\nlanguages\r\nfeatures\r\npix\r\ncategoryblog\r\ndocs\r\nthumbs\r\ntest\r\nphp\r\nassets\r\nsp2qfe\r\ndata\r\nsp2gdr\r\ninclude\r\nscripts\r\nhelpers\r\nExtension\r\nmedia\r\n_vti_bin\r\nwebalizer\r\ncommon\r\nlogs\r\nsearch\r\ncustomer\r\ndialogs\r\nsrc\r\ncfdocs\r\nINSTALL\r\nwinnt\r\nrvtheme_admin\r\nrvtheme\r\ndefault_admin\r\ndefault1\r\nLICENSE\r\nEntries\r\n10\r\ntreeNav\r\nlocale\r\ninternals\r\nstyle\r\nRoot\r\nRepository\r\nimapd\r\nflags\r\ndefaultColorConf\r\ntemplate\r\nauthweb\r\nCOPYING\r\nde_DE\r\nenglish\r\nfr_FR\r\nasp\r\ntmp\r\nsql\r\nsource\r\ndoc\r\nblocks\r\nbackgrounds\r\nmaint\r\nhelp\r\nnl_NL\r\nadministrator\r\nversion\r\ncategory\r\nMakefile\r\nstyles\r\ntoolbar\r\nra\r\niissamples\r\nfiles\r\nPDF\r\n22\r\ncatalog\r\nlibs\r\nsimpletest\r\ndatabase\r\n06\r\nsamples\r\nlibraries\r\nfc_functions\r\n16\r\n11\r\nfr\r\nbg\r\n01\r\nperl\r\ncontrollers\r\n12\r\nupload\r\nno_NO\r\ncomponents\r\nclass\r\nservlet\r\nde\r\n32\r\n1033\r\ntemp\r\nphpunit\r\ninfo\r\n_vti_pvt\r\n09\r\nutils\r\nfonts\r\ncontrib\r\napp\r\ntables\r\nit\r\neditor\r\ndemo\r\nwget\r\nChangeLog\r\n14\r\n03\r\nru\r\nlogin\r\ngraphics\r\nelements\r\ncfm\r\nbullets\r\nSources\r\nsilver\r\n07\r\n05\r\ndialog\r\n02\r\nxmlrpc\r\nsmiley\r\nmsadc\r\nmail\r\nconnectors\r\nblack\r\nbackups\r\nGalleryStorage\r\nAuth\r\n04\r\njavascript\r\ninstall\r\narchive\r\n_private\r\nuploads\r\ntable\r\njqueryui\r\nfilemanager\r\nemail\r\ndk\r\ncgi\r\nusers\r\nsv_SE\r\nindex\r\nfunctions\r\nexamples\r\nerror\r\nbrowser\r\nTODO\r\n13\r\npt_BR\r\nmisc\r\nimage\r\ncom_content\r\ncategories\r\ncalendar\r\nbuttons\r\n404\r\ntools\r\nplaceholder\r\nphpmailer\r\nold\r\nmoodle2\r\nbin\r\nauth\r\nAdapter\r\ntinymce\r\nmsn\r\nlinks\r\ninc\r\nfeed\r\nda_DK\r\napps\r\nadvanced\r\nCREDITS\r\n2010\r\n08\r\nmoddata\r\nmod_login\r\nlocal\r\nja_JP\r\nforum\r\nfi_FI\r\ndrivers\r\ncs_CZ\r\nbehaviors\r\nsecret\r\npt_PT\r\npl_PL\r\nos\r\noffice2003\r\ngeshi\r\ngallery\r\nflash\r\nconf\r\ncaspsamp\r\napplication\r\naccess\r\nRETAIL\r\ntablecommands\r\npages\r\nmsft\r\nlog\r\nfck_template\r\nfck_select\r\nfck_link\r\nfck_image\r\nfck_docprops\r\nfck_about\r\ndocuments\r\ncustom\r\nbbcode\r\nCHANGES\r\n2009\r\n2003\r\ntests\r\nspellerpages\r\npdf\r\nnewsletters\r\nnew\r\nlibrary\r\nit_IT\r\ngroup2\r\nfckeditor\r\nfck_spellerpages\r\netc\r\ncomments\r\nblue\r\nFile\r\nCHANGELOG\r\n15\r\nwindows\r\nstats\r\npear\r\nmenu\r\nlayout\r\ninlinepopups\r\ngroup7\r\ngroup6\r\ngroup5\r\ngroup4\r\nframework\r\nes\r\ncom_contact\r\nblog\r\naspx\r\narticle\r\n0011\r\n0009\r\nzh_TW\r\nxml\r\npostgres\r\norders\r\nmanage\r\nlasso\r\niisadmpwd\r\ngreen\r\nforums\r\nfile\r\ndtd\r\ndownloads\r\ndev\r\ncom_weblinks\r\ncom_search\r\ncheck.bat\r\nbuild\r\nT_IMG\r\nServer\r\nScripts\r\nLST\r\nIMG\r\nIISADMPWD\r\nHTML\r\nDTL\r\nBNR\r\n60\r\n2011\r\nstories\r\nsession\r\nsection\r\nrefs\r\nprint\r\npaste\r\npassword\r\no2k7\r\nmod_search\r\ngroup8\r\ngroup3\r\ngroup1\r\nfullscreen\r\nes_ES\r\nel_GR\r\ndownload\r\ncom_poll\r\ncom_newsfeeds\r\nbanners\r\nbackupdata\r\nautogrow\r\nPromotion\r\nNEWS\r\nDTL_ETC\r\nClient\r\n20\r\nzh_CN\r\nwww\r\nstat\r\nsmilies\r\nsimple\r\nsetup\r\nsave\r\nrvscompodb\r\nru_RU\r\nreadme\r\npreview\r\npoll\r\nmysql\r\nmod_newsflash\r\nmod_custom\r\njava\r\ni386\r\nhome\r\ngraphs\r\nfrontpage\r\next\r\nexport\r\nexair\r\nepoch\r\nen_US\r\ndomit\r\ncore\r\ncontact\r\ncomponent\r\ncommandclasses\r\ncfusion\r\nanalog\r\nactions\r\n_source\r\nUPGRADE\r\nText\r\nTB_IMG\r\nStorage\r\nSites\r\nMOB\r\nImages\r\nAUTHORS\r\nADD_SALE\r\n25\r\n21\r\n00\r\nvideo\r\ntiny_mce\r\nstatus\r\nspellchecker\r\nregister\r\nprivate\r\npasswords\r\noracle\r\nfilter\r\nfck_flash\r\nexample\r\neditors\r\ndirectionality\r\ndescription\r\ncontent\r\ncompat\r\nclassic\r\nbbs\r\n_vti_aut\r\nSearch\r\n24\r\n23\r\n17\r\n0804\r\n0404\r\nzImage\r\nupgrade\r\nupdates\r\ntheme\r\nsqlqhit.asp\r\nsk_SK\r\nsimplecommands\r\nserver\r\nsecure\r\nresources\r\nreport\r\npy\r\npub\r\npolicy\r\npagebreak\r\nobjects\r\nmod_mainmenu\r\nmod_latestnews\r\nmod_footer\r\nmod_feed\r\nlt_LT\r\ninterfaces\r\ni18n\r\ngerman\r\nftp\r\nexampleapp\r\nen_GB\r\ncontextmenu\r\nconfigs\r\ncom_media\r\nccbill\r\nbranches\r\nSamples\r\nPEAR\r\nOPD\r\nMail\r\nKnowledge\r\nFilter\r\nFast_Lane_Checkout\r\nDocs\r\nDLL\r\n0012\r\n0010\r\n0007\r\nyui\r\nxp\r\nweblink\r\nutil\r\nui\r\ntabs\r\nswf\r\nrss\r\nro_RO\r\nred\r\npayment\r\nnl\r\nmusic\r\nmodule\r\nmod_stats\r\nmod_banners\r\nmembers\r\nlayer\r\nkhepri\r\nhooks\r\nheader\r\nga_IE\r\nfun\r\nfrench\r\nextra\r\nelement\r\ndisk1\r\ndir\r\ndevel\r\ncom_banners\r\nblogweb\r\nbanner\r\nar\r\naqua\r\nadvlink\r\nadvimage\r\n_samples\r\nWORD\r\nMSFT\r\nImage\r\nHEAD\r\nDriver\r\nDecorator\r\nArchive\r\n2008\r\n19\r\n0416\r\n0014\r\n0013\r\n0006\r\nwebmail\r\nwebcart\r\ntree\r\ntcpdf\r\nsupport\r\nstorage\r\nsl_SI\r\nsetting\r\nsecurity\r\nsearchreplace\r\nscript\r\nschema\r\nsafari\r\nrtl\r\nroot\r\nplugin\r\nplatform\r\nnoneditable\r\nmod_poll\r\nmime\r\nmeta\r\nmagic\r\nlinux\r\nkernel\r\njsp\r\niespell\r\nhu_HU\r\nhidden\r\nhelper\r\nfullpage\r\nformat\r\nfindreplace\r\nextras\r\nexpeval\r\nevent\r\nenu\r\nemotions\r\ndocument\r\ndirectory\r\ncom_user\r\nca_ES\r\nbugs\r\nbeta\r\nbase\r\napplets\r\napache\r\nalpha\r\nadvhr\r\n_plugins\r\n_mem_bin\r\nWINDOWS\r\nViewCode.asp\r\nSpryAssets\r\nRpc\r\nRelease\r\nPBServer\r\nOne_Page_Checkout\r\nOEM\r\nNews_Management\r\nManufacturers\r\nMSADC\r\nGift_Certificates\r\nExtra_Fields\r\nElement\r\nDiscount_Coupons\r\nCustomer_Reviews\r\n30\r\n27\r\n2004\r\n18\r\n040c\r\n.htpasswd\r\nxhtmlxtras\r\nweb\r\nvisualchars\r\nutilities\r\nusage\r\nupgrades\r\nuk_UA\r\ntesting\r\nstore\r\nsmarty\r\nsetupdir\r\nservices\r\nrhuk_milkyway\r\nretail\r\npython\r\npublic_html\r\nproject\r\nphpMyAdmin\r\nnonbreaking\r\nmy_files\r\nmod_syndicate\r\nmod_random_image\r\nlightbox\r\nko_KR\r\niso\r\ninstaller\r\nicon\r\nfont\r\nfilters\r\neu_ES\r\ndll\r\ndatabases\r\nconfigure\r\ncompat2x\r\nclearlooks2\r\ncd\r\nbg_BG\r\naudio\r\najax\r\nadapters\r\nabout\r\nUPGRADING\r\nThemeOffice\r\nDRIVERS\r\nALL\r\n42\r\n2002\r\n000a\r\n.DS_Store\r\nwwwboard\r\nwebmaster\r\nweblog\r\nview\r\ntr_TR\r\nthumbnails\r\nthemed_graphics\r\ntags\r\nstills\r\nsounds\r\nsnippets\r\nsimplepie\r\nshipping\r\nsdk\r\nrpc\r\nrenderer\r\npopups\r\nphotos_history\r\nphoto_events\r\npasswd\r\npass\r\nother\r\norder.log\r\noptions\r\nnetwork\r\nnetstat\r\nmod\r\nmimetypes\r\nmedia_index\r\nlogfiles\r\nlogfile\r\nlang_english\r\njquery\r\njoomla\r\nimp\r\nid_ID\r\nguests\r\nguestbook\r\nform\r\nfilesystems\r\nexchange\r\neasylog\r\ndragresizetable\r\ndevices\r\ndesign\r\ndbg\r\ncssOutsider\r\ncr\r\ncmd.exe\r\ncli\r\ncart\r\nbutton\r\nbug\r\nbb\r\nautosave\r\narchives\r\napplications\r\namd64\r\nads\r\n_sample\r\nWIN98\r\nWIN95\r\nWHATISTHIS\r\nVERSION\r\nSYSTEM\r\nReader\r\nDatabaseStorage\r\nCache\r\n31\r\n28\r\n2006\r\n001d\r\n000b\r\n.thumbs\r\nwordpress\r\nwin95\r\nwin2000\r\nvi\r\ntech\r\ntabfocus\r\nsun\r\nssi\r\nspam\r\nskin\r\nseminaria\r\nscriptaculous\r\nsamba\r\nsam\r\nreset\r\nremotes\r\nremind\r\nprojects\r\nprep\r\nphputf8\r\nphpinputfilter\r\nphoto\r\npattemplate\r\norange\r\nnewsfeed\r\nnb_NO\r\nmod_wrapper\r\nmod_breadcrumbs\r\nmessage\r\nlv_LV\r\nlist\r\nka\r\nja_purity\r\ninsertdatetime\r\nhu\r\nhe_IL\r\nguest\r\ngeneral\r\ngd\r\ngcc\r\nfoo\r\nfilesystem\r\nfi\r\nfck_universalkey\r\nfa_IR\r\nel\r\ndatafiles\r\nda\r\ncyber\r\ncontrols\r\ncode\r\nclient\r\nca\r\nbrand\r\nbackdoor\r\nauthadmin\r\narticles\r\nart\r\narc\r\naf\r\nadministration\r\naccounting\r\naccount\r\n_vti_adm\r\nOpenID\r\nNIF\r\nLatest\r\nImageManager\r\nCSS\r\nBlock\r\nAll\r\nAction\r\n9x\r\n29\r\n2007\r\n2005\r\n1.2\r\n001e\r\nzip\r\nwwwstat\r\nwwwlog\r\nwstats\r\nwsdocs\r\nadmindirerror\r\nadmindirname\r\nadmindirsettinghead\r\nadmindirsettingsub\r\nbypassed\r\ncannotcreatelangdir\r\ncannotcreatetempdir\r\ncannotdownloadcomponents\r\ncannotdownloadzipfile\r\ncannotfindcomponent\r\ncannotsavemd5file\r\ncannotsavezipfile\r\ncannotunzipfile\r\ncaution\r\ncheck\r\nchooselanguagehead\r\nchooselanguagesub\r\nclosewindow\r\ncompatibilitysettingshead\r\ncompatibilitysettingssub\r\ncomponentisuptodate\r\nconfigfilenotwritten\r\nconfigfilewritten\r\nconfigurationcompletehead\r\nconfigurationcompletesub\r\ncontinue\r\nctyperecommended\r\nctyperequired\r\ncurlrecommended\r\ncurlrequired\r\ncustomcheck\r\ndatabase\r\ndatabasecreationsettingshead\r\ndatabasecreationsettingssub\r\ndatabasesettingshead\r\ndatabasesettingssub\r\ndatabasesettingssub_mssql\r\ndatabasesettingssub_mssql_n\r\ndatabasesettingssub_mysql\r\ndatabasesettingssub_mysqli\r\ndatabasesettingssub_oci8po\r\ndatabasesettingssub_odbc_mssql\r\ndatabasesettingssub_postgres7\r\ndatabasesettingswillbecreated\r\ndataroot\r\ndatarooterror\r\ndatarootpublicerror\r\ndbconnectionerror\r\ndbcreationerror\r\ndbhost\r\ndbprefix\r\ndbtype\r\ndbwrongencoding\r\ndbwronghostserver\r\ndbwrongnlslang\r\ndbwrongprefix\r\ndirectorysettingshead\r\ndirectorysettingssub\r\ndirroot\r\ndirrooterror\r\ndownload\r\ndownloadedfilecheckfailed\r\ndownloadlanguagebutton\r\ndownloadlanguagehead\r\ndownloadlanguagenotneeded\r\ndownloadlanguagesub\r\nenvironmenterrortodo\r\nenvironmenthead\r\nenvironmentrecommendcustomcheck\r\nenvironmentrecommendinstall\r\nenvironmentrecommendversion\r\nenvironmentrequirecustomcheck\r\nenvironmentrequireinstall\r\nenvironmentrequireversion\r\nenvironmentsub\r\nenvironmentxmlerror\r\nerror\r\nfail\r\nfileuploads\r\nfileuploadserror\r\nfileuploadshelp\r\ngdversion\r\ngdversionerror\r\ngdversionhelp\r\nglobalsquotes\r\nglobalsquoteserror\r\nglobalsquoteshelp\r\nglobalswarning\r\nhelp\r\niconvrecommended\r\ninfo\r\ninstallation\r\ninvalidmd5\r\nlangdownloaderror\r\nlangdownloadok\r\nlanguage\r\nmagicquotesruntime\r\nmagicquotesruntimeerror\r\nmagicquotesruntimehelp\r\nmbstringrecommended\r\nmemorylimit\r\nmemorylimiterror\r\nmemorylimithelp\r\nmissingrequiredfield\r\nmoodledocslink\r\nmssql\r\nmssql_n\r\nmssqlextensionisnotpresentinphp\r\nmysql\r\nmysqli\r\nmysql416bypassed\r\nmysql416required\r\nmysqlextensionisnotpresentinphp\r\nmysqliextensionisnotpresentinphp\r\nname\r\nnext\r\noci8po\r\nociextensionisnotpresentinphp\r\nodbc_mssql\r\nodbcextensionisnotpresentinphp\r\nok\r\nopensslrecommended\r\nparentlanguage\r\npass\r\npassword\r\npgsqlextensionisnotpresentinphp\r\nphp50restricted\r\nphpversion\r\nphpversionerror\r\nphpversionhelp\r\npostgres7\r\npostgresqlwarning\r\nprevious\r\nqtyperqpwillberemoved\r\nqtyperqpwillberemovedanyway\r\nremotedownloaderror\r\nremotedownloadnotallowed\r\nreport\r\nrestricted\r\nsafemode\r\nsafemodeerror\r\nsafemodehelp\r\nserverchecks\r\nsessionautostart\r\nsessionautostarterror\r\nsessionautostarthelp\r\nskipdbencodingtest\r\nstatus\r\nthis_direction\r\nthischarset\r\nthisdirection\r\nthislanguage\r\nunicoderecommended\r\nunicoderequired\r\nuser\r\nwelcomep10\r\nwelcomep20\r\nwelcomep30\r\nwelcomep40\r\nwelcomep50\r\nwelcomep60\r\nwelcomep70\r\nwrongdestpath\r\nwrongsourcebase\r\nwrongzipfilename\r\nwwwroot\r\nwwwrooterror\r\nxmlrpcrecommended\r\nziprequiredwhite\r\nwebstats\r\nwebstat\r\nwebmaster_logs\r\nweblogs\r\nvivid_dreams\r\nvax\r\nuserdb\r\ntr\r\ntechnote\r\nsun2\r\nsshots\r\nsparc\r\nsiteadmin\r\nshtml.dll\r\nshowcode.asp\r\nshark\r\nshared\r\nsecrets\r\nsales\r\ns5\r\nreleases\r\nregistry\r\nrating\r\npublish\r\npublic\r\nprotected\r\npl\r\npics\r\nphpxmlrpc\r\nphpgacl\r\npass.txt\r\npar2\r\npapers\r\noverrides\r\norders.txt\r\nopenid\r\noordir\r\noldfiles\r\nold_files\r\nnuke\r\nno\r\nnn_NO\r\nmy_pictures\r\nmy_documents\r\nms\r\nmonitor\r\nmod_whosonline\r\nmod_sections\r\nmod_related_items\r\nmod_mostread\r\nmnet\r\nmk\r\nmemberfiles\r\nlanguage_files\r\njscalendar\r\nissamples\r\nindex.cgi\r\nindex.cfm\r\nimport\r\nidn\r\nhtdocs\r\nhtbin\r\nheaders\r\nglobals\r\nfashion_mosaic\r\nfa\r\nexpelval\r\net_EE\r\net\r\ndtree\r\ndos\r\ndcforum\r\ncustomers\r\ncss_styles\r\ncom_mailto\r\nclientes\r\ncliente\r\ncgiwin\r\ncgishl\r\ncgiscripts\r\ncgiscript\r\ncgis\r\ncgilib\r\ncgibin\r\ncgi_local\r\ncgi_bin\r\ncfide\r\ncfapps\r\ncc\r\ncats\r\nboxes\r\nboot\r\nbn\r\nbitfolge\r\nbilling\r\nbeez\r\nbank\r\nbackend\r\nalex\r\nalbums\r\nagentes\r\nadsamples\r\nadpassword.txt\r\nadmisapi\r\nadminweb\r\nadminuser\r\nadministracion\r\nadminfiles\r\nadmcgi\r\nadm\r\naddons\r\nad\r\nactive.log\r\naccess.txt\r\naccess.log\r\n_testcases\r\nZend\r\nYadis\r\nXtras\r\nXML\r\nUtil\r\nTemplates\r\nSQLQHit.asp\r\nSETUPDIR\r\nResponse\r\nResource\r\nRequest\r\nRenderer\r\nRTE_configuration\r\nPlugin\r\nNet\r\nMembership\r\nMedia\r\nM_images\r\nMNU_blank_data\r\nHttp\r\nHelper\r\nFunction\r\nFCKeditor\r\n80\r\n26\r\nyacs\r\nwp\r\nword\r\nwood\r\nvb\r\nv2\r\nus\r\nuk\r\nug\r\ntiger\r\nthumb\r\ntex\r\ntest2\r\ntest1\r\ntemplates_c\r\ntag\r\ntab\r\nsys\r\nsv\r\nsuper\r\nstars\r\nsphinx\r\nsparc64\r\nsocial\r\nsm\r\nslider\r\nsite\r\nsinger\r\nshop\r\nsettings\r\nservice\r\nservers\r\nselector\r\nrvslib\r\nrvsincludefile\r\nro\r\nreports\r\nready\r\npt\r\nprefs\r\nposters\r\nports\r\npop\r\npolls\r\nphpInputFilter\r\npdf_fonts\r\npcl\r\npatTemplate\r\npackages\r\noutput\r\nnotes\r\nnetworks\r\nnative\r\nmp3\r\nmod_archive\r\nmobile\r\nmessages\r\nmcpuk\r\nmbstring\r\nmath\r\nmanual\r\nlive\r\nlegacy\r\nleaflet\r\nja\r\nitem\r\nideas\r\nhw\r\nh_teal\r\nh_green\r\nh_cherry\r\nglobal\r\ngl\r\nfy\r\nfsbb\r\nforms\r\nfax\r\nexternal\r\nethernet\r\nes_AR\r\nequipment\r\nenvironment\r\nengines\r\neg\r\nedit\r\ndiagon\r\ncopy_this\r\ncom_wrapper\r\ncodes\r\ncert\r\ncentosplus\r\ncaptcha\r\nbooks\r\nbig\r\nbe\r\nbackground\r\navatars\r\nauthentication\r\nasms\r\narchive_tar\r\namiga\r\nads_data\r\nadodb\r\nacrobat\r\nWin9x\r\nWin98\r\nWin2k\r\nWebShop\r\nWINME\r\nVER_sel_data\r\nSYMBOLS\r\nReleaseNotes\r\nRELEASE_NOTES\r\nQuery\r\nProvider\r\nMNU_top_data\r\nMNU_menu_data\r\nLinux\r\nLICENCE\r\nHTTP\r\nForm\r\nCommands\r\nChangelog\r\nAMD64bit\r\n46\r\n37\r\n1.4\r\n1.3\r\nzoom\r\nzinfandel\r\nzen\r\nyoda\r\nxstandard\r\nxsql\r\nxinu\r\nx86_64\r\nwysiwyg\r\nwwwstats\r\nwork\r\nwombat\r\nwlw\r\nwin.ini\r\nvms\r\nvlsi\r\nvirus\r\nvector\r\nuser2\r\nuser1\r\nur\r\nunix\r\ntrac\r\ntopics\r\ntolkien\r\ntl\r\ntinman\r\nti\r\nth\r\nte\r\nta\r\nsymbols\r\nsun3\r\nsulu\r\nsteps\r\nstatus.php3\r\nstandart\r\nstandards\r\nstaff\r\nssl\r\nsr_YU\r\nsr\r\nsql.php3\r\nsponsors\r\nspock\r\nspiffyCal\r\nspiff\r\nspanish\r\nsneezy\r\nsmiles\r\nslideshow\r\nslices\r\nsl\r\nsk\r\nsi\r\nshtml.exe\r\nshrdlu\r\nshare\r\nsh\r\nsequent\r\nsei\r\nsanfran\r\nrti\r\nrte\r\nronin\r\nriacs\r\nremote\r\nquestion\r\npw\r\nptj\r\nps\r\nprotector\r\nproftpd\r\nprofile\r\nprinter\r\nportal\r\npm\r\npiranha\r\npic\r\nphpnuke\r\nphpBB2\r\nperso\r\nperf\r\npegasus\r\npds\r\npcat\r\npayments\r\nparts\r\npagers\r\noutlaw\r\noriginal\r\norca\r\nofficial\r\nnumber\r\nnt4\r\nnewsletter\r\nnet\r\nmy\r\nmultianswer\r\nmtxinu\r\nmr\r\nmod_quickicon\r\nmms\r\nml\r\nmips\r\nmaui\r\nmatrix\r\nmarlboro\r\nmainsail\r\nmain.cgi\r\nlover\r\nlogsaccess_log\r\nlink\r\nleo\r\nlehi3b15\r\nlaurent\r\nlabs\r\nla\r\nklingon\r\nkilroy\r\njellystone\r\nisos\r\ninternet\r\niis\r\nidea\r\nibmpc\r\nht\r\nhr\r\nhp\r\nhowitworks\r\nhi\r\nheads\r\nhe\r\nhardware\r\ngu\r\ngroups\r\ngq\r\ngonzo\r\ngold\r\ngnome\r\ngb\r\ngandalf\r\nga\r\nfruit\r\nfoobar\r\nfiles.pl\r\nfasttrack\r\nexcalibur\r\nevents\r\netaoin\r\nelephant\r\neinstein\r\neecs\r\neb\r\neaston\r\ndvd\r\ndv\r\ndopey\r\ndomcfg.nsf\r\ndocumentation\r\ndm\r\ndl\r\ndists\r\ndist\r\ndemos\r\ndbi\r\ndarkblue_orange\r\ncy_GB\r\ncy\r\ncube\r\ncsr\r\ncsee\r\ncs\r\ncourse\r\ncosmos\r\ncosmic\r\ncookie\r\nconvex\r\ncommerce\r\ncom_messages\r\ncom_menus\r\ncom_massmail\r\ncom_login\r\ncom_languages\r\ncom_installer\r\ncom_frontpage\r\ncom_cpanel\r\ncom_config\r\ncom_checkin\r\ncom_categories\r\ncom_cache\r\ncom_admin\r\ncom\r\ncodebrws.asp\r\ncm\r\ncls\r\ncic\r\ncatalog_type.asp\r\ncat\r\ncaliban\r\ncaip\r\nc6\r\nc5\r\nc4\r\nc3\r\nc2\r\nbugsbunny\r\nbs\r\nboeing\r\nbloomcounty\r\nblock\r\nbd\r\nbc\r\nbatcomputer\r\nbar\r\nba\r\nb9\r\nb8\r\nb7\r\nb6\r\nb4\r\nb3\r\nb2\r\nb1\r\nb0\r\naw\r\naudubon\r\natc\r\nasync\r\nast\r\narm\r\napl\r\nans\r\nam\r\nafp\r\nae\r\nadmentor\r\nab\r\naardvark\r\naa\r\na9\r\na8\r\na7\r\na5\r\na4\r\na3\r\na2\r\na1\r\n_vti_log\r\n_themes\r\n_packager\r\nWriter\r\nWINXP\r\nWIN2000\r\nView\r\nSYMBOLS.PRI\r\nPhotos\r\nPear\r\nPDG_Cart\r\nMessage\r\nLog\r\nINF\r\nHISTORY\r\nFlash\r\nFeed\r\nEntry\r\nDos\r\nDisk1\r\nData\r\nDOS\r\nClasses\r\nBuilder\r\nBooks\r\nApp\r\nAdministrator\r\n70\r\n69\r\n68\r\n67\r\n62\r\n61\r\n54\r\n52\r\n50\r\n41\r\n35\r\n33\r\n2009_Q4\r\n0816\r\n011\r\n0019\r\nxv\r\nwsc\r\nwpThumbnails\r\nwinxp\r\nwinnt40\r\nwinnt351\r\nwin9x\r\nwifi\r\nwei\r\nwaves\r\nvoice\r\nvm\r\nvim\r\nvideos\r\nurl\r\nunknown\r\num\r\ntulip\r\ntrw\r\ntranslate\r\ntransformations\r\ntop\r\ntmc\r\nthunderbird\r\ntheory\r\ntesseract\r\nterminal\r\ntalk\r\ntac\r\nsysadmin\r\nswift\r\nsurvey\r\nsuphp\r\nsupercache\r\nsub\r\nstylesheets\r\nstudio\r\nstructure\r\nss\r\nsquirrelspell\r\nspool\r\nspice\r\nspeech\r\nspamcop\r\nsolaris\r\nsoftware\r\nsoap\r\nsnapshots\r\nsilk\r\nsierra\r\nshans9\r\nshans8\r\nshans7\r\nshans6\r\nshans5\r\nshans4\r\nshans3\r\nshans2\r\nshans10\r\nshans1\r\nsentinel\r\nsent_subfolders\r\nsensor\r\nseit\r\nscr\r\nscm\r\nsample\r\ns3\r\nrvs_library\r\nruby\r\nrpm\r\nrouge\r\nroskilde\r\nrock\r\nreviews\r\nresource\r\nresearch\r\nrelnotes\r\nrecruit\r\nrecaptcha\r\nreading\r\nraw\r\nrav\r\npsd\r\nprime\r\npre\r\nportlet\r\npopup\r\npictures\r\npicasa\r\nphpmyadmin\r\nphototheque\r\nphotos\r\nphoenix\r\npersian\r\npdb\r\nparameter\r\npanel\r\npackaging\r\noxford\r\nos2\r\nodbc\r\nocean\r\nnwclient\r\nnss\r\nnote\r\nnlm\r\nnif\r\nnic\r\nnext\r\nnewmail\r\nmutt\r\nmsql\r\nmsi\r\nmp\r\nmosaic\r\nmodule1\r\nmods\r\nmodifier\r\nmod_unread\r\nmod_toolbar\r\nmod_title\r\nmod_submenu\r\nmod_status\r\nmod_popular\r\nmod_online\r\nmod_menu\r\nmod_logged\r\nmod_latest\r\nmn\r\nmicrosoft\r\nmessage_details\r\nmercury\r\nmenus\r\nmartin\r\nmarlin\r\nmaps\r\nmango\r\nmanager\r\nmailto\r\nmailman\r\nmail_fetch\r\nmag\r\nmac\r\nlv\r\nluna\r\nlucid\r\nlori\r\nlogos\r\nlistcommands\r\nlighter\r\nlight\r\nlibImaging\r\nlg_lexique\r\nlayouts\r\nlang_french\r\nkodak\r\nkm\r\njscript\r\njerome\r\njenkins\r\njazz\r\nis_IS\r\nintranet\r\ningres\r\ninfos\r\nimages_small\r\nid\r\nias\r\nhusky\r\nhl\r\nhighslide\r\nhf\r\nhead\r\nhardy\r\nhandler\r\ngwen\r\ngs\r\ngroup\r\ngross\r\ngr\r\ngift\r\ngetpot\r\ngeo\r\ngeneric\r\ngateway\r\ngap\r\ngallery2\r\ngalaxy\r\nfusion\r\nfunction\r\nft\r\nfreeradius\r\nframes\r\nfortune\r\nfood\r\nfolders\r\nflex\r\nfj\r\nfixtures\r\nff\r\nfe\r\nfd\r\nfc\r\nfb\r\nf2\r\nf1\r\nexperimental\r\nexclude\r\neurope\r\neunomia\r\neu\r\nespanol\r\nenrol\r\nems\r\nemerald\r\neigen\r\nef\r\nee\r\ned\r\neco\r\nec\r\nea\r\ne4\r\ne3\r\ne2\r\ne1\r\ne0\r\ndsl\r\ndevelopment\r\ndelete_move_next\r\ndc\r\ndavinci\r\nd9\r\nd8\r\nd7\r\nd6\r\nd5\r\nd4\r\nd3\r\nd2\r\nd1\r\nd0\r\ncz\r\ncustombuild\r\ncp\r\ncounter\r\ncount\r\ncontrol\r\nconn\r\ncomment\r\ncomctl\r\ncom_users\r\ncom_trash\r\ncom_templates\r\ncom_sections\r\ncom_plugins\r\ncom_modules\r\ncogito\r\ncobalt\r\ncn\r\ncj\r\ncirce\r\nci\r\nchs\r\nchips\r\nchimera\r\nchat\r\nchangelog\r\ncf\r\nce\r\ncdrom\r\ncck\r\ncb\r\nc9\r\nc8\r\nc7\r\nc1\r\nc0\r\nbulkquery\r\nbug_report\r\nbsd\r\nbrown\r\nbridge\r\nbrick\r\nbr\r\nbluewhite\r\nbio\r\nbf\r\nben\r\nbckgnd\r\nbard\r\nback\r\nb5\r\nawstats\r\navatar\r\nattachments\r\natari\r\nat\r\nasd\r\napt\r\napple\r\nams\r\namadeus\r\nalt\r\nalley\r\nalgor\r\naiken\r\nadobeair\r\nadara\r\nac\r\nabc\r\na6\r\n_vti_txt\r\n_fpclass\r\nYouTube\r\nWINNT\r\nTools\r\nTemplateCache\r\nTag\r\nTEMPLATE\r\nStrategy\r\nStat\r\nSpreadsheets\r\nSitemap\r\nServices\r\nSP2QFE\r\nSETUP\r\nRAID\r\nPdo\r\nPager\r\nPRIVACY\r\nOutputFilter\r\nNLS\r\nMysqli\r\nMusic\r\nModifier\r\nMath\r\nMS\r\nMIME\r\nLogs\r\nLanguage\r\nKind\r\nKOR\r\nJPN\r\nInputFilter\r\nHealth\r\nHELP\r\nHEADER.images\r\nGeo\r\nGdata\r\nGbase\r\nGapps\r\nFont\r\nFAQ\r\nExif\r\nDump\r\nDublinCore\r\nDocuments\r\nDefault\r\nDb\r\nDate\r\nDISK1\r\nContainer\r\nConsole\r\nCommon\r\nCaptcha\r\nCalendar\r\nCRYPTO\r\nCOMMON\r\nCHT\r\nCHS\r\nCAPTCHA\r\nAdmin\r\nAOL\r\n8.2\r\n8.1\r\n72\r\n71\r\n66\r\n65\r\n64\r\n63\r\n59\r\n58\r\n57\r\n56\r\n55\r\n53\r\n51\r\n49\r\n48\r\n47\r\n45\r\n43\r\n40\r\n39\r\n38\r\n36\r\n2009_Q3\r\n2009_Q2\r\n2009_Q1\r\n2001\r\n2.2\r\n1999\r\n1998\r\n1997\r\n1996\r\n1995\r\n1984\r\n1000\r\n.smileys\r\n.cvsignore\r\n0\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\na\r\nb\r\nc\r\nd\r\ne\r\nf\r\ng\r\nh\r\ni\r\nj\r\nk\r\nl\r\nm\r\nn\r\no\r\np\r\nq\r\nr\r\ns\r\nt\r\nu\r\nv\r\nw\r\nx\r\ny\r\nz\r\nA\r\nB\r\nC\r\nD\r\nE\r\nF\r\nG\r\nH\r\nI\r\nJ\r\nK\r\nL\r\nM\r\nN\r\nO\r\nP\r\nQ\r\nR\r\nS\r\nT\r\nU\r\nV\r\nW\r\nX\r\nY\r\nZ

</textarea>

<br>
<br>

<input type='submit' name='scan' value='Start Scan'>
<br>
</p><hr>";

if(isset($_POST['scan']))

{

function brute($url,$dir)
{


$urls = $url."/".$dir;

static $counter = 0 ;

$file_headers = @get_headers($urls);
if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    echo $counter++ ." <font color='red' face='arial' size='2'>[NOT FOUND] $urls Error 404</font> </br>";
} 

else if ($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found'){
    echo $counter++ ." <font color='red' face='arial' size='2'>[NOT FOUND] $urls Error 404 [Redirected]</font></br>";
flush();@ob_flush();
}

else if ($file_headers[0] == 'HTTP/1.0 302 Found'){
    echo $counter++ ." <font color='red' face='arial' size='2'>[NOT FOUND] $urls Error 302 </font></br>";
flush();@ob_flush();
}

else if ($file_headers[0] == 'HTTP/1.1 200'){
    echo $counter++ ." <font color='green' face='arial' size='2'><a href='$urls'>[FOUND] $urls</a> Code 200 OK</font> </br>";
flush();@ob_flush();
sleep(1);
}

elseif(eregi('404',$file_headers[0])){
echo $counter++ ." <font color='red' face='arial' size='2'>[NOT FOUND] $urls Error 404</font></br>";
flush();@ob_flush();
}

else {
echo $counter++ ." <font color='green' face='arial' size='2'><a href='$urls'>[FOUND] $urls</a> Code 200 OK</br> </font>";
flush();@ob_flush();
sleep(1);
}


}// end of function

 $url=$_POST["url"];
 $port=$_POST["port"];
 $dir= explode("\n", $_POST['dir']);


foreach($dir as $dirz) {
        $dirz = @trim($dirz);
      

echo brute($url,$dirz);


 }



} // scan end
    

?><hr><center>
<center><hr><font size=3>Unknown45 - 2021
</center>
