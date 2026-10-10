<?php
class Router {
    private $r = [];
    public function get($p,$h){ $this->r['GET'][$this->norm($p)]=$h; }
    public function post($p,$h){ $this->r['POST'][$this->norm($p)]=$h; }
    private function norm($p){
        $p = '/'.ltrim((string)$p,'/');
        if ($p !== '/') $p = rtrim($p,'/');
        return $p ?: '/';
    }
    public function dispatch($m,$p){
        $p = rawurldecode((string)$p);
        $script = str_replace('\\','/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
        $base = rtrim(str_replace('\\','/', dirname($script)), '/');
        if ($base === '.' || $base === '/') $base = '';

        // XAMPP sub-folder support: /Health_Setu/index.php -> /
        if ($base !== '' && ($p === $base || str_starts_with($p, $base.'/'))) {
            $p = substr($p, strlen($base));
        }
        if ($p === '/index.php' || $p === 'index.php' || $p === '') $p = '/';
        elseif (str_starts_with($p, '/index.php/')) $p = substr($p, strlen('/index.php'));

        $p = $this->norm($p);
        $h = $this->r[strtoupper($m)][$p] ?? null;
        if(!$h){ http_response_code(404); echo '<h1 style="font-family:Arial">404</h1><p style="font-family:Arial">Route not found: '.htmlspecialchars($p).'</p>'; return; }
        [$c,$a]=explode('@',$h,2);
        require_once __DIR__.'/../Controllers/'.$c.'.php';
        (new $c)->$a();
    }
}
