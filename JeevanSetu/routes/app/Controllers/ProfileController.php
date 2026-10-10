<?php
class ProfileController extends Controller{
 function index(){
  $this->auth(); $db=Database::db(); $uid=$_SESSION['user']['id'];
  $q=$db->prepare('SELECT users.*,roles.name role_name,addresses.address_line1,addresses.address_line2,addresses.pincode,addresses.city,addresses.state,addresses.country FROM users JOIN roles ON roles.id=users.role_id LEFT JOIN addresses ON addresses.user_id=users.id AND addresses.addressable_type="user" WHERE users.id=? LIMIT 1');$q->execute([$uid]);$p=$q->fetch(PDO::FETCH_ASSOC);
  $doctor=null;$patient=null;
  if($p['role_name']==='doctor'){$q=$db->prepare('SELECT doctors.*,specializations.name specialization_name FROM doctors LEFT JOIN specializations ON specializations.id=doctors.specialization_id WHERE doctors.user_id=?');$q->execute([$uid]);$doctor=$q->fetch(PDO::FETCH_ASSOC);}
  if($p['role_name']==='patient'){$q=$db->prepare('SELECT * FROM patient_profiles WHERE user_id=?');$q->execute([$uid]);$patient=$q->fetch(PDO::FETCH_ASSOC);}
  $this->view('profile/index',['profile'=>$p,'doctor'=>$doctor,'patient'=>$patient]);
 }
 function edit(){
  $this->auth(['patient','doctor']);$db=Database::db();$uid=$_SESSION['user']['id'];$q=$db->prepare('SELECT users.*,addresses.address_line1,addresses.address_line2,addresses.pincode,addresses.city,addresses.state,addresses.country FROM users LEFT JOIN addresses ON addresses.user_id=users.id AND addresses.addressable_type="user" WHERE users.id=? LIMIT 1');$q->execute([$uid]);$p=$q->fetch(PDO::FETCH_ASSOC);$this->view('profile/edit',['profile'=>$p]);
 }
 function update(){
  $this->auth(['patient','doctor']);$db=Database::db();$uid=$_SESSION['user']['id'];$photo=$_SESSION['user']['photo']??null;
  if(!empty($_FILES['photo']['name']) && $_FILES['photo']['error']===UPLOAD_ERR_OK){$ext=strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));if(in_array($ext,['jpg','jpeg','png','webp'])){$dir=__DIR__.'/../../uploads/profiles';if(!is_dir($dir))mkdir($dir,0775,true);$name='user_'.$uid.'_'.time().'.'.$ext;move_uploaded_file($_FILES['photo']['tmp_name'],$dir.'/'.$name);$photo='uploads/profiles/'.$name;}}
  $db->prepare('UPDATE users SET name=?,phone=?,email=?,aadhaar_no=?,pan_no=?,photo=? WHERE id=?')->execute([trim($_POST['name']),trim($_POST['phone']),trim($_POST['email']),trim($_POST['aadhaar_no']),strtoupper(trim($_POST['pan_no'])),$photo,$uid]);
  $q=$db->prepare('SELECT id FROM addresses WHERE user_id=? AND addressable_type="user" LIMIT 1');$q->execute([$uid]);$aid=$q->fetchColumn();if($aid)$db->prepare('UPDATE addresses SET address_line1=?,address_line2=?,pincode=?,city=?,state=?,country=? WHERE id=?')->execute([$_POST['address_line1'],$_POST['address_line2'],$_POST['pincode'],$_POST['city'],$_POST['state'],$_POST['country']?:'India',$aid]);
  $_SESSION['user']['name']=$_POST['name'];$_SESSION['user']['photo']=$photo;$_SESSION['flash']='Profile updated successfully.';$this->go('/profile');
 }
}
