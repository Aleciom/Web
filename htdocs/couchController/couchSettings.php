<?
$conf      = parse_ini_file(dirname(__FILE__).'/../scielo.def.php',True); 
$DEBUG     = True;
$DB_SERVER = 'http://teste.webservices.scielo.org/';
$DB_NAME   = 'scielobr1';
$LIMIT     = 10;
$LANG      = 'pt';

$COUCHDB_VIEWS["sci_alphabetic"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/title?include_docs=true';
$COUCHDB_VIEWS["sci_serial"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/title_id?include_docs=true&key="{pid}"';
$COUCHDB_VIEWS["sci_issue"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_id?include_docs=true&key="${pid}"';
$COUCHDB_VIEWS["sci_issues"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_id?include_docs=true&startkey="{pid}\\u9999"&endkey="{pid}"&descending=true"';
$COUCHDB_VIEWS["sci_issuetoc"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_id/?include_docs=true&startkey="S{pid}"&endkey="S{pid}\\u9999"';
$COUCHDB_VIEWS["sci_article"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_id/?include_docs=true&key="{pid}"';

$COUCHDB_QUERIES["journal_pressreleases"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_pr?include_docs=true&limit='.$LIMIT.'&startkey=["{pid}",{}]&endkey=["{pid}"]&descending=true';
$COUCHDB_QUERIES["journal_lastarticles"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article?include_docs=true&limit="+str(LIMIT)+"&startkey=["{pid}",{brac}]&endkey=["{pid}"]&descending=true';
$COUCHDB_QUERIES["issues_count_pid"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_count?key=["{pid}"]&group=true';
$COUCHDB_QUERIES["issues_count_all"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_count?group=true';
?>