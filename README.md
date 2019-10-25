# 说明
基于阿里云短信SDK V20170525整合而成的可供直接使用的工具包，可直接调于单条短信发送请求

* 安装
``` 
composer require dethan/dethan-aliyun-sms dev-master 
```

* 使用
```
$smsClient = new \Dethan\Dysms\SmsClient('key','secret','sign_name');
$response = $smsClient->sendSms('phone number', 'tmp_code', ['name'=> 'value in your template']);
```