<?
function getArticleTimeline($currentArticle){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$range = substr($currentArticle,0,18);

	$query = file_get_contents(str_replace("{pid}",$range,$COUCHDB_VIEWS["articles_range"]));
	$articles = json_decode($query);

    $timeLineIds = Array();
    $timeLine = Array();

	foreach($articles->{rows} as $index=>$article){
		if ($article->{key} == $currentArticle){
			$timeLineIds['previous'] = $articles->{rows}[$index+1]->{key};
			$timeLineIds['current'] = $article->{key};
			$timeLineIds['next'] = $articles->{rows}[$index-1]->{key};
		}
	}

	//GETTING METADATA FROM THE ISSUES IN THE TIMELINE
	foreach ($timeLineIds as $key=>$value){
		$query = file_get_contents(str_replace("{pid}",$value,$COUCHDB_VIEWS["sci_article"]));
		$article = json_decode($query);
		$timeLine[$key]['pid'] = $value;
		$timeLine[$key]['title'] = "";	
		
		// GETTING ARTICLE TITLE
		$tmpTitle = Array();
		foreach($article->{rows}[0]->{doc}->{v12} as $value){
		  $tmpTitle[$value->{l}] = $value->{_};
		}
		if (array_key_exists($tlng,$tmpTitle)){ //IDIOMA INTERFACE
		  $timeLine[$key]['title']=$tmpTitle[$tlng];
		}elseif (array_key_exists($LANG,$tmpTitle)){ //IDIOMA PADRAO
		  $timeLine[$key]['title']=$tmpTitle[$LANG];
		}else{
		  $timeLine[$key]['title']=current($tmpTitle);
		}	
	}

	return $timeLine;
}

function getIssueTimeline($currentIssue){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	if (strlen($currentIssue) == 9){ // Serial Context

		$query = file_get_contents(str_replace("{pid}",$currentIssue,$COUCHDB_VIEWS["issues_range"]."&limit=5&include_docs=true"));
		$lastIssues = json_decode($query);
		
		$timeLine = Array();
		foreach ($lastIssues->{rows} as $value){
			$issue = $value->{doc};
			$pid = $value->{key};
	  		$vol = $issue->{v31}[0]->{_};
	  		$pr = $issue->{v41}[0]->{_}; // Indicates if the issue is a press release
	  		$num = $issue->{v32}[0]->{_};
	  		$supplvol = $issue->{v131}[0]->{_};
	  		$supplnum = $issue->{v132}[0]->{_};	

			if ($pr != "pr"){  // Ignore issue if it's a press release
			    if ($num == "ahead"){
			    	$timeLine['future']['ahead']["pid"]=$pid;
			    	$timeLine['future']['ahead']["vol"]=$vol;
			    	$timeLine['future']['ahead']["num"]=$num;
			    }
			    if ($num == "review"){
			    	$timeLine['future']['review']["pid"]=$pid;
			    	$timeLine['future']['review']["vol"]=$vol;
			    	$timeLine['future']['review']["num"]=$num;			    	
			    }
			    if ($supplvol == "" and $supplnum == "" and $num !="ahead"){
			    	if (array_key_exists('current',$timeLine)){
				    	$timeLine['previous']["pid"]=$pid;
				    	$timeLine['previous']["vol"]=$vol;
				    	$timeLine['previous']["num"]=$num;
				    	$timeLine['previous']["supplvol"]=$supplvol;
				    	$timeLine['previous']["supplnum"]=$supplnum;
				    	break;
				   	}else{
				    	$timeLine['current']["pid"]=$pid;
				    	$timeLine['current']["vol"]=$vol;
				    	$timeLine['current']["num"]=$num;
				    	$timeLine['current']["supplvol"]=$supplvol;
				    	$timeLine['current']["supplnum"]=$supplnum;				   		
				   	}
			    }
			}
		}
	}elseif (strlen($currentIssue) == 17){ //Issue Context
		
		$range = substr($currentIssue,0,9);
		
		$query = file_get_contents(str_replace("{pid}",$range,$COUCHDB_VIEWS["issues_range"])); // Simple query without include_docs, just to identify de issues timeline pid
		$lastIssues = json_decode($query);

		//GETTING TIME LINE ACCORDING TO CURRENT ISSUE
        $timeLineIds = Array();
        $timeLine = Array();
		foreach($lastIssues->{rows} as $index=>$issue){
			if ($issue->{key} == $currentIssue){
				$timeLineIds['previous'] = $lastIssues->{rows}[$index+1]->{key};
				$timeLineIds['current'] = $issue->{key};
				$timeLineIds['next'] = $lastIssues->{rows}[$index-1]->{key};
			}
		}

		//GETTING METADATA FROM THE ISSUES IN THE TIMELINE
		foreach ($timeLineIds as $key=>$value){
			$query = file_get_contents(str_replace("{pid}",$value,$COUCHDB_VIEWS["sci_issue"]));
			$issue = json_decode($query);
			
			$timeLine[$key]['pid'] = $value;
			$timeLine[$key]['vol'] = $issue->{rows}[0]->{doc}->{v31}[0]->{_};
			$timeLine[$key]['num'] = $issue->{rows}[0]->{doc}->{v32}[0]->{_};
			$timeLine[$key]['supplvol'] = $issue->{rows}[0]->{doc}->{v131}[0]->{_};
			$timeLine[$key]['supplnum'] = $issue->{rows}[0]->{doc}->{v132}[0]->{_};
			
		}

		//GETTING FUTURE ISSUES 
		$query = file_get_contents(str_replace("{pid}",$range,$COUCHDB_VIEWS["issues_range"]."&limit=5&include_docs=true"));
		$lastIssues = json_decode($query);

		foreach ($lastIssues->{rows} as $value){
			$issue = $value->{doc};
			$pid = $value->{key};
	  		$vol = $issue->{v31}[0]->{_};
	  		$pr = $issue->{v41}[0]->{_}; // Indicates if the issue is a press release
	  		$num = $issue->{v32}[0]->{_};
	  		$supplvol = $issue->{v131}[0]->{_};
	  		$supplnum = $issue->{v132}[0]->{_};	

			if ($pr != "pr"){  // Ignore issue if it's a press release
			    if ($num == "ahead"){
			    	$timeLine['future']['ahead']["pid"]=$pid;
			    	$timeLine['future']['ahead']["vol"]=$vol;
			    	$timeLine['future']['ahead']["num"]=$num;
			    }
			    if ($num == "review"){
			    	$timeLine['future']['review']["pid"]=$pid;
			    	$timeLine['future']['review']["vol"]=$vol;
			    	$timeLine['future']['review']["num"]=$num;			    	
			    }

			}
		}
	}
	return $timeLine;
}

function getFilesFromPath($originalLanguage,$path){
	global $FILESLANG, $conf;

	// Path Sample:  V:\Scielo\serial\rsp\v44n3\markup\1482.htm
	$tmpSerialPos = strrpos($path,'serial')+7; // Get serial directory position in the string +7.
	$tmpPath = substr($path,$tmpSerialPos); // Get path after serial directory: rsp\v44n3\markup\1482.html
	$tmpPath = str_replace("\\markup","",$tmpPath); // Removing markup directory from path rsp\v44n3\1482.html
	$tmpDotPos = strrpos($tmpPath,'.'); // Get Dot (.) position in the string rsp\v44n3\1482.html
	$tmpPath = substr($tmpPath,0,$tmpDotPos); // Removing file extension according to dot (.) position, results: rsp\v44n3\1482
	$tmpPath = explode("\\",$tmpPath); // converting rsp\v44n3\1482 to Array('rsp','v44n3','1482')

	$files = Array();
	foreach ($FILESLANG as $flang){
		$filePathPDF = str_replace("//","/",$conf['PATH']['PATH_PDF']."/".$tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".pdf");
		$filePathHTML = str_replace("//","/",$conf['PATH']['PATH_TRANSLATION']."/".$tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".html");
		$filePathHTM = str_replace("//","/",$conf['PATH']['PATH_TRANSLATION']."/".$tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".htm");

		// SETING ORIGINAL LANGUAGE FILES
		$files['pdf'][$originalLanguage] = $tmpPath[0]."/".$tmpPath[1]."/".$tmpPath[2].".pdf";
		$files['html'][$originalLanguage] = $tmpPath[0]."/".$tmpPath[1]."/".$tmpPath[2].".htm";

		// TESTING PDF FILE
		if (file_exists($filePathPDF)){
		   $files['pdf'][$flang] = $tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".pdf";
		}
		// TESTING HTML FILE WITH EXTENSION .html
		if (file_exists($filePathHTML)){
		   $files['html'][$flang] = $tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".html";
		}
		// TESTING HTML FILE WITH EXTENSION .htm;
		if (file_exists($filePathHTM)){
		   $files['html'][$flang] = $tmpPath[0]."/".$tmpPath[1]."/".$flang."_".$tmpPath[2].".htm";
		}
	}
	return $files;
}

function getSubjectAlphabeticList(){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$query1 = file_get_contents($COUCHDB_VIEWS["sci_alphabetic"]);
	$title = json_decode($query1);
	$query2 = file_get_contents($COUCHDB_QUERIES["issues_count_all"]);
	$count = json_decode($query2);

	// Converting Counting JSON to a dictionary
	foreach ($count->{rows} as $value){
	  $count_dict[$value->{key}] = $value->{value};
	}

	// Converting Title JSON's to a dictionary
	foreach ($title->{rows} as $value){
	  	foreach ($value->{doc}->{v441} as $subjectVal){
	  		$subject = $subjectVal->{_};
		  	$titleKey = $value->{doc}->{v100}[0]->{_};
		  	$docs[$subject][$titleKey]['title'] =      $titleKey;
		  	$docs[$subject][$titleKey]['issn'] =       $value->{doc}->{v400}[0]->{_};
		  	$docs[$subject][$titleKey]['issn2'] =      $value->{doc}->{v935}[0]->{_};
		  	$docs[$subject][$titleKey]['issn2_type'] = $value->{doc}->{v35}[0]->{_};
		  	if (array_key_exists($docs[$subject][$titleKey]['issn'],$count_dict)){
		    	$docs[$subject][$titleKey]['issues_total'] = $count_dict[$docs[$subject][$titleKey]['issn']];
		  	}else{
		    	$docs[$subject][$titleKey]['issues_total'] = 0;
		  	}

		  	if ($value->{doc}->{v50}[0]->{_} == "C") {
		    	if (array_key_exists("v51",$value->{doc})){
		      		$docs[$subject][$titleKey]['history'] = array();
		      		foreach ($value->{doc}->{v51} as $valueb){
		        		$history = array();
		        		$history['a'] = $valueb->{a}; //period start date
		        		$history['b'] = $valueb->{b}; //period status for available situation
		        		$history['c'] = $valueb->{c}; //period end date
		        		$history['d'] = $valueb->{d}; //period status for end situation
		        		array_push($docs[$subject][$titleKey]['history'],$history);
		        	}
		    	}
		  	}
		}
	}
	return $docs;
}

function getAlphabeticList(){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$query1 = file_get_contents($COUCHDB_VIEWS["sci_alphabetic"]);
	$title = json_decode($query1);
	$query2 = file_get_contents($COUCHDB_QUERIES["issues_count_all"]);
	$count = json_decode($query2);

	// Converting Counting JSON to a dictionary
	foreach ($count->{rows} as $value){
	  $count_dict[$value->{key}] = $value->{value};
	}

	// Converting Title JSON's to a dictionary
	foreach ($title->{rows} as $value){
	  $titleKey = $value->{doc}->{v100}[0]->{_};
	  $docs[$titleKey]['title'] =      $titleKey;
	  $docs[$titleKey]['issn'] =       $value->{doc}->{v400}[0]->{_};
	  $docs[$titleKey]['issn2'] =      $value->{doc}->{v935}[0]->{_};
	  $docs[$titleKey]['issn2_type'] = $value->{doc}->{v35}[0]->{_};
	  if (array_key_exists($docs[$titleKey]['issn'],$count_dict)){
	      $docs[$titleKey]['issues_total'] = $count_dict[$docs[$titleKey]['issn']];
	  }else{
	      $docs[$titleKey]['issues_total'] = 0;
	  }

	  if ($value->{doc}->{v50}[0]->{_} == "C") {
	    if (array_key_exists("v51",$value->{doc})){
	      $docs[$titleKey]['history'] = array();
	      foreach ($value->{doc}->{v51} as $valueb)
	        $history = array();
	        $history['a'] = $valueb->{a}; //period start date
	        $history['b'] = $valueb->{b}; //period status for available situation
	        $history['c'] = $valueb->{c}; //period end date
	        $history['d'] = $valueb->{d}; //period status for end situation
	        array_push($docs[$titleKey]['history'],$history);
	    }
	  }
	} 

	return $docs;
}

function getIssuesList($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$query = file_get_contents(str_replace("{pid}",$pid,$COUCHDB_VIEWS["sci_issues"]));
	$issues = json_decode($query);

	$docs = $issues->{rows};
	$issues = Array();
	$antVol = "";
	foreach($docs as $doc){ // Just creating a dictionary with PID as key to correctly sort the iteretor loop
	  $pid =  $doc->{key};
	  $issue = $doc->{doc};
	  $issuesTmp[$pid] = $issue;
	}

	ksort($issuesTmp);
	foreach ($issuesTmp as $pid=>$issue){ 
	  $year = substr($pid,9,4);
	  $vol = $issue->{v31}[0]->{_};
	  $pr = $issue->{v41}[0]->{_}; // Indicates if the issue is a press release
	  $num = $issue->{v32}[0]->{_};
	  $supplvol = $issue->{v131}[0]->{_};
	  $supplnum = $issue->{v132}[0]->{_};
	  
	  if ($vol == ""){
	    $vol = $antVol;
	  }

	  if ($pr != "pr"){  // Ignore issue if it's a press release
	    if ($supplvol == "" and $supplnum == "" and $num !="ahead"){
	      $issues[$year][$vol]["num"][$num]=$pid;
	    }
	  }

	  if ($supplnum != ""){
	   $issues[$year][$vol]['supplnum'][$supplnum]=$pid; 
	  }

	  if ($supplvol != ""){
	   $issues[$year][$vol]['supplvol'][$supplvol]=$pid; 
	  }

	  if ($num == "ahead"){
	   $issues[$year][$vol]['ahead'][$num]=$pid;     
	  }

	  if ($vol != ""){
	    $antVol = $vol;
	  }
	}
    return $issues;
}

function getTableOfContents($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$query   = file_get_contents(str_replace("{pid}",'S'.$pid,$COUCHDB_VIEWS["sci_issuetoc"]));
	$issueToc = json_decode($query);

	$docs = $issueToc->{rows};
	$sections = Array();
	foreach ($docs as $doc) {
	  $article = $doc->{doc};
	  $pid = $doc->{key};
	  $section = $article->{v49}[0]->{_};
	  

	  $sections[$section][$pid]['pid'] = $pid; 
	  $sections[$section][$pid]['entrDate'] = $article->{v65}[0]->{_};
	  $sections[$section][$pid]['originalLanguage'] = $article->{v40}[0]->{_};
	  $sections[$section][$pid]['abstractLanguages'] = Array();
	  $sections[$section][$pid]['abstractLanguages'] = Array();
	  $sections[$section][$pid]['authors'] = Array();

	  // GETTING FILES FROM FILE SYSTEM
	  $tmpPath = $article->{v702}[0]->{_};
	  $sections[$section][$pid]['files'] = getFilesFromPath($sections[$section][$pid]['originalLanguage'],$tmpPath);

	  // GETTING ABSTRACT AVAILABLE LANGUAGES
	  foreach($article->{v83} as $value){
	    array_push($sections[$section][$pid]['abstractLanguages'],$value->{l});
	  }

	  // GETTING TITLE BY LANGUAGE
	  $title = "";
	  foreach($article->{v12} as $value){
	      $title[$value->{l}] = $value->{_};
	  }
	  if (array_key_exists($lng,$title)){ //IDIOMA INTERFACE
	    $sections[$section][$pid]['title'] = $title[$lng];
	  }elseif (array_key_exists($LANG,$title)){ //IDIOMA PADRAO
	    $sections[$section][$pid]['title'] = $title[$LANG];
	  }else{
	    $sections[$section][$pid]['title'] = current($title); 
	  }

	  // GETTING SUBTITLE BY LANGUAGE
	  /*
	  $subtitle = "";
	  foreach($article->{v12} as $value){
	      $subtitle[$value->{l}] = $value->{_};
	  }
	  if (array_key_exists($tlng,$subtitle)){ //IDIOMA INTERFACE
	    $articles[$section][$pid]['subTitle'] = $subtitle[$tlng];
	  }elseif (array_key_exists($LANG,$subtitle)){ //IDIOMA PADRAO
	    $articles[$section][$pid]['subTitle'] = $subtitle[$LANG];
	  }else{
	    $articles[$section][$pid]['subTitle'] = $subtitle['en']; 
	  }
	  */

	  // GETTING AUTHORS
	  $author = Array();

	  foreach ($article->{v10} as $value){
	    $author['affiliation'] = $value->{1};
	    $author['name'] = $value->{n};
	    $author['surName'] = $value->{s}; 
	    $author['role'] = $value->{r};
	    $author['search'] = strtoupper(str_replace(" ","+",$author['surName'].",".$author['name']));
	    array_push($sections[$section][$pid]['authors'],$author);
	  }
	  foreach ($article->{v11} as $value){
	    $author['name'] = $value->{_};
	    array_push($sections[$section][$pid]['authors'],$author);
	  }
	}

	return $sections;
}

function getSerialPressReleasesMetadata($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$query = file_get_contents(str_replace("{pid}",$pid,$COUCHDB_QUERIES["journal_pressreleases"]));
	$pressRelease = json_decode($query);

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

		if (array_key_exists($tlng,$tmpTitle)){ //IDIOMA INTERFACE
		  $pressRelease['title'] = $tmpTitle[$tlng];
		}elseif (array_key_exists($LANG,$tmpTitle)){ //IDIOMA PADRAO
		  $pressRelease['title'] = $tmpTitle[$LANG];
		}else{
		  $pressRelease['title'] = current($tmpTitle); 
		}
		array_push($pressReleases,$pressRelease);
	}

	return $pressReleases;
}

function getArticleMetadata($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;
	
	$query   = file_get_contents(str_replace("{pid}",$pid,$COUCHDB_VIEWS["sci_article"]));
	$article = json_decode($query);

    $timeLine = getArticleTimeline($pid);

	$doc = $article->{rows}[0]->{doc};

	$article = Array();
	$article['pid'] = $pid; 
	$article['originalLanguage'] = $doc->{v40}[0]->{_};
	$article['title'] =  "";
	$article['abstractLanguages'] = Array();
	$article['authors'] = Array();
	$article['fpage'] = $doc->{v14}[0]->{f};
	$article['lpage'] = $doc->{v14}[0]->{l};
	$article['processDate'] = $doc->{v65}[0]->{_};
	$article['ahpDate'] = $doc->{v223}[0]->{_};
	$article['rvwDate'] = $doc->{v224}[0]->{_};
	$article['entrDate'] = $doc->{v265}[0]->{_};
	$article['abstract'] = "";
	$article['abstractLanguage'] = "";
	$article['keywords'] = Array();
	$article['doi'] = $conf['CrossRef']['DOI_PREFIX']."/".$pid;
	$article['related'] = "";
	$article['cited']    = "";
	$article['areasgeo'] = "";
	$article['lattes'] = "";
	$article['timeLine'] = $timeLine;

	$tmpPath = $doc->{v702}[0]->{_};
	$article['files'] = getFilesFromPath($article['originalLanguage'],$tmpPath);

	// GETTING ARTICLE TITLE
	$tmpTitle = Array();
	foreach($doc->{v12} as $value){
	  $tmpTitle[$value->{l}] = $value->{_};
	}
	if (array_key_exists($tlng,$tmpTitle)){ //IDIOMA INTERFACE
	  $article['title']=$tmpTitle[$tlng];
	}elseif (array_key_exists($LANG,$tmpTitle)){ //IDIOMA PADRAO
	  $article['title']=$tmpTitle[$LANG];
	}else{
	  $article['title']=current($tmpTitle);
	}

	// GETTING KEYWORDS
	$tmpKeyword = Array();
	foreach($doc->{v85} as $value){
	  if ($value->{k} != ""){
	    $tmpKeyword[$value->{l}][$value->{k}] = $value->{k};
	  }
	}
	if (array_key_exists($tlng,$tmpKeyword)){ //IDIOMA INTERFACE
	  $article['keywords']=$tmpKeyword[$tlng];
	}elseif (array_key_exists($LANG,$tmpAbstract)){ //IDIOMA PADRAO
	  $article['keywords']=$tmpKeyword[$LANG];
	}else{
	  $article['keywords']=current($tmpKeyword);
	}

	// GETTING ABSTRACT AVAILABLE LANGUAGES AND ABSTRACT CONTENT
	$tmpAbstract = Array();
	foreach($doc->{v83} as $value){
	  array_push($article['abstractLanguages'],$value->{l});
	  $tmpAbstract[$value->{l}] = $value->{a};
	}

	if (array_key_exists($tlng,$tmpAbstract)){ //IDIOMA INTERFACE
	  $article['abstract'] = $tmpAbstract[$tlng];
	  $article['abstractLanguage'] = $tlng;
	}elseif (array_key_exists($LANG,$tmpAbstract)){ //IDIOMA PADRAO
	  $article['abstract'] = $tmpAbstract[$LANG];
	  $article['abstractLanguage'] = $LANG;
	}else{
	  $article['abstract'] = current($tmpAbstract); 
	  $article['abstractLanguage'] = 'en';
	}

	// GETTING TEXT AVAILABLE LANGUAGES
	foreach($doc->{v40} as $value){
	  array_push($article['textLanguages'],$value->{_});
	}

	// GETTING TITLE BY LANGUAGE
	$title = "";
	foreach($doc->{v12} as $value){
	    $title[$value->{l}] = $value->{_};
	}
	if (array_key_exists($tlng,$title)){ //IDIOMA INTERFACE
	  $article['title'] = $title[$tlng];
	}elseif (array_key_exists($LANG,$title)){ //IDIOMA PADRAO
	  $article['title'] = $title[$LANG];
	}else{
	  $article['title'] = current($title); 
	}

	// GETTING SUBTITLE BY LANGUAGE
	/*
	$subtitle = "";
	foreach($article->{v12} as $value){
	    $subtitle[$value->{l}] = $value->{_};
	}
	if (array_key_exists($tlng,$subtitle)){ //IDIOMA INTERFACE
	  $articles[$section][$pid]['subTitle'] = $subtitle[$tlng];
	}elseif (array_key_exists($LANG,$subtitle)){ //IDIOMA PADRAO
	  $articles[$section][$pid]['subTitle'] = $subtitle[$LANG];
	}else{
	  $articles[$section][$pid]['subTitle'] = $subtitle['en']; 
	}
	*/

	// GETTING AUTHORS
	$author = Array();
	foreach ($doc->{v10} as $value){
	  $author['affiliation'] = explode(" ",$value->{1});
	  $author['name'] = $value->{n};
	  $author['surName'] = $value->{s}; 
	  $author['role'] = $value->{r};
	  $author['search'] = strtoupper(str_replace(" ","+",$author['surName'].",".$author['name']));
	  array_push($article['authors'],$author);
	}
	foreach ($doc->{v11} as $value){
	  $author['name'] = $value->{_};
	  array_push($article['authors'],$author);
	}

	return $article;
}

function getIssueMetadata($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

 	$pid  = str_replace('S','',$pid);
	$issueId    = substr($pid,0,17);

	$timeLine = getIssueTimeLine($issue);

	$query   = file_get_contents(str_replace("{pid}",$issueId,$COUCHDB_VIEWS["sci_issue"]));
	$issue    = json_decode($query);

	$doc = $issue->{rows}[0]->{doc};
	$issue = Array();
	$issue['issue'] = $issueId;
	$issue['vol'] = $doc->{v31}[0]->{_};
	$issue['num'] = $doc->{v32}[0]->{_};
	$issue['supplvol'] = $doc->{v131}[0]->{_};
	$issue['supplnum'] = $doc->{v132}[0]->{_};
	$issue['shortTitle'] = $doc->{v30}[0]->{_};
	$issue['pubYear'] = $doc->{v65}[0]->{_};
	$issue['sections'] = Array();
	$issue['timeLine'] = $timeLine;

	// GETTING ISSUE SECTIONS
	$sections =  $doc->{v49};
	$tmpSection = Array();
	foreach ($sections as $section){
	  $tmpSection[$section->{c}][$section->{l}] = $section->{t};
	}

	foreach ($tmpSection as $sectionKey=>$section){
	  if (array_key_exists($tlng,$section)){ //IDIOMA INTERFACE
	    $issue['sections'][$sectionKey] = $section[$tlng];
	  }elseif (array_key_exists($LANG,$section)){ //IDIOMA PADRAO
	    $issue['sections'][$sectionKey] = $section[$LANG];
	  }else{
	    $issue['sections'][$sectionKey] = current($section);
	  }
	}

	// GETTING ISSUE INFO
	$info = Array();
	foreach ($doc->{v43} as $value){
	  $info[$value->{l}]['v'] = $value->{v};
	  $info[$value->{l}]['n'] = $value->{n};
	  $info[$value->{l}]['t'] = $value->{t};
	  $info[$value->{l}]['a'] = $value->{a};
	  $info[$value->{l}]['c'] = $value->{c};
	  $info[$value->{l}]['m'] = $value->{m};
	}

	if (array_key_exists($tlng,$info)){ //IDIOMA INTERFACE
	  $issue['info'] = $info[$tlng];
	}elseif (array_key_exists($LANG,$info)){ //IDIOMA PADRAO
	  $issue['info'] = $info[$LANG];
	}else{
	  $issue['info'] = current($info); 
	}

	return $issue;
}

function getSerialMetadata($pid){
	global $COUCHDB_VIEWS, $COUCHDB_QUERIES, $DB_SERVER, $DB_NAME, $LIMIT, $LANG, $conf, $tlng, $lng, $sln;

	$pid = str_replace('S','',$pid);
	$issn = substr($pid,0,9);
	$query = file_get_contents(str_replace("{pid}",$issn,$COUCHDB_VIEWS["sci_serial"]));
	$serial = json_decode($query);

	$timeLine = getIssueTimeLine($pid);

	$doc = $serial->{rows}[0]->{doc};

	$serial = Array();
	$serial['title'] = $doc->{v100}[0]->{_};
	$serial['formerTitle'] = $doc->{v610}[0]->{_};
	$serial['shortTitle'] = $doc->{v150}[0]->{_};
	$serial['shortTitleMedline'] = $doc->{v151}[0]->{_};
	$serial['siglum'] = $doc->{v68}[0]->{_};
	$serial['issn'] = $doc->{v400}[0]->{_};
	$serial['issnAsId'] = $doc->{v935}[0]->{_};
	$serial['issnType'] = $doc->{v35}[0]->{_};
	$serial['subjects'] = Array();
	$serial['publishers'] = Array();
	$serial['mission'] = ""; //dict by language
	$serial['address'] = Array();
	$serial['email'] = $doc->{v64}[0]->{_};
	$serial['submissionUrl'] = $doc->{v692}[0]->{_};
	$serial['timeLine'] = $timeLine;

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
	if (array_key_exists($tlng,$tmpMission)){
	  $serial['mission'] = $tmpMission[$tlng];
	}elseif (array_key_exists($LANG,$tmpMission)){
	  $serial['mission'] = $tmpMission[$LANG];
	}else{
	  $serial['mission'] = current($tmpMission);
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
	return $serial;
}
?>