<?php
namespace Dethan\Dysms;

use Dethan\AliyunSmsCore\Config;
use Dethan\AliyunSmsCore\DefaultAcsClient;
use Dethan\AliyunSmsCore\Profile\DefaultProfile;
use Dethan\Dysmsapi\Request\V20170525\SendSmsRequest;

class SmsClient {
	public $access_key;
	public $access_secret;
	public $sign_name;
	
	//短信API产品名
	public $product = 'Dysmsapi';
	//短信API产品域名
	public $domain = 'dysmsapi.aliyuncs.com';
	//暂时不支持多Region
	public $region = 'cn-hangzhou';
	// 服务结点
    public $endPointName = 'cn-hangzhou';
	
	public function __construct($access_key,$access_secret,$sign_name){
		$this->access_key = $access_key;
		$this->access_secret = $access_secret;
		$this->sign_name = $sign_name;
		//初始化访问的acsCleint
        Config::load();
	}
	
    public function sendSms($to, $template_code, $data, $outId = '')
    {
		DefaultProfile::addEndpoint($this->endPointName, $this->region, $this->product, $this->domain);
        $profile = DefaultProfile::getProfile($this->region, $this->access_key, $this->access_secret);
        $acsClient= new DefaultAcsClient($profile);

        $request = new SendSmsRequest();
        //必填-短信接收号码
        $request->setPhoneNumbers($to);
        //必填-短信签名
        $request->setSignName($this->sign_name);
        //必填-短信模板Code
        $request->setTemplateCode($template_code);
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        if ($data) {
            $request->setTemplateParam(json_encode($data,JSON_UNESCAPED_UNICODE));
        }

        //选填-发送短信流水号
        if ($outId) {
            $request->setOutId($outId);
        }

        //发起访问请求
        return $acsClient->getAcsResponse($request);
    }
}


?>