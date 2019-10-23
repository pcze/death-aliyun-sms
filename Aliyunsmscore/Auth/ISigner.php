<?php

namespace Dethan\AliyunSmsCore\Auth;

interface ISigner
{
	public function  getSignatureMethod();
	
	public function  getSignatureVersion();
	
	public function signString($source, $accessSecret); 
}