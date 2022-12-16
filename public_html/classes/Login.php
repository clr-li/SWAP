<?php
class Login {
    public static function isLoggedIn() {
        if (isset($_COOKIE['SID'])) {
            if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array('token'=>sha1($_COOKIE['SID'])))) {
                $user_id = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array('token'=>sha1($_COOKIE['SID'])))[0]['user_id'];
                
                if (isset($_COOKIE['SID_'])) {
                    return $user_id;
                }
            }
        }
        return false;
    }
}
?>