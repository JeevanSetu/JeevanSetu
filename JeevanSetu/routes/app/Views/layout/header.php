<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=htmlspecialchars($config['app_name'])?></title><link rel="stylesheet" href="<?=htmlspecialchars($config['base_url'])?>/assets/css/app.css"></head><body>
<nav class="hs-nav">
  <a class="brand hs-brand" href="<?=$config['base_url']?>/"><span class="brand-mark">♥</span><span class="brand-copy"><b>Health <em>Setu</em></b><small></small></span></a>
  <div class="navlinks hs-navlinks">
    <a class="nav-home" href="<?=$config['base_url']?>/">⌂ <span>Home</span></a>
    <a href="<?=$config['base_url']?>/doctors">♧ <span>Find Doctors</span></a>
    <a href="<?=$config['base_url']?>/#hospitals">▥ <span>Hospitals</span></a>
    <a class="nav-emergency" href="<?=$config['base_url']?>/emergency">♨ <span>Emergency</span></a>
    <?php if(!empty($_SESSION['user'])):?><a href="<?=$config['base_url']?>/dashboard">▦ <span>Dashboard</span></a><?php if(($_SESSION['user']['role_name']??'')==='super_admin'):?><a href="<?=$config['base_url']?>/admin">⚙ <span>Admin</span></a><?php endif?><a class="btn nav-login" href="<?=$config['base_url']?>/logout">Logout</a><?php else:?><a href="<?=$config['base_url']?>/doctor/register">♙ <span>For Doctors</span></a><a href="<?=$config['base_url']?>/#services">▦ <span>Services</span></a><a href="<?=$config['base_url']?>/#about">ⓘ <span>About</span></a><a class="btn nav-login" href="<?=$config['base_url']?>/login">♙ Login</a><a class="btn nav-signup" href="<?=$config['base_url']?>/patient/register">● Sign Up</a><?php endif?>
  </div>
</nav><main>
