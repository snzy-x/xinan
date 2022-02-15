<?php
function export_csv($data, $title, $filename)
{
    $filename = utf2gbk($filename . ".csv");
    $fileData = utf2gbk($title) . "\n";
    foreach ($data as $value) {
        $temp = $value["id"] . "," . $value["cdkey"] . "," . $value["days"];
        $fileData .= utf2gbk($temp) . "\n";
    }
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=" . $filename);
    header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    header("Expires:0");
    header("Pragma:public");
    echo $fileData;
    exit;
}
function utf2gbk($data)
{
    return iconv("utf-8", "GBK", $data);
}
function vip_status_str($user, $now = 0)
{
    if (!$now) {
        $now = time();
    }
    if (!$user["expiretime"]) {
        $vipstatus = "免费用户";
    } else {
        if ($user["expiretime"] > $now) {
            $leftsec = $user["expiretime"] - $now;
            if ($leftsec < 86400) {
                $vipstatus = "正式会员剩余：" . ceil($leftsec / 3600) . "小时";
            } else {
                $vipstatus = "正式会员剩余：" . ceil($leftsec / 86400) . "天";
            }
        } else {
            $passsec = $now - $user["expiretime"];
            if ($passsec < 86400) {
                $vipstatus = "正式会员已过期：" . ceil($passsec / 3600) . "小时";
            } else {
                $vipstatus = "正式会员已过期：" . ceil($passsec / 86400) . "天";
            }
        }
    }
    return $vipstatus;
}
function rand_str($length)
{
    $str = "abcdefghijklmnopqrstuvwxyz0123456789";
    $len = strlen($str) - 1;
    $randstr = '';
    $i = 0;
    while ($i < $length) {
        $num = mt_rand(0, $len);
        $randstr .= $str[$num];
        $i++;
    }
    return $randstr;
}
function num2letter($num)
{
    $num = intval($num);
    if ($num <= 0) {
        return false;
    }
    $letterArr = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $letter = '';
    $key = ($num - 1) % 26;
    $letter = $letterArr[$key] . $letter;
    $num = floor(($num - $key) / 26);
    while ($num > 0) {
        $key = ($num - 1) % 26;
        $letter = $letterArr[$key] . $letter;
        $num = floor(($num - $key) / 26);
    }
    return strtolower($letter) . ".";
}
function from61to10($str)
{
    $dict = "leNq7Af4dTUzt2poYrJM1Vsg8chOH9PWQFa0vwniIGj6uLDbKX5RmCSZByE3k";
    $len = strlen($str);
    $dec = 0;
    $i = 0;
    while ($i < $len) {
        $pos = strpos($dict, $str[$i]);
        $dec += $pos * pow(61, $len - $i - 1);
        $i++;
    }
    return $dec;
}
function from10to61($dec)
{
    $dict = "leNq7Af4dTUzt2poYrJM1Vsg8chOH9PWQFa0vwniIGj6uLDbKX5RmCSZByE3k";
    $result = '';
    $result = $dict[$dec % 61] . $result;
    $dec = intval($dec / 61);
    while ($dec != 0) {
        $result = $dict[$dec % 61] . $result;
        $dec = intval($dec / 61);
    }
    return $result;
}
function id2letter($uniacid, $id)
{
    return from10to61($uniacid) . "=" . from10to61($id) . substr(md5($uniacid . $id), 2, 1);
}
function letter2id($letter)
{
    if ($pos = strpos($letter, "&")) {
        $letter = substr($letter, 0, $pos);
    }
    $hash = substr($letter, -1);
    if (strpos($letter, "x") !== false) {
        $data = explode("x", substr($letter, 0, -1));
    } else {
        $data = explode("=", substr($letter, 0, -1));
    }
    if (isset($data[0]) && isset($data[1])) {
        if (!($uniacid = from61to10($data[0]))) {
            return false;
        }
        if (!($id = from61to10($data[1]))) {
            return false;
        }
        if (substr(md5($uniacid . $id), 2, 1) != $hash) {
            return false;
        }
        unset($_GET[$data[0]]);
        return array($uniacid, $id);
    } else {
        return false;
    }
}
function attachment_url($url)
{
    global $_GPC, $_W;
    if (strpos($url, "http") === 0) {
        return $url;
    } else {
        return $_W["attachurl"] . $url;
    }
}
function local_attachment_url($url)
{
    global $_GPC, $_W;
    if (strpos($url, "http") === 0) {
        return $url;
    } else {
        return $_W["attachurl_local"] . $url;
    }
}
function calc_link($link, $config)
{
    global $_GPC, $_W;
    $domain = '';
    if ($link["domain"]) {
        $domain = $link["domain"];
    } else {
        if ($config["domain"]) {
            $domain = $config["domain"];
        } else {
        }
    }
    $explode = explode("://", $domain);
    $scheme = "http";
    if (count($explode) == 2) {
        if (strtolower($explode[0]) == "https") {
            $scheme = "https";
        }
        $domain = $explode[1];
    }
    if (strpos($domain, "*.") === 0) {
        $baseurl = $scheme . "://" . num2letter($link["id"]) . substr($domain, 2) . "/";
    } else {
        if ($domain) {
            $baseurl = $scheme . "://" . $domain . "/";
        } else {
            $baseurl = $_W["siteroot"];
        }
    }
    if ($config["short"]) {
        return $baseurl . "s/?" . id2letter($_W["uniacid"], $link["id"]);
    } else {
        return $baseurl . "app/index.php?i={$_W["uniacid"]}&c=entry&a=wxapp&do=page&m=baiban_wxlinks&id=" . $link["id"];
    }
}
function get_access_token($appid, $secret)
{
    $content = ihttp_get("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}");
    if (is_error($content)) {
        return error(2, "请求微信服务器失败，错误详情: " . $content["message"]);
    }
    if (empty($content["content"])) {
        return error(2, "未能得到微信服务器反馈。");
    }
    $token = json_decode($content["content"], true);
    if (empty($token) || !is_array($token) || empty($token["access_token"]) || empty($token["expires_in"])) {
        return error(2, "appid或appsecret错误！错误代码:" . $token["errcode"]);
    }
    return $token["access_token"];
}
function create_wxacode($access_token, $path, $query)
{
    $content = ihttp_request("https://api.weixin.qq.com/wxa/generatescheme?access_token={$access_token}", json_encode(array("jump_wxa" => array("path" => $path ? $path : '', "query" => $query ? $query : '')), 256));
    if (is_error($content)) {
        return error(3, "请求微信服务器失败，错误详情: " . $content["message"]);
    }
    if (empty($content["content"])) {
        return error(3, "未能得到微信服务器反馈。");
    }
    $scheme = json_decode($content["content"], true);
    if (!isset($scheme["openlink"])) {
        switch ($scheme["errcode"]) {
            case "40001":
                return error(3, "appid或appsecret错误");
                break;
            case "40002":
                return error(3, "无权生成链接，个人认证小程序暂不支持生成链接");
                break;
            case "85079":
                return error(3, "小程序正式发布后才可生成链接");
                break;
            case "40013":
                return error(3, "生成链接权限被禁用");
                break;
            case "61007":
                return error(3, "无权生成链接，请尝试重新授权小程序");
                break;
            case "40165":
                return error(3, "页面参数不合规范，请按照提示填写，通常/pages开头，并确保页面存在。");
                break;
        }
        return error(3, "生成链接失败！错误代码：" . $scheme["errcode"]);
    }
    return $scheme["openlink"];
}
function sendWxappCustomNotice($data)
{
    if (empty($data)) {
        return error(-1, "参数错误");
    }
    $account_api = WeAccount::create();
    $token = $account_api->getAccessToken();
    if (is_error($token)) {
        return $token;
    }
    $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$token}";
    $response = ihttp_request($url, urldecode(json_encode($data)));
    if (is_error($response)) {
        return error(-1, "访问公众平台接口失败, 错误: {$response["message"]}");
    }
    $result = @json_decode($response["content"], true);
    if (empty($result)) {
        return error(-1, "接口调用失败, 元数据: {$response["meta"]}");
    } else {
        if (!empty($result["errcode"])) {
            return error(-1, "访问微信接口错误, 错误代码: {$result["errcode"]}, 错误信息: {$result["errmsg"]},错误详情：{$account_api->errorCode($result["errcode"])}");
        } else {
        }
    }
    return true;
}
function sensitiveText($text)
{
    if (empty($text)) {
        return error(-1, "参数错误");
    }
    $data = ["content" => $text];
    $account_api = WeAccount::create();
    $token = $account_api->getAccessToken();
    $url = "https://api.weixin.qq.com/wxa/msg_sec_check?access_token={$token}";
    $response = ihttp_request($url, json_encode($data, 256));
    if (is_error($response)) {
        return error(-1, "访问公众平台接口失败, 错误: {$response["message"]}");
    }
    $result = @json_decode($response["content"], true);
    if (empty($result)) {
        return error(-1, "接口调用失败, 元数据: {$response["meta"]}");
    } else {
        if (!empty($result["errcode"])) {
            return error(-1, $account_api->errorCode($result["errcode"]));
        } else {
        }
    }
    return true;
}
function sensitiveImg($path)
{
    if (!file_exists($path)) {
        return error(-1, "参数错误");
    }
    $data = array("media" => "@" . $path);
    $account_api = WeAccount::create();
    $token = $account_api->getAccessToken();
    $url = "https://api.weixin.qq.com/wxa/img_sec_check?access_token={$token}";
    $response = ihttp_request($url, $data);
    if (is_error($response)) {
        return error(-1, "访问公众平台接口失败, 错误: {$response["message"]}");
    }
    $result = @json_decode($response["content"], true);
    if (empty($result)) {
        return error(-1, "接口调用失败, 元数据: {$response["meta"]}");
    } else {
        if (!empty($result["errcode"])) {
            return error(-1, $account_api->errorCode($result["errcode"]));
        } else {
        }
    }
    return true;
}
function buyCheck($plugin)
{
    global $_W;
    return true;
    if (file_exists(IA_ROOT . "/addons/baiban_wxlinks_plugin_" . $plugin . "/lock.cert")) {
        $cert = file_get_contents(IA_ROOT . "/addons/baiban_wxlinks_plugin_" . $plugin . "/lock.cert");
        $cmp = md5($plugin . $_W["config"]["setting"]["authkey"]) . md5($_W["config"]["setting"]["authkey"] . "baiban(*^*%%^&\$*\$*^#%^^\$^%");
        if ($cert == $cmp) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}