<?
$conf      = parse_ini_file(dirname(__FILE__).'/../scielo.def.php',True); 
$DEBUG     = True;
$DB_SERVER = 'http://teste.webservices.scielo.org/';
#$DB_SERVER = 'http://192.168.1.77:5984/';
$DB_NAME   = 'scielobr1';
$LIMIT     = 10;
$LANG      = 'pt';
$FILESLANG = Array('pt','es','en','fr','it','af','de');

$COUCHDB_VIEWS["sci_alphabetic"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/title?include_docs=true';
$COUCHDB_VIEWS["sci_serial"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/title_id?include_docs=true&key="{pid}"';
$COUCHDB_VIEWS["sci_issue"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_id?include_docs=true&key="{pid}"';
$COUCHDB_VIEWS["sci_issues"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_id?include_docs=true&startkey="{pid}\\u9999"&endkey="{pid}"&descending=true';
$COUCHDB_VIEWS["issues_range"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_id/?startkey="{pid}\\u9999"&endkey="{pid}"&descending=true';
$COUCHDB_VIEWS["sci_issuetoc"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_id/?include_docs=true&startkey="{pid}"&endkey="{pid}\\u9999"';
$COUCHDB_VIEWS["sci_article"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_id/?include_docs=true&key="{pid}"';
$COUCHDB_VIEWS["articles_range"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_id/?&startkey="{pid}\\u9999"&endkey="{pid}"&descending=true';
$COUCHDB_QUERIES["journal_pressreleases"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/article_pr?include_docs=true&limit='.$LIMIT.'&startkey=["{pid}",{}]&endkey=["{pid}"]&descending=true';
$COUCHDB_QUERIES["issues_count_pid"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_count?key=["{pid}"]&group=true';
$COUCHDB_QUERIES["issues_count_all"] = $DB_SERVER.$DB_NAME.'/_design/couchdb/_view/issue_count?group=true';
?>