<?php
function sendMessage($chatId, $text) {
  global $config;
  $url = 'https://api.telegram.org/bot' . $config['token'] . '/';
  $response = file_get_contents($url . 'sendMessage?disable_web_page_preview=true&parse_mode=html&chat_id=' . $chatId . '&text=' . urlencode($text));
  //Might use http_build_query in the future
}

function getCurrentReward() {
  $json = file_get_contents('https://securenodes.eu.zensystem.io/api/grid/nodes?_search=false&nd=1527582142968&rows=30&page=1&sidx=fqdn&sord=asc');
  $data = json_decode($json, true);
  return $data['userdata']['estearn'];
}

function getCurrentPrice() {
  $bittrexJson = file_get_contents('https://bittrex.com/Api/v2.0/pub/market/GetMarketSummary?marketName=BTC-ZEN');
  $prices = json_decode($bittrexJson, true);
  return 'Last ZenCash price: ' . number_format($prices['result']['Last'], 8) . '
24h High: ' . number_format($prices['result']['High'], 8) . '
24h Low: ' . number_format($prices['result']['Low'], 8);
}

function getLastOnlineAdmins() {

}