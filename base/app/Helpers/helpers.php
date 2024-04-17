<?php
namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;


function generateId($modelClass){
    $id = 0;
    $latestModel = $modelClass::latest('id')->first();

    if ($latestModel != null) {
        $id = $latestModel->id + 1;
    } else {
        $id += 1;
    }

    return $id;
}

function generateUniqueId($prefix, $length){
    $id = $prefix;
    $characters = '0123456789';
    $charactersLength = strlen($characters);

    for ($i = strlen($prefix); $i < $length; $i++) {
        $id .= $characters[rand(0, $charactersLength - 1)];
    }

    $id = $prefix;
    for ($i = strlen($prefix); $i < $length; $i++) {
        $id .= $characters[rand(0, $charactersLength - 1)];
    }
    return $id;
}

function mdCheckPassword($password, $hashedPassword) {
    $parts = explode('$', $hashedPassword);
    $salt = $parts[1];
    $recreatedHash='md5$'.$salt.'$'.md5($salt.$password);
    return $recreatedHash === $hashedPassword;
}

function mdMD5Password($password) {
    $salt = Str::random(22);
    return 'md5$'.$salt.'$'.md5($salt.$password);
}

function sendEmail(){
    $subject = 'Example Subject';
    $greeting = 'Hello!';
    $content = 'This is an example email.';
    $email = new SendMail($subject, $greeting, $content);
    Mail::to('recipient@example.com')->send($email);
    return 'Email sent successfully';
}

function getAmountINR($price){
    return '₹' . number_format($price, 2);
}

function getAmount($amount, $length = 2) {
    $amount = round($amount ?? 0, $length);
    return $amount + 0;
}

function strLimit($title = null, $length = 10) {
    return Str::limit($title, $length);
}

function removeElement($array, $value) {
    return array_diff($array, (is_array($value) ? $value : [$value]));
}

function titleToKey($text) {
    return strtolower(str_replace(' ', '_', $text));
}

function showDateTime($date, $format = 'Y-m-d h:i A') {
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function showMobileNumber($number) {
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function showEmailAddress($email) {
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}

function dateSort($a, $b) {
    return strtotime($a) - strtotime($b);
}

function dateSorting($arr) {
    usort($arr, "dateSort");
    return $arr;
}

function isImage($string) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension     = pathinfo($string, PATHINFO_EXTENSION);
    if (in_array($fileExtension, $allowedExtensions)) {
        return true;
    } else {
        return false;
    }
}

function isHtml($string) {
    if (preg_match('/<.*?>/', $string)) {
        return true;
    } else {
        return false;
    }
}

function getRealIP() {
    $ip = $_SERVER["REMOTE_ADDR"];

    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }

    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }

    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }

    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }

    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }

    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }
    return $ip;
}
