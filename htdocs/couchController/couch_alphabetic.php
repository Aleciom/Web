<?
die();
if ($_REQUEST["debug"] != "yes"){
  header('Content-Type: text/xml');
}

//$query1 = file_get_contents($COUCHDB_VIEWS["sci_alphabetic"]);
//$titles = json_decode($query1);
?>
<SERIALLIST> 
 <CONTROLINFO> 
  <DATETIME>20110930 142358 5 272</DATETIME> 
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
 </CONTROLINFO> 
 
 <SCIELOINFOGROUP> 
  <SITE_NAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></SITE_NAME> 
  <ORGANIZATION><?= $conf["SITE_INFO"]["SITE_AUTHOR"]?></ORGANIZATION> 
  <ADDRESS> 
   <ADDRESS_1><?= $conf["SITE_INFO"]["ADDRESS_1"]?></ADDRESS_1> 
   <ADDRESS_2><?= $conf["SITE_INFO"]["ADDRESS_2"]?></ADDRESS_2> 
   <COUNTRY><?= $conf["SITE_INFO"]["COUNTRY"]?></COUNTRY> 
  </ADDRESS> 
  <PHONE><?= $conf["SITE_INFO"]["PHONE_NUMBER"]?></PHONE> 
  <FAX><?= $conf["SITE_INFO"]["FAX_NUMBER"]?></FAX> 
  <EMAIL><?= $conf["SITE_INFO"]["E_MAIL"]?></EMAIL> 
 </SCIELOINFOGROUP> 

 <COPYRIGHT YEAR="<?date("Y")?>"> 
  <OWNER><?= $conf["SITE_INFO"]["SHORT_NAME"]?></OWNER> 
  <OWNER-FULLNAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></OWNER-FULLNAME> 
  <CONTACT><?= $conf["SITE_INFO"]["E_MAIL"]?></CONTACT> 
 </COPYRIGHT> 
 
 </SERIALLIST>
<!--
<LIST> 
 
  <SERIAL QTYISS="14"> 
   <TITLE ISSN="0102-6720"> 
    <![CDATA[ABCD. Arquivos Brasileiros de Cirurgia Digestiva (São Paulo)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="33"> 
   <TITLE ISSN="0044-5967"> 
    <![CDATA[Acta Amazonica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040817" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040817" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="76"> 
   <TITLE ISSN="0102-3306"> 
    <![CDATA[Acta Botanica Brasilica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010803" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010803" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="101"> 
   <TITLE ISSN="0102-8650"> 
    <![CDATA[Acta Cirurgica Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19980428" status="C"/> 
    <periods> 
    <period> 
      <begin date="19980428" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="2179-975X"> 
    <![CDATA[Acta Limnologica Brasiliensia (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110400" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110400" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="54"> 
   <TITLE ISSN="1413-7852"> 
    <![CDATA[Acta Ortopédica Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030131" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030131" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="0103-2100"> 
    <![CDATA[Acta Paulista de Enfermagem]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070704" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070704" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="1807-8621"> 
    <![CDATA[Acta Scientiarum. Agronomy (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110300" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110300" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="1516-1498"> 
    <![CDATA[Ágora: Estudos em Teoria Psicanalítica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050927" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050927" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="1517-106X"> 
    <![CDATA[Alea : Estudos Neolatinos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040630" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040630" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="1414-753X"> 
    <![CDATA[Ambiente & sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030930" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030930" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="1678-8621"> 
    <![CDATA[Ambiente Construído (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="56"> 
   <TITLE ISSN="0365-0596"> 
    <![CDATA[Anais Brasileiros de Dermatologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030731" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030731" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="47"> 
   <TITLE ISSN="0001-3765"> 
    <![CDATA[Anais da Academia Brasileira de Ciências]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000721" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000721" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="0071-1276"> 
    <![CDATA[Anais da Escola Superior de Agricultura Luiz de Queiroz]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090519" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="0103-9016"><![CDATA[Scientia Agricola]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20090515" status="C"/> 
      <end date="20090519" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="15"> 
   <TITLE ISSN="0301-8059"> 
    <![CDATA[Anais da Sociedade Entomológica do Brasil]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1519-566X"><![CDATA[Neotropical Entomology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="00000000" status="C"/> 
      <end date="20000000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="0101-4714"> 
    <![CDATA[Anais do Museu Paulista: História e Cultura Material]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070731" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070731" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="77"> 
   <TITLE ISSN="0102-0935"> 
    <![CDATA[Arquivo Brasileiro de Medicina Veterinária e Zootecnia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000609" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000609" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="219"> 
   <TITLE ISSN="0066-782X"> 
    <![CDATA[Arquivos Brasileiros de Cardiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000321" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000321" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="90"> 
   <TITLE ISSN="0004-2730"> 
    <![CDATA[Arquivos Brasileiros de Endocrinologia & Metabologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010625" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010625" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="71"> 
   <TITLE ISSN="0004-2749"> 
    <![CDATA[Arquivos Brasileiros de Oftalmologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020702" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020702" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="48"> 
   <TITLE ISSN="0004-2803"> 
    <![CDATA[Arquivos de Gastroenterologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20011120" status="C"/> 
    <periods> 
    <period> 
      <begin date="20011120" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="133"> 
   <TITLE ISSN="0004-282X"> 
    <![CDATA[Arquivos de Neuro-Psiquiatria]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000321" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000321" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="5"> 
   <TITLE ISSN="1809-4872"> 
    <![CDATA[Arquivos Internacionais de Otorrinolaringologia (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110100" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110100" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="15"> 
   <TITLE ISSN="1678-5320"> 
    <![CDATA[ARS (São Paulo)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="14"> 
   <TITLE ISSN="1414-4077"> 
    <![CDATA[Avaliação: Revista da Avaliação da Educação Superior (Campinas)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071206" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071206" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="1807-7692"> 
    <![CDATA[BAR. Brazilian Administration Review]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100100" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100100" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="1676-0603"> 
    <![CDATA[Biota Neotropica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060413" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060413" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="2"> 
   <TITLE ISSN="1982-2170"> 
    <![CDATA[Boletim de Ciências Geodésicas (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110800" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110800" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="1981-8122"> 
    <![CDATA[Boletim do Museu Paraense Emílio Goeldi. Ciências Humanas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="204"> 
   <TITLE ISSN="0006-8705"> 
    <![CDATA[Bragantia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981207" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981207" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="79"> 
   <TITLE ISSN="1516-8913"> 
    <![CDATA[Brazilian Archives of Biology and Technology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010913" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010913" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="38"> 
   <TITLE ISSN="0103-6440"> 
    <![CDATA[Brazilian Dental Journal ]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030319" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030319" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="51"> 
   <TITLE ISSN="1519-6984"> 
    <![CDATA[Brazilian Journal of Biology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20011024" status="C"/> 
    <periods> 
    <period> 
      <begin date="20011024" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="59"> 
   <TITLE ISSN="0104-6632"> 
    <![CDATA[Brazilian Journal of Chemical Engineering]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970425" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970425" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="0100-8455"> 
    <![CDATA[Brazilian Journal of Genetics]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19971200" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="5715-4757"><![CDATA[Genetics and Molecular Biology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19970400" status="C"/> 
      <end date="19971200" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="66"> 
   <TITLE ISSN="1413-8670"> 
    <![CDATA[Brazilian Journal of Infectious Diseases]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010730" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010730" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="177"> 
   <TITLE ISSN="0100-879X"> 
    <![CDATA[Brazilian Journal of Medical and Biological Research]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970424" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970424" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="46"> 
   <TITLE ISSN="1517-8382"> 
    <![CDATA[Brazilian Journal of Microbiology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000811" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000811" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="56"> 
   <TITLE ISSN="1679-8759"> 
    <![CDATA[Brazilian Journal of Oceanography]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071009" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071009" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="14"> 
   <TITLE ISSN="1808-8694"> 
    <![CDATA[Brazilian Journal of Otorhinolaryngology (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090700" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090700" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1984-8250"> 
    <![CDATA[Brazilian Journal of Pharmaceutical Sciences]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090900" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090900" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="73"> 
   <TITLE ISSN="3103-9733"> 
    <![CDATA[Brazilian Journal of Physics]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110708" status="S"/> 
    <periods> 
    <period> 
      <begin date="19970425" status="C"/> 
      <end date="20110708" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="1677-0420"> 
    <![CDATA[Brazilian Journal of Plant Physiology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20021023" status="C"/> 
    <periods> 
    <period> 
      <begin date="20021023" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="45"> 
   <TITLE ISSN="6413-9596"> 
    <![CDATA[Brazilian Journal of Veterinary Research and Animal Science]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050100" status="S"/> 
    <periods> 
    <period> 
      <begin date="19980000" status="C"/> 
      <end date="20050100" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="36"> 
   <TITLE ISSN="1806-8324"> 
    <![CDATA[Brazilian Oral Research]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040920" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040920" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="0103-4979"> 
    <![CDATA[Caderno CRH]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080826" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080826" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="42"> 
   <TITLE ISSN="0101-3262"> 
    <![CDATA[Cadernos CEDES]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990419" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990419" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="37"> 
   <TITLE ISSN="0100-1574"> 
    <![CDATA[Cadernos de Pesquisa]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030220" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030220" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="198"> 
   <TITLE ISSN="0102-311X"> 
    <![CDATA[Cadernos de Saúde Pública]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990702" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990702" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1679-3951"> 
    <![CDATA[Cadernos EBAPE.BR]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20091000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20091000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="20"> 
   <TITLE ISSN="0104-8333"> 
    <![CDATA[Cadernos Pagu]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20051005" status="C"/> 
    <periods> 
    <period> 
      <begin date="20051005" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="56"> 
   <TITLE ISSN="0366-6913"> 
    <![CDATA[Cerâmica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990901" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990901" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="26"> 
   <TITLE ISSN="1516-7313"> 
    <![CDATA[Ciência & Educação (Bauru)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070911" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070911" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="69"> 
   <TITLE ISSN="1413-8123"> 
    <![CDATA[Ciência & Saúde Coletiva]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020111" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020111" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="41"> 
   <TITLE ISSN="0100-1965"> 
    <![CDATA[Ciência da Informação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090900" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090900" status="C"/> 
</period> 
    <period> 
      <begin date="19980430" status="C"/> 
      <end date="20080800" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="54"> 
   <TITLE ISSN="1413-7054"> 
    <![CDATA[Ciência e Agrotecnologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070517" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070517" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="55"> 
   <TITLE ISSN="0101-2061"> 
    <![CDATA[Ciência e Tecnologia de Alimentos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="104"> 
   <TITLE ISSN="0103-8478"> 
    <![CDATA[Ciência Rural]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020425" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020425" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="58"> 
   <TITLE ISSN="1807-5932"> 
    <![CDATA[Clinics]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050215" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050215" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1808-1851"> 
    <![CDATA[Coluna/Columna]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100119" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100119" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="1807-0302"> 
    <![CDATA[Computational & Applied Mathematics]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040713" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040713" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="20"> 
   <TITLE ISSN="0102-8529"> 
    <![CDATA[Contexto Internacional]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070809" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070809" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1984-7033"> 
    <![CDATA[Crop Breeding and Applied Biotechnology (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110400" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110400" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="57"> 
   <TITLE ISSN="0011-5258"> 
    <![CDATA[Dados - Revista de Ciências Sociais]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970425" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970425" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="41"> 
   <TITLE ISSN="0102-4450"> 
    <![CDATA[DELTA: Documentação de Estudos em Lingüística Teórica e Aplicada]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="9"> 
   <TITLE ISSN="2176-9451"> 
    <![CDATA[Dental Press Journal of Orthodontics]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="35"> 
   <TITLE ISSN="0100-4670"> 
    <![CDATA[Eclética Química]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000414" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000414" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="1413-8050"> 
    <![CDATA[Economia Aplicada]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060127" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060127" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="15"> 
   <TITLE ISSN="0104-0618"> 
    <![CDATA[Economia e Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071009" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071009" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="58"> 
   <TITLE ISSN="0101-7330"> 
    <![CDATA[Educação & Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990414" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990414" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="1517-9702"> 
    <![CDATA[Educação e Pesquisa]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20011105" status="C"/> 
    <periods> 
    <period> 
      <begin date="20011105" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="11"> 
   <TITLE ISSN="0102-4698"> 
    <![CDATA[Educação em Revista]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080102" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080102" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="0104-4060"> 
    <![CDATA[Educar em Revista]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070521" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070521" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="29"> 
   <TITLE ISSN="0100-6916"> 
    <![CDATA[Engenharia Agrícola]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050128" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050128" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="1413-4152"> 
    <![CDATA[Engenharia Sanitaria e Ambiental ]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050715" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050715" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="27"> 
   <TITLE ISSN="0104-4036"> 
    <![CDATA[Ensaio: Avaliação e Políticas Públicas em Educação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050818" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050818" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="1328-0381"> 
    <![CDATA[Entomología y Vectores]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050000" status="D"/> 
    <periods> 
    <period> 
      <begin date="20040000" status="C"/> 
      <end date="20050000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="1414-8145"> 
    <![CDATA[Escola Anna Nery]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100600" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100600" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="9"> 
   <TITLE ISSN="X101-546X"> 
    <![CDATA[Estudos Afro-Asiáticos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040100" status="S"/> 
    <periods> 
    <period> 
      <begin date="20000000" status="C"/> 
      <end date="20040100" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="72"> 
   <TITLE ISSN="0103-4014"> 
    <![CDATA[Estudos Avançados]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040205" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040205" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="0103-166X"> 
    <![CDATA[Estudos de Psicologia (Campinas)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070705" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070705" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="38"> 
   <TITLE ISSN="1413-294X"> 
    <![CDATA[Estudos de Psicologia (Natal)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010330" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010330" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="33"> 
   <TITLE ISSN="0101-4161"> 
    <![CDATA[Estudos Econômicos (São Paulo)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060825" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060825" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="5"> 
   <TITLE ISSN="0103-2186"> 
    <![CDATA[Estudos Históricos (Rio de Janeiro)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100712" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100712" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="0103-5150"> 
    <![CDATA[Fisioterapia em Movimento (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0100-4158"> 
    <![CDATA[Fitopatologia Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071200" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1982-5676"><![CDATA[Tropical Plant Pathology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20010824" status="C"/> 
      <end date="20071200" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1984-0292"> 
    <![CDATA[Fractal : Revista de Psicologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20081028" status="C"/> 
    <periods> 
    <period> 
      <begin date="20081028" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="56"> 
   <TITLE ISSN="1415-4757"> 
    <![CDATA[Genetics and Molecular Biology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981216" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981216" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="55"> 
   <TITLE ISSN="0104-530X"> 
    <![CDATA[Gestão & Produção]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20021219" status="C"/> 
    <periods> 
    <period> 
      <begin date="20021219" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="0101-9074"> 
    <![CDATA[História (São Paulo)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060202" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060202" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="71"> 
   <TITLE ISSN="0104-5970"> 
    <![CDATA[História, Ciências, Saúde-Manguinhos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000627" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000627" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="0104-7183"> 
    <![CDATA[Horizontes Antropológicos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040128" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040128" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="44"> 
   <TITLE ISSN="0102-0536"> 
    <![CDATA[Horticultura Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030402" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030402" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0073-4721"> 
    <![CDATA[Iheringia. Série Zoologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020624" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020624" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1518-7012"> 
    <![CDATA[Interações (Campo Grande)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070628" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070628" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="38"> 
   <TITLE ISSN="1414-3283"> 
    <![CDATA[Interface - Comunicação, Saúde, Educação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050830" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050830" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="51"> 
   <TITLE ISSN="1677-5538"> 
    <![CDATA[International braz j urol]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030905" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030905" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="20"> 
   <TITLE ISSN="1807-1775"> 
    <![CDATA[JISTEM - Journal of Information Systems and Technology Management (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101100" status="C"/> 
    <periods> 
    <period> 
      <begin date="20101100" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="0101-2800"> 
    <![CDATA[Jornal Brasileiro de Nefrologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100400" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100400" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="55"> 
   <TITLE ISSN="1676-2444"> 
    <![CDATA[Jornal Brasileiro de Patologia e Medicina Laboratorial]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020715" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020715" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="70"> 
   <TITLE ISSN="1806-3713"> 
    <![CDATA[Jornal Brasileiro de Pneumologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040503" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040503" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="0047-2085"> 
    <![CDATA[Jornal Brasileiro de Psiquiatria]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070627" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070627" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="2"> 
   <TITLE ISSN="2179-6491"> 
    <![CDATA[Jornal da Sociedade Brasileira de Fonoaudiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="77"> 
   <TITLE ISSN="0021-7557"> 
    <![CDATA[Jornal de Pediatria]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020719" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020719" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="0102-3586"> 
    <![CDATA[Jornal de Pneumologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1306-3713"><![CDATA[Jornal Brasileiro de Pneumologia]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19990000" status="C"/> 
      <end date="20040000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="1677-5449"> 
    <![CDATA[Jornal Vascular Brasileiro]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060417" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060417" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="49"> 
   <TITLE ISSN="1678-7757"> 
    <![CDATA[Journal of Applied Oral Science]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040604" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040604" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="26"> 
   <TITLE ISSN="1676-2649"> 
    <![CDATA[Journal of Epilepsy and Clinical Neurophysiology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060731" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060731" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="108"> 
   <TITLE ISSN="0103-5053"> 
    <![CDATA[Journal of the Brazilian Chemical Society]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970425" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970425" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="39"> 
   <TITLE ISSN="0104-6500"> 
    <![CDATA[Journal of the Brazilian Computer Society]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101129" status="D"/> 
    <periods> 
    <period> 
      <begin date="20080000" status="C"/> 
      <end date="20101129" status="D"/> 
</period> 
    <period> 
      <begin date="19970425" status="C"/> 
      <end date="20050000" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="14"> 
   <TITLE ISSN="0100-7386"> 
    <![CDATA[Journal of the Brazilian Society of Mechanical Sciences]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1678-5878"><![CDATA[Journal of the Brazilian Society of Mechanical Sciences and Engineering]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19990000" status="C"/> 
      <end date="20030000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="35"> 
   <TITLE ISSN="1678-5878"> 
    <![CDATA[Journal of the Brazilian Society of Mechanical Sciences and Engineering]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040318" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040318" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="0104-7930"> 
    <![CDATA[Journal of Venomous Animals and Toxins]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1678-9199"><![CDATA[Journal of Venomous Animals and Toxins including Tropical Diseases]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19981126" status="C"/> 
      <end date="20020000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="32"> 
   <TITLE ISSN="1678-9199"> 
    <![CDATA[Journal of Venomous Animals and Toxins including Tropical Diseases]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20031203" status="C"/> 
    <periods> 
    <period> 
      <begin date="20031203" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="19"> 
   <TITLE ISSN="0100-512X"> 
    <![CDATA[Kriterion: Revista de Filosofia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060203" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060203" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="2"> 
   <TITLE ISSN="1679-7825"> 
    <![CDATA[Latin American Journal of Solids and Structures (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110700" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110700" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1518-7632"> 
    <![CDATA[Linguagem em (Dis)curso (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101200" status="C"/> 
    <periods> 
    <period> 
      <begin date="20101200" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="78"> 
   <TITLE ISSN="0102-6445"> 
    <![CDATA[Lua Nova: Revista de Cultura e Política]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020719" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020719" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="30"> 
   <TITLE ISSN="0104-9313"> 
    <![CDATA[Mana - Estudos de Antropologia Social]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000526" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000526" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="19"> 
   <TITLE ISSN="1517-7076"> 
    <![CDATA[Matéria (Rio de Janeiro)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070301" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070301" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="50"> 
   <TITLE ISSN="1516-1439"> 
    <![CDATA[Materials Research]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000117" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000117" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="405"> 
   <TITLE ISSN="0074-0276"> 
    <![CDATA[Memórias do Instituto Oswaldo Cruz]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970424" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970424" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1980-6574"> 
    <![CDATA[Motriz: Revista de Educação Física (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="58"> 
   <TITLE ISSN="1519-566X"> 
    <![CDATA[Neotropical Entomology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020506" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020506" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="32"> 
   <TITLE ISSN="1679-6225"> 
    <![CDATA[Neotropical Ichthyology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070611" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070611" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="0103-6351"> 
    <![CDATA[Nova Economia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20061002" status="C"/> 
    <periods> 
    <period> 
      <begin date="20061002" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="19"> 
   <TITLE ISSN="0101-3300"> 
    <![CDATA[Novos Estudos - CEBRAP]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060210" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060210" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="0104-6276"> 
    <![CDATA[Opinião Pública]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030317" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030317" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="35"> 
   <TITLE ISSN="0103-863X"> 
    <![CDATA[Paidéia (Ribeirão Preto)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071029" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071029" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="2"> 
   <TITLE ISSN="1982-8837"> 
    <![CDATA[Pandaemonium Germanicum (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110800" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110800" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="241"> 
   <TITLE ISSN="0031-1049"> 
    <![CDATA[Papéis Avulsos de Zoologia (São Paulo)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030108" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030108" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="1517-7599"> 
    <![CDATA[Per Musi]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110100" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110100" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="1413-9936"> 
    <![CDATA[Perspectivas em Ciência da Informação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20061205" status="C"/> 
    <periods> 
    <period> 
      <begin date="20061205" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="151"> 
   <TITLE ISSN="0100-204X"> 
    <![CDATA[Pesquisa Agropecuária Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010213" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010213" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="1517-7491"> 
    <![CDATA[Pesquisa Odontológica Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1806-8324"><![CDATA[Brazilian Oral Research]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20000000" status="C"/> 
      <end date="20040000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="33"> 
   <TITLE ISSN="0101-7438"> 
    <![CDATA[Pesquisa Operacional]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020409" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020409" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="91"> 
   <TITLE ISSN="0100-736X"> 
    <![CDATA[Pesquisa Veterinária Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0103-7331"> 
    <![CDATA[Physis: Revista de Saúde Coletiva]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20051020" status="C"/> 
    <periods> 
    <period> 
      <begin date="20051020" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="58"> 
   <TITLE ISSN="0100-8358"> 
    <![CDATA[Planta Daninha]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040420" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040420" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="60"> 
   <TITLE ISSN="0104-1428"> 
    <![CDATA[Polímeros - Ciência e Tecnologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20001026" status="C"/> 
    <periods> 
    <period> 
      <begin date="20001026" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="21"> 
   <TITLE ISSN="0104-5687"> 
    <![CDATA[Pró-Fono Revista de Atualização Científica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="2179-6491"><![CDATA[Jornal da Sociedade Brasileira de Fonoaudiologia]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20060307" status="C"/> 
      <end date="20110500" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="11"> 
   <TITLE ISSN="0103-7307"> 
    <![CDATA[Pro-Posições]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080902" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080902" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="53"> 
   <TITLE ISSN="0103-6513"> 
    <![CDATA[Produção]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060313" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060313" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="7"> 
   <TITLE ISSN="1413-8271"> 
    <![CDATA[Psico-USF (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090900" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090900" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="30"> 
   <TITLE ISSN="0102-7182"> 
    <![CDATA[Psicologia & Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030805" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030805" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="0103-5665"> 
    <![CDATA[Psicologia Clínica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20061005" status="C"/> 
    <periods> 
    <period> 
      <begin date="20061005" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="1413-7372"> 
    <![CDATA[Psicologia em Estudo]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040108" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040108" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="30"> 
   <TITLE ISSN="1413-8557"> 
    <![CDATA[Psicologia Escolar e Educacional (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101006" status="C"/> 
    <periods> 
    <period> 
      <begin date="20101006" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0103-6564"> 
    <![CDATA[Psicologia USP]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100800" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100800" status="C"/> 
</period> 
    <period> 
      <begin date="19981016" status="C"/> 
      <end date="20050100" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="1414-9893"> 
    <![CDATA[Psicologia: Ciência e Profissão]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110600" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110600" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="44"> 
   <TITLE ISSN="0102-7972"> 
    <![CDATA[Psicologia: Reflexão e Crítica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990622" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990622" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="41"> 
   <TITLE ISSN="0102-3772"> 
    <![CDATA[Psicologia: Teoria e Pesquisa]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010510" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010510" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="5"> 
   <TITLE ISSN="1983-3288"> 
    <![CDATA[Psychology & Neuroscience (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101200" status="C"/> 
    <periods> 
    <period> 
      <begin date="20101200" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="106"> 
   <TITLE ISSN="0100-4042"> 
    <![CDATA[Química Nova]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000126" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000126" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="64"> 
   <TITLE ISSN="0100-3984"> 
    <![CDATA[Radiologia Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020214" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020214" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="18"> 
   <TITLE ISSN="8676-5648"> 
    <![CDATA[RAE eletrônica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101200" status="D"/> 
    <periods> 
    <period> 
      <begin date="20060208" status="C"/> 
      <end date="20101200" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="15"> 
   <TITLE ISSN="1678-6971"> 
    <![CDATA[RAM. Revista de Administração Mackenzie (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="9"> 
   <TITLE ISSN="0100-8587"> 
    <![CDATA[Religião & Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="42"> 
   <TITLE ISSN="0370-4467"> 
    <![CDATA[Rem: Revista Escola de Minas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020624" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020624" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="57"> 
   <TITLE ISSN="0100-6762"> 
    <![CDATA[Revista Árvore]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20021209" status="C"/> 
    <periods> 
    <period> 
      <begin date="20021209" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="62"> 
   <TITLE ISSN="0034-7094"> 
    <![CDATA[Revista Brasileira de Anestesiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030331" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030331" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="0034-7108"> 
    <![CDATA[Revista Brasileira de Biologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1519-6984"><![CDATA[Brazilian Journal of Biology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19980000" status="C"/> 
      <end date="20010000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="56"> 
   <TITLE ISSN="0100-8404"> 
    <![CDATA[Revista Brasileira de Botânica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981207" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981207" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="42"> 
   <TITLE ISSN="1516-635X"> 
    <![CDATA[Revista Brasileira de Ciência Avícola]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020715" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020715" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="50"> 
   <TITLE ISSN="0100-0683"> 
    <![CDATA[Revista Brasileira de Ciência do Solo]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030805" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030805" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="0101-3289"> 
    <![CDATA[Revista Brasileira de Ciências do Esporte (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="1516-9332"> 
    <![CDATA[Revista Brasileira de Ciências Farmacêuticas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090915" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1984-8250"><![CDATA[Brazilian Journal of Pharmaceutical Sciences]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20051123" status="C"/> 
      <end date="20090915" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="43"> 
   <TITLE ISSN="0102-6909"> 
    <![CDATA[Revista Brasileira de Ciências Sociais]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="5"> 
   <TITLE ISSN="1980-0037"> 
    <![CDATA[Revista Brasileira de Cineantropometria & Desempenho Humano (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110700" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110700" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="96"> 
   <TITLE ISSN="0102-7638"> 
    <![CDATA[Revista Brasileira de Cirurgia Cardiovascular]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="1983-5175"> 
    <![CDATA[Revista Brasileira de Cirurgia Plástica (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="0101-9880"> 
    <![CDATA[Revista Brasileira de Coloproctologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060828" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060828" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="47"> 
   <TITLE ISSN="0034-7140"> 
    <![CDATA[Revista Brasileira de Economia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020719" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020719" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="33"> 
   <TITLE ISSN="1413-2478"> 
    <![CDATA[Revista Brasileira de Educação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20051003" status="C"/> 
    <periods> 
    <period> 
      <begin date="20051003" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="18"> 
   <TITLE ISSN="1413-6538"> 
    <![CDATA[Revista Brasileira de Educação Especial]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060608" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060608" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1807-5509"> 
    <![CDATA[Revista Brasileira de Educação Física e Esporte (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110300" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110300" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="0100-5502"> 
    <![CDATA[Revista Brasileira de Educação Médica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20061211" status="C"/> 
    <periods> 
    <period> 
      <begin date="20061211" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="51"> 
   <TITLE ISSN="0034-7167"> 
    <![CDATA[Revista Brasileira de Enfermagem]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070913" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070913" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="61"> 
   <TITLE ISSN="1415-4366"> 
    <![CDATA[Revista Brasileira de Engenharia Agrícola e Ambiental]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040817" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040817" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="41"> 
   <TITLE ISSN="1806-1117"> 
    <![CDATA[Revista Brasileira de Ensino de Física]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020719" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020719" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0085-5626"> 
    <![CDATA[Revista Brasileira de Entomologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030801" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030801" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="49"> 
   <TITLE ISSN="1415-790X"> 
    <![CDATA[Revista Brasileira de Epidemiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050112" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050112" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="0102-3098"> 
    <![CDATA[Revista Brasileira de Estudos de População]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060807" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060807" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="53"> 
   <TITLE ISSN="0102-695X"> 
    <![CDATA[Revista Brasileira de Farmacognosia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070423" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070423" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="5"> 
   <TITLE ISSN="0103-3131"> 
    <![CDATA[Revista Brasileira de Fisiologia Vegetal]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1677-0420"><![CDATA[Brazilian Journal of Plant Physiology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20000000" status="C"/> 
      <end date="20020000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="30"> 
   <TITLE ISSN="1413-3555"> 
    <![CDATA[Revista Brasileira de Fisioterapia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060803" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060803" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="0100-2945"> 
    <![CDATA[Revista Brasileira de Fruticultura]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020409" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020409" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="50"> 
   <TITLE ISSN="0102-261X"> 
    <![CDATA[Revista Brasileira de Geofísica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080000" status="C"/> 
</period> 
    <period> 
      <begin date="19991216" status="C"/> 
      <end date="20030000" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="148"> 
   <TITLE ISSN="0100-7203"> 
    <![CDATA[Revista Brasileira de Ginecologia e Obstetrícia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020612" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020612" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="57"> 
   <TITLE ISSN="1516-8484"> 
    <![CDATA[Revista Brasileira de Hematologia e Hemoterapia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020719" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020719" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="0102-0188"> 
    <![CDATA[Revista Brasileira de História]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1984-6398"> 
    <![CDATA[Revista Brasileira de Linguística Aplicada]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110200" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110200" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="84"> 
   <TITLE ISSN="1517-8692"> 
    <![CDATA[Revista Brasileira de Medicina do Esporte]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030714" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030714" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="0102-7786"> 
    <![CDATA[Revista Brasileira de Meteorologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071106" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071106" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="0034-7280"> 
    <![CDATA[Revista Brasileira de Oftalmologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080211" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080211" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="32"> 
   <TITLE ISSN="0102-3616"> 
    <![CDATA[Revista Brasileira de Ortopedia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071023" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071023" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="46"> 
   <TITLE ISSN="0034-7299"> 
    <![CDATA[Revista Brasileira de Otorrinolaringologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090700" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1808-8694"><![CDATA[Brazilian Journal of Otorhinolaryngology (Impresso)]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20020510" status="C"/> 
      <end date="20090700" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="1984-2961"> 
    <![CDATA[Revista Brasileira de Parasitologia Veterinária (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="8"> 
   <TITLE ISSN="1516-0572"> 
    <![CDATA[Revista Brasileira de Plantas Medicinais]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="31"> 
   <TITLE ISSN="0034-7329"> 
    <![CDATA[Revista Brasileira de Política Internacional]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071015" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071015" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="76"> 
   <TITLE ISSN="1516-4446"> 
    <![CDATA[Revista Brasileira de Psiquiatria]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000315" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000315" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="49"> 
   <TITLE ISSN="0482-5004"> 
    <![CDATA[Revista Brasileira de Reumatologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20051130" status="C"/> 
    <periods> 
    <period> 
      <begin date="20051130" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="42"> 
   <TITLE ISSN="1519-3829"> 
    <![CDATA[Revista Brasileira de Saúde Materno Infantil ]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030903" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030903" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="27"> 
   <TITLE ISSN="0101-3122"> 
    <![CDATA[Revista Brasileira de Sementes]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040623" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040623" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="0103-507X"> 
    <![CDATA[Revista Brasileira de Terapia Intensiva]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070906" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070906" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="110"> 
   <TITLE ISSN="0101-8175"> 
    <![CDATA[Revista Brasileira de Zoologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090505" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1984-4670"><![CDATA[Zoologia (Curitiba, Impresso)]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20030805" status="C"/> 
      <end date="20090505" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="113"> 
   <TITLE ISSN="1516-3598"> 
    <![CDATA[Revista Brasileira de Zootecnia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20010817" status="C"/> 
    <periods> 
    <period> 
      <begin date="20010817" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="26"> 
   <TITLE ISSN="1516-1846"> 
    <![CDATA[Revista CEFAC]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070517" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070517" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="0034-737X"> 
    <![CDATA[Revista Ceres (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110500" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110500" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="7"> 
   <TITLE ISSN="1806-6690"> 
    <![CDATA[Revista Ciência Agronômica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="35"> 
   <TITLE ISSN="1519-7077"> 
    <![CDATA[Revista Contabilidade & Finanças]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071018" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071018" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="72"> 
   <TITLE ISSN="0104-4230"> 
    <![CDATA[Revista da Associação Médica Brasileira]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000407" status="C"/> 
    <periods> 
    <period> 
      <begin date="20000407" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="66"> 
   <TITLE ISSN="0080-6234"> 
    <![CDATA[Revista da Escola de Enfermagem da USP]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070806" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070806" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="0102-2555"> 
    <![CDATA[Revista da Faculdade de Educação]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1517-9702"><![CDATA[Educação e Pesquisa]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19970000" status="C"/> 
      <end date="19990000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="19"> 
   <TITLE ISSN="1516-8034"> 
    <![CDATA[Revista da Sociedade Brasileira de Fonoaudiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070704" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070704" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="90"> 
   <TITLE ISSN="0037-8682"> 
    <![CDATA[Revista da Sociedade Brasileira de Medicina Tropical]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990901" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990901" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="68"> 
   <TITLE ISSN="1415-6555"> 
    <![CDATA[Revista de Administração Contemporânea]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071205" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071205" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="44"> 
   <TITLE ISSN="0034-7590"> 
    <![CDATA[Revista de Administração de Empresas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20081216" status="C"/> 
    <periods> 
    <period> 
      <begin date="20081216" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="36"> 
   <TITLE ISSN="0034-7612"> 
    <![CDATA[Revista de Administração Pública]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060608" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060608" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="20"> 
   <TITLE ISSN="1034-7701"> 
    <![CDATA[Revista de Antropologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080800" status="S"/> 
    <periods> 
    <period> 
      <begin date="20000213" status="C"/> 
      <end date="20080800" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="18"> 
   <TITLE ISSN="1415-9848"> 
    <![CDATA[Revista de Economia Contemporânea]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060623" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060623" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="34"> 
   <TITLE ISSN="0103-2003"> 
    <![CDATA[Revista de Economia e Sociologia Rural]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030703" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030703" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="25"> 
   <TITLE ISSN="0101-3157"> 
    <![CDATA[Revista de Economia Política]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050822" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050822" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="0001-3714"> 
    <![CDATA[Revista de Microbiologia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="8217-8382"><![CDATA[Brazilian Journal of Microbiology]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19980000" status="C"/> 
      <end date="20000000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="62"> 
   <TITLE ISSN="1415-5273"> 
    <![CDATA[Revista de Nutrição]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020207" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020207" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="0103-0663"> 
    <![CDATA[Revista de Odontologia da Universidade de São Paulo]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20000000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="9117-7491"><![CDATA[Pesquisa Odontológica Brasileira]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="19980000" status="C"/> 
      <end date="20000000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="61"> 
   <TITLE ISSN="0101-6083"> 
    <![CDATA[Revista de Psiquiatria Clínica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040108" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040108" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="0101-8108"> 
    <![CDATA[Revista de Psiquiatria do Rio Grande do Sul]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20040108" status="C"/> 
    <periods> 
    <period> 
      <begin date="20040108" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="252"> 
   <TITLE ISSN="0034-8910"> 
    <![CDATA[Revista de Saúde Pública]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19980430" status="C"/> 
    <periods> 
    <period> 
      <begin date="19980430" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="27"> 
   <TITLE ISSN="0104-4478"> 
    <![CDATA[Revista de Sociologia e Política]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020208" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020208" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="35"> 
   <TITLE ISSN="1415-5419"> 
    <![CDATA[Revista Dental Press de Ortodontia e Ortopedia Facial]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100400" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="2176-9451"><![CDATA[Dental Press Journal of Orthodontics]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20060127" status="C"/> 
      <end date="20100400" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="1808-2432"> 
    <![CDATA[Revista Direito GV]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="81"> 
   <TITLE ISSN="0100-6991"> 
    <![CDATA[Revista do Colégio Brasileiro de Cirurgiões]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20051021" status="C"/> 
    <periods> 
    <period> 
      <begin date="20051021" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="0104-8023"> 
    <![CDATA[Revista do Departamento de Psicologia. UFF]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20081017" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="9284-0292"><![CDATA[Fractal : Revista de Psicologia]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20060711" status="C"/> 
      <end date="20081017" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="36"> 
   <TITLE ISSN="0041-8781"> 
    <![CDATA[Revista do Hospital das Clínicas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050000" status="D"/> 
   <CHANGESINFO><NEWTITLE><TITLE ISSN="1807-5932"><![CDATA[Clinics]]></TITLE></NEWTITLE></CHANGESINFO> 
    <periods> 
    <period> 
      <begin date="20000000" status="C"/> 
      <end date="20050000" status="D"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="150"> 
   <TITLE ISSN="0036-4665"> 
    <![CDATA[Revista do Instituto de Medicina Tropical de São Paulo]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19970424" status="C"/> 
    <periods> 
    <period> 
      <begin date="19970424" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="28"> 
   <TITLE ISSN="0104-026X"> 
    <![CDATA[Revista Estudos Feministas]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020408" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020408" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="7"> 
   <TITLE ISSN="1983-1447"> 
    <![CDATA[Revista Gaúcha de Enfermagem (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20100900" status="C"/> 
    <periods> 
    <period> 
      <begin date="20100900" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="12"> 
   <TITLE ISSN="1414-4980"> 
    <![CDATA[Revista Katálysis]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070517" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070517" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="104"> 
   <TITLE ISSN="0104-1169"> 
    <![CDATA[Revista Latino-Americana de Enfermagem]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20020214" status="C"/> 
    <periods> 
    <period> 
      <begin date="20020214" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="16"> 
   <TITLE ISSN="1415-4714"> 
    <![CDATA[Revista Latinoamericana de Psicopatologia Fundamental]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080728" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080728" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="6"> 
   <TITLE ISSN="1980-6523"> 
    <![CDATA[Revista Odonto Ciência (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110900" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110900" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="17"> 
   <TITLE ISSN="0103-0582"> 
    <![CDATA[Revista Paulista de Pediatria]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20071009" status="C"/> 
    <periods> 
    <period> 
      <begin date="20071009" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="25"> 
   <TITLE ISSN="9102-8839"> 
    <![CDATA[São Paulo em Perspectiva]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050100" status="S"/> 
    <periods> 
    <period> 
      <begin date="20020000" status="C"/> 
      <end date="20050100" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="105"> 
   <TITLE ISSN="1516-3180"> 
    <![CDATA[Sao Paulo Medical Journal]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19990901" status="C"/> 
    <periods> 
    <period> 
      <begin date="19990901" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="51"> 
   <TITLE ISSN="0104-1290"> 
    <![CDATA[Saúde e Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080211" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080211" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="40"> 
   <TITLE ISSN="0103-1759"> 
    <![CDATA[Sba: Controle & Automação Sociedade Brasileira de Automatica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20021025" status="C"/> 
    <periods> 
    <period> 
      <begin date="20021025" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="86"> 
   <TITLE ISSN="0103-9016"> 
    <![CDATA[Scientia Agricola]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="19981016" status="C"/> 
    <periods> 
    <period> 
      <begin date="19981016" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="33"> 
   <TITLE ISSN="1678-3166"> 
    <![CDATA[Scientiae Studia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090427" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090427" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="7"> 
   <TITLE ISSN="0101-6628"> 
    <![CDATA[Serviço Social & Sociedade]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20101100" status="C"/> 
    <periods> 
    <period> 
      <begin date="20101100" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="3"> 
   <TITLE ISSN="1984-6487"> 
    <![CDATA[Sexualidad, Salud y Sociedad (Rio de Janeiro)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110800" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110800" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="1982-4513"> 
    <![CDATA[Sociedade & Natureza (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090414" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090414" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="26"> 
   <TITLE ISSN="0102-6992"> 
    <![CDATA[Sociedade e Estado]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060927" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060927" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="1517-4522"> 
    <![CDATA[Sociologias]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20030623" status="C"/> 
    <periods> 
    <period> 
      <begin date="20030623" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="10"> 
   <TITLE ISSN="0104-9224"> 
    <![CDATA[Soldagem & Inspeção (Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="22"> 
   <TITLE ISSN="0100-5405"> 
    <![CDATA[Summa Phytopathologica]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20061011" status="C"/> 
    <periods> 
    <period> 
      <begin date="20061011" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="11"> 
   <TITLE ISSN="5806-6445"> 
    <![CDATA[Sur. Revista Internacional de Direitos Humanos]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110200" status="S"/> 
    <periods> 
    <period> 
      <begin date="20080700" status="C"/> 
      <end date="20110200" status="S"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="13"> 
   <TITLE ISSN="1413-7704"> 
    <![CDATA[Tempo]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060919" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060919" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="24"> 
   <TITLE ISSN="0103-2070"> 
    <![CDATA[Tempo Social]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20050920" status="C"/> 
    <periods> 
    <period> 
      <begin date="20050920" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="31"> 
   <TITLE ISSN="0104-0707"> 
    <![CDATA[Texto & Contexto - Enfermagem]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070726" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070726" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="4"> 
   <TITLE ISSN="1981-7746"> 
    <![CDATA[Trabalho, Educação e Saúde (Online)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20110000" status="C"/> 
    <periods> 
    <period> 
      <begin date="20110000" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="7"> 
   <TITLE ISSN="0103-1813"> 
    <![CDATA[Trabalhos em Linguística Aplicada]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090600" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090600" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="23"> 
   <TITLE ISSN="0101-3173"> 
    <![CDATA[Trans/Form/Ação - Revista de Filosofia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20060518" status="C"/> 
    <periods> 
    <period> 
      <begin date="20060518" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="21"> 
   <TITLE ISSN="1982-5676"> 
    <![CDATA[Tropical Plant Pathology]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20080400" status="C"/> 
    <periods> 
    <period> 
      <begin date="20080400" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="13"> 
   <TITLE ISSN="0104-8775"> 
    <![CDATA[Varia Historia]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20070423" status="C"/> 
    <periods> 
    <period> 
      <begin date="20070423" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
  <SERIAL QTYISS="14"> 
   <TITLE ISSN="1984-4670"> 
    <![CDATA[Zoologia (Curitiba, Impresso)]]>
   </TITLE> 
  <journal-status-history> 
    <current-status date="20090505" status="C"/> 
    <periods> 
    <period> 
      <begin date="20090505" status="C"/> 
</period> 
</periods> 
  </journal-status-history> 
  </SERIAL> 
 
 </LIST>
-->