<?php

$cfg['LoginCookieValidity'] = 86400;
$cfg['MaxNavigationItems'] = 1000;
$cfg['NavigationTreeDefaultTabTable2'] = 'search';
$cfg['NavigationDisplayLogo'] = false;
$cfg['ShowDatabasesNavigationAsTree'] = false;
$cfg['NumRecentTables'] = 25;
$cfg['NumFavoriteTables'] = 25;
$cfg['ShowAll'] = true;
$cfg['ThemeDefault'] = 'metro';
$cfg['DefaultCharset'] = 'utf8';
$cfg['DefaultConnectionCollation'] = 'utf8_general_ci';

for ($i = 1; isset($hosts[$i - 1]); $i++) {
    $cfg['Servers'][$i]['ssl'] = true;
}
