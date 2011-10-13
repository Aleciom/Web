<?
if ($_REQUEST["debug"] != "yes"){
  header('Content-Type: text/xml');
}

$query1 = file_get_contents(str_replace("{pid}",$pid,$COUCHDB_VIEWS["sci_serial"]));
$serial = json_decode($query1);

$doc = $serial->{rows}[0]->{doc};

$serial = Array();
$serial['title'] = $doc->{v100}[0]->{_};
$serial['formerTitle'] = $doc->{v610}[0]->{_};
$serial['shortTitle'] = $doc->{v150}[0]->{_};
$serial['shortTitleMedline'] = $doc->{v151}[0]->{_};
$serial['siglum'] = $doc->{v950}[0]->{_};
$serial['issn'] = $doc->{v400}[0]->{_};
$serial['issnAsId'] = $doc->{v935}[0]->{_};
$serial['issnType'] = $doc->{v35}[0]->{_};
$serial['subjects'] = Array();
$serial['publishers'] = Array();
$serial['mission'] = ""; //dict by language
$serial['address'] = Array();
$serial['email'] = $doc->{v64}[0]->{_};
$serial['submissionUrl'] = $doc->{v692}[0]->{_};

// ISSN AS ID
if ($serial['issnAsId'] == ""){
  $serial['issnAsId'] = $serial['issn'];  
}

// SUBJECT ARRAY
foreach($doc->{v441} as $subject){
  array_push($serial['subjects'],$subject->{_});
}

// PUBLISHER ARRAY
foreach($doc->{v480} as $publisher){
  array_push($serial['publishers'],$publisher->{_});
}
// MISSION BY LANGUAGE
$tmpMission = Array();
foreach($doc->{v901} as $mission){
  $tmpMission[$mission->{l}]=$mission->{_};
}
if (array_key_exists($lng,$tmpMission)){
  $serial['mission'] = $tmpMission[$lng];
}elseif (array_ley_exists($LANG,$tmpMission)){
  $serial['mission'] = $tmpMission[$LANG];
}else{
  $serial['mission'] = $tmpMission[0];
}

// ADDRESS ARRAY
foreach($doc->{v63} as $value){
  array_push($serial['address'],$value->{_});
}
// HISTORY ARRAY
if ($doc->{v50}[0]->{_} == "C") {
  if (array_key_exists("v51",$doc)){
    $serial['history'] = array();
    foreach ($doc->{v51} as $valueb)
      $history = array();
      $history['a'] = $valueb->{a}; //period start date
      $history['b'] = $valueb->{b}; //period status for available situation
      $history['c'] = $valueb->{c}; //period end date
      $history['d'] = $valueb->{d}; //period status for end situation
      array_push($serial['history'],$history);
  }
}

// PRESS RELEASES
if ($conf['services']['show_press_releases'] == 1){
  $query2 = file_get_contents(str_replace("{pid}",$pid,$COUCHDB_QUERIES["journal_pressreleases"]));
  $pressRelease = json_decode($query2);
  
  $docs = $pressRelease->{rows};

  $pressReleases = Array();
  foreach ($docs as $value) {
    $doc = $value->{doc};
    $pressRelease = Array();
    $pressRelease['pubDate'] = $doc->{v65}[0]->{_};
    $pressRelease['vol'] = $doc->{v31}[0]->{_};
    $pressRelease['num'] = $doc->{v32}[0]->{_};
    $pressRelease['sup'] = $doc->{v131}[0]->{_};
    $pressRelease['pid'] = $doc->{v880}[0]->{_};
    $pressRelease['prpid'] = $doc->{v880}[0]->{_};
    $pressRelease['title'] = "";

    //PR TITLE
    $tmpTitle = Array();
    foreach($doc->{v12} as $title){
      $tmpTitle[$title->{l}]=$title->{_};
    }
    
    if (array_key_exists($lng,$tmpTitle)){ //IDIOMA INTERFACE
      $pressRelease['title'] = $tmpTitle[$lng];
    }elseif (array_key_exists($LANG,$tmpTitle)){ //IDIOMA PADRAO
      $pressRelease['title'] = $tmpTitle[$LANG];
    }else{
      $pressRelease['title'] = $tmpTitle['en']; 
    }
    array_push($pressReleases,$pressRelease);
  }
}

?>
<SERIAL LASTUPDT="<?=date("Ymd hms")?>"> 
 <CONTROLINFO> 
  <DATETIME><?=date("Ymd hms")?></DATETIME> 
  <LANGUAGE><?= $lng?></LANGUAGE> 
  <STANDARD>iso</STANDARD> 
  <PAGE_NAME><?= $script?></PAGE_NAME> 
  <APP_NAME><?= $conf["SITE_INFO"]["APP_NAME"]?></APP_NAME> 
  <SITE_NAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></SITE_NAME>
  <ENABLE_STAT_LINK><?= $conf["LOG"]["ENABLE_STATISTICS_LINK"]?></ENABLE_STAT_LINK> 
  <ENABLE_CIT_REP_LINK><?= $conf["LOG"]["ENABLE_CITATION_REPORTS_LINK"]?></ENABLE_CIT_REP_LINK> 
  <ENABLE_COAUTH_REPORTS_LINK><?= $conf["LOG"]["ENABLE_COAUTH_REPORTS_LINK"]?></ENABLE_COAUTH_REPORTS_LINK> 
  <NO_SCI_SERIAL>no</NO_SCI_SERIAL> 
  <SCIELO_INFO> 
   <SERVER><?= $_SERVER['HTTP_HOST']?></SERVER> 
   <PATH_WXIS>/cgi-bin/wxis.exe</PATH_WXIS> 
   <PATH_CGI-BIN><?= $conf["PATH"]["PATH_CGI-BIN"]?></PATH_CGI-BIN> 
   <PATH_DATA><?= $conf["PATH"]["PATH_DATA"]?></PATH_DATA> 
   <PATH_SCRIPTS><?= $conf["PATH"]["PATH_SCRIPTS"]?></PATH_SCRIPTS> 
   <PATH_SERIAL_HTML><?= $conf["PATH"]["PATH_SERIAL_HTML"]?></PATH_SERIAL_HTML> 
   <PATH_XSL><?= $conf["PATH"]["PATH_XSL"]?></PATH_XSL> 
   <PATH_GENIMG><?= $conf["PATH"]["PATH_GENIMG"]?></PATH_GENIMG> 
   <PATH_SERIMG><?= $conf["PATH"]["PATH_SERIMG"]?></PATH_SERIMG> 
   <PATH_DATA_IAH>/iah/</PATH_DATA_IAH> 
   <PATH_CGI_IAH>iah/</PATH_CGI_IAH> 
   <PATH_HTDOCS><?= $conf["PATH"]["PATH_HTDOCS"]?></PATH_HTDOCS> 
   <STAT_SERVER_CITATION><?= $conf["SCIELO"]["STAT_SERVER_CITATION"]?></STAT_SERVER_CITATION> 
   <STAT_SERVER_COAUTH><?= $conf["SCIELO"]["STAT_SERVER_COAUTH"]?></STAT_SERVER_COAUTH> 
   <GOOGLE_CODE><?= $conf["LOG"]["GOOGLE_CODE"]?></GOOGLE_CODE> 
  </SCIELO_INFO> 

  <FUTURE_ISSUES>
    <FUTURE_ISSUE PID="" NUM="REVIEW" />
   </FUTURE_ISSUES>
   <ISSUES>
    <PREVIOUS PID="" VOL="44" NUM="8" />
    <CURRENT PID="" VOL="44" NUM="8" />
    <NEXT PID="" VOL="44" NUM="8" />
   </ISSUES>
 </CONTROLINFO>
 
  <TITLEGROUP>
  <TITLE><![CDATA[<?=$serial['title']?>]]></TITLE>
  <SHORTTITLE-MEDLINE><![CDATA[<?= $serial['shortTitleMedline']?>]]></SHORTTITLE-MEDLINE>
  <SIGLUM><?= $serial['siglum']?></SIGLUM>
  <?foreach ($serial['subjects'] as $value) {?>
    <SUBJECT><![CDATA[<?=$value?>]]></SUBJECT>
  <?}?>
 </TITLEGROUP> 

  <journal-status-history>
    <?if ($serial['history'][0]['d'] != ""){?>
      <current-status date="<?=$serial['history'][0]['c']?>" status="<?=$serial['history'][0]['d']?>"/> 
    <?}else{?>
      <current-status date="<?=$serial['history'][0]['a']?>" status="<?=$serial['history'][0]['b']?>"/> 
    <?}?>
    <periods>      
    <?foreach ($serial['history'] as $hist){?>
        <period> 
          <begin date="<?=$serial['history'][0]['a']?>" status="<?=$serial['history'][0]['b']?>"/> 
          <?if ($serial['history'][0]['d'] != ""){?>
            <end date="<?=$serial['history'][0]['c']?>" status="<?=$serial['history'][0]['d']?>"/>
          <?}?>
        </period> 
    <?}?>
    </periods> 
  </journal-status-history> 
  <CHANGESINFO>
    <FORMERTITLE>
      <TITLE><![CDATA[<?=$serial['formerTitle']?>]]></TITLE>
    </FORMERTITLE>
  </CHANGESINFO>
  <ISSN_AS_ID><?=$serial['issnAsId']?></ISSN_AS_ID>
  <ISSN><?=$serial['issn']?></ISSN>
  <TITLE_ISSN TYPE="<?=$serial['issnType']?>"><?=$serial['issnAsId']?></TITLE_ISSN>
  <PUBLISHERS>
    <?foreach ($serial['publishers'] as $value) {?>
      <PUBLISHER>
        <NAME><![CDATA[<?=$value?>]]></NAME>
      </PUBLISHER>
    <?}?>
  </PUBLISHERS>
  <MISSION><![CDATA[<?=$serial['mission']?>]]></MISSION>
  <COPYRIGHT YEAR="<?=date('Y')?>"><![CDATA[<?=$serial['title']?>]]></COPYRIGHT>
  <CONTACT>
    <LINES>
      <?foreach ($serial['address'] as $value){?>
      <LINE><![CDATA[<?=$value?>]]></LINE>
      <?}?>
    </LINES>
    <EMAILS>
      <EMAIL>bjournal@fmrp.usp.br</EMAIL>
    </EMAILS>
 </CONTACT>
  <?if ($serial['submissionUrl'] != "") {?>
    <link type="online_submission"><![CDATA[<?=$serial['submissionUrl']?>]]></link>
  <?}?>
  <?if ($conf['services']['show_press_releases'] == 1){?>
    <PRESSRELEASE>
      <?foreach ($pressReleases as $doc){?>
        <article data="<?=$doc['pubDate']?>" vol="<?=$doc['vol']?>" num="<?=$doc['num']?>" sup="<?=$doc['sup']?>" pid="<?=$doc['pid']?>" prpid="<?=$doc['prpid']?>">
          <title lang="en"><![CDATA[<?=$doc['title']?>]]></title>
        </article>
        <?}?>
    </PRESSRELEASE>
  <?}?>
</SERIAL>

<!--
<SERIAL LASTUPDT="20110920">
<FUTURE_ISSUES>
<FUTURE_ISSUE PID="0100-879X20110075" NUM="REVIEW"/>
</FUTURE_ISSUES>
<ISSUES>
   <PREVIOUS PID="0100-879X20110008" VOL="44" NUM="8" />
   <CURRENT PID="0100-879X20110009" VOL="44" NUM="9" />
   <NEXT PID="0100-879X20110075" NUM="REVIEW" />
  </ISSUES>
 </CONTROLINFO>

 <TITLEGROUP>
  <TITLE><![CDATA[Brazilian Journal of Medical and Biological Research]]></TITLE>
  <SHORTTITLE><![CDATA[Braz J Med Biol Res]]></SHORTTITLE>
  <SHORTTITLE-MEDLINE><![CDATA[Braz J Med Biol Res]]></SHORTTITLE-MEDLINE>
  <SIGLUM>bjmbr</SIGLUM>
<SUBJECT><![CDATA[BIOLOGICAL SCIENCES]]></SUBJECT>
<SUBJECT><![CDATA[HEALTH SCIENCES]]></SUBJECT>
 </TITLEGROUP>

  <journal-status-history>
    <current-status date="19970424" status="C"/>
    <periods>
    <period>
      <begin date="19970424" status="C"/>
</period>
</periods>
  </journal-status-history>
 <CHANGESINFO>
  <FORMERTITLE>
   <TITLE><![CDATA[Revista brasileira de pesquisas médicas e biológicas
]]></TITLE>
  </FORMERTITLE>
 </CHANGESINFO>

 <ISSN_AS_ID>0100-879X</ISSN_AS_ID>

 <ISSN>0100-879X</ISSN>

 <TITLE_ISSN TYPE="ONLIN">1678-4510</TITLE_ISSN>

 <PUBLISHERS>
  <PUBLISHER>
   <NAME><![CDATA[Associação Brasileira de Divulgação Científica]]></NAME>
  </PUBLISHER>
 </PUBLISHERS>

 <MISSION><![CDATA[To publish the results of original research which contribute significantly to knowledge in medical and biological sciences]]></MISSION>

 <COPYRIGHT YEAR="2011"><![CDATA[Brazilian Journal of Medical and Biological Research]]></COPYRIGHT>

 <CONTACT>
  <LINES>
   <LINE><![CDATA[Av. Bandeirantes, 3900]]></LINE>
   <LINE><![CDATA[14049-900 Ribeirão Preto SP Brazil]]></LINE>
   <LINE><![CDATA[Tel. / Fax: +55 16 3633-3825]]></LINE>
  </LINES>
  <EMAILS>
   <EMAIL>bjournal@fmrp.usp.br</EMAIL>
  </EMAILS>
 </CONTACT>

<link type="online_submission"><![CDATA[http://submission.scielo.br/index.php/bjmbr/login]]></link>
<PRESSRELEASE>
<article data="20110000" vol="41" num="1" sup="" pid="S0103-84782011000100014" prpid="S0103-84782011012300002">
<title lang="en"><![CDATA[MicroRNAs and its role in embryonic development]]></title></article>
<article data="20110000" vol="41" num="1" sup="" pid="S0103-84782011000100013" prpid="S0103-84782011012300001">
<title lang="en"><![CDATA[Glyphosate influence on nitrogen, manganese, iron, copper and zinc nutritional efficiency in glyphosate resistant soybean]]></title></article>
<article data="20110800" vol="41" num="8" sup="" pid="S0103-84782011000800024" prpid="S0103-84782011010800002">
<title lang="en"><![CDATA[Susceptibility of Rhipicephalus (Boophilus) microplus to acaricides in Mato Grosso do Sul, Brazil]]></title></article>
<article data="20110800" vol="41" num="8" sup="" pid="S0103-84782011000800005" prpid="S0103-84782011010800001">
<title lang="en"><![CDATA[Fertilizer management in areas with soil residual of imidazolinone herbicides: effects on algae growth and irrigated rice yield]]></title></article>
<article data="20110700" vol="41" num="7" sup="" pid="S0103-84782011000700017" prpid="S0103-84782011010700002">
<title lang="en"><![CDATA[Isolation, fractionation and in vivo toxicological evaluation of sulfated polysaccharides from Hypnea musciformis]]></title></article>
<article data="20110700" vol="41" num="7" sup="" pid="S0103-84782011000700011" prpid="S0103-84782011010700001">
<title lang="en"><![CDATA[Principal components as predictor variables in digital mapping of soil classes]]></title></article>
<article data="20110600" vol="41" num="6" sup="" pid="S0103-84782011000600011" prpid="S0103-84782011010600002">
<title lang="en"><![CDATA[Reproductive phenology of red pitaya in Lavras, MG, Brazil]]></title></article>
<article data="20110600" vol="41" num="6" sup="" pid="S0103-84782011000600004" prpid="S0103-84782011010600001">
<title lang="en"><![CDATA[Selectivity of insecticides used in the coffee crop to larvae of Cryptolaemus montrouzieri Mulsant]]></title></article>
<article data="20110500" vol="41" num="5" sup="" pid="S0103-84782011000500008" prpid="S0103-84782011010500002">
<title lang="en"><![CDATA[Growth of red pitaya with organic fertilizer and calcified seaweed]]></title></article>
<article data="20110500" vol="41" num="5" sup="" pid="S0103-84782011000500022" prpid="S0103-84782011010500001">
<title lang="en"><![CDATA[Birth of normal calves after artificial insemination using cryopreserved spermatozoa obtained from refrigerated epididymides of death bovine]]></title></article>
<article data="20110300" vol="41" num="3" sup="" pid="S0103-84782011000300006" prpid="S0103-84782011010300002">
<title lang="en"><![CDATA[Flower induction of acid lime trees 'Tahiti' subjected to low temperature]]></title></article>
<article data="20110300" vol="41" num="3" sup="" pid="S0103-84782011000300016" prpid="S0103-84782011010300001">
<title lang="en"><![CDATA[Serum cortisol, glycemic response and insulin secretion in healthy horses exposed to normobaric hypoxia sessions]]></title></article>
<article data="20110200" vol="41" num="2" sup="" pid="S0103-84782011000200024" prpid="S0103-84782011010200002">
<title lang="en"><![CDATA[Mollicutes isolation and PCR on ovine vaginal mucous and its association with reproductive problems in Piedade, SP, Brazil]]></title></article>
<article data="20110200" vol="41" num="2" sup="" pid="S0103-84782011000200021" prpid="S0103-84782011010200001">
<title lang="en"><![CDATA[Systemic and local antibodies induced by an experimental inactivated vaccine against bovine herpesvirus type 1]]></title></article>
<article data="20101200" vol="40" num="12" sup="" pid="S0103-84782010001200030" prpid="S0103-84782010012200001">
<title lang="en"><![CDATA[GnRH control during bovine postpartum anestrous]]></title></article>
<article data="20101100" vol="40" num="11" sup="" pid="S0103-84782010001100012" prpid="S0103-84782010012100002">
<title lang="en"><![CDATA[Contribution of oblique projections in small animals myelography to the localization of spinal lesions caused by intervertebral disc degeneration]]></title></article>
<article data="20101100" vol="40" num="11" sup="" pid="S0103-84782010001100006" prpid="S0103-84782010012100001">
<title lang="en"><![CDATA[Garlic extract improves budbreak of the 'Niagara Rosada' grapevines on sub-tropical regions]]></title></article>
<article data="20101000" vol="40" num="10" sup="" pid="S0103-84782010001000013" prpid="S0103-84782010012000002">
<title lang="en"><![CDATA[Interlaboratorial validation of the fluorescence polarization assay for the serodiagnosis of bovine brucellosis]]></title></article>
<article data="20101000" vol="40" num="10" sup="" pid="S0103-84782010001000008" prpid="S0103-84782010012000001">
<title lang="en"><![CDATA[Comparison of methods for digital soil mapping using a geographical information system]]></title></article>
<article data="20100900" vol="40" num="9" sup="" pid="S0103-84782010000900024" prpid="S0103-84782010011900002">
<title lang="en"><![CDATA[The gamma irradiation on the cooking time and absorption of water in soybean grains with and without lipoxygenase]]></title></article>
</PRESSRELEASE>
</SERIAL>
-->
