<?php

if(empty($_POST['name']) || strlen($_POST['name']) >= 20){
    $status['name'] = 'error';
    $request['name'] = 'error';
}
else $request['name'] = $_POST['name'];

if(!isset($_POST['grade']) || (int)$_POST['grade'] > 10 && (int)$_POST['grade'] < 0){
    $status['grade'] = 'error';
    $request['grade'] = 'error';
}
else $request['grade'] = $_POST['grade'];
    
if(empty($_POST['email']) || !preg_match('([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)', $_POST['email'])){
    $status['email'] = 'error';
    $request['email'] = 'error';
}
else $request['email'] = $_POST['email'];

if(empty($_POST['comments']) || strlen($_POST['comments']) >= 500){
    $status['comments'] = 'error';
    $request['comments'] = 'error';
}
else $request['comments'] = $_POST['comments'];

if(empty($status)){
    foreach($request as $key=>$value){
        $item[] = $key.":";
        $item[] = $value."\n";
    }
    $listString = implode('',$item)."\n";
    if(file_put_contents('file.txt', $listString , FILE_APPEND)){
        $stat = "success";
        $req = "";
        header('location: index.php?request='.$req.'&status='.$stat);
        echo 1;
    }
}
else {
    $stat = "error";
    $req = json_encode($request);
    header('location: index.php?request='.$req.'&status='.$stat);
    echo $req;
}



