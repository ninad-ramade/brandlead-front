<?php 
require_once('common/CommonConstants.php');
class Model {
    
    public function callApi($url, $method, $params = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        if(!empty($params)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . CommonConstants::_API_AUTH_KEY_]);
        $response = curl_exec($ch);
        curl_close($ch);
        var_dump($response);exit;
    }
}

?>