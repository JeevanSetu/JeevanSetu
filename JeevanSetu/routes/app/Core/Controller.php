<?php
class Controller {
 protected function base(){ $s=str_replace('\\','/',$_SERVER['SCRIPT_NAME']??'/index.php');$d=rtrim(str_replace('\\','/',dirname($s)),'/');return ($d==='.'||$d==='/')?'':$d; }
 protected function view($v,$data=[]){extract($data);$config=require __DIR__.'/../../config/config.php';$config['base_url']=$this->base();include __DIR__.'/../Views/layout/header.php';include __DIR__.'/../Views/'.$v.'.php';include __DIR__.'/../Views/layout/footer.php';}
 protected function json($x,$s=200){http_response_code($s);header('Content-Type: application/json');echo json_encode($x);exit;}
 protected function go($path){header('Location: '.$this->base().$path);exit;}
 protected function auth($roles=[]){if(empty($_SESSION['user']))$this->go('/login');if($roles && !in_array($_SESSION['user']['role_name']??'', $roles,true)){http_response_code(403);die('403 - Access denied');}}
}