<?php
include('../inc/conf.php');
$user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,level FROM t_users WHERE uid='$u_id' LIMIT 1"));

$tree = '';

$tree .= '{"id": "'.$u_login.'", "name": "'.$u_login.' ['.$user['level'].']"';

function tree_view($index)
    {
        global $tree;
        global $connect_db;
        $q = mysqli_query($connect_db, "SELECT uid,log,ref,level FROM t_users WHERE ref='$index'");
        if (!mysqli_num_rows($q))
            return;
        $tree .= ', "children": [';
        while ($arr = mysqli_fetch_assoc($q))
        {
            $tree .= '{"id": "'.$arr['log'].'", "name": "'.$arr['log'].' ['.$arr['level'].']"';
            tree_view($arr['uid']);
            $tree .= '}, ';
        }
        $tree .= ']';
    }
tree_view($u_id);
$tree .= '}';

$tree = str_replace('}, ]','} ]',$tree);


print_r($tree);

?>