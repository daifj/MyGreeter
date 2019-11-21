<?php
/**
 * Created by PhpStorm.
 * User: 41602
 * Date: 2019/11/21
 * Time: 18:56
 */

namespace MyGreeter;
class Client
{
    public $instance;//当前类实例
    //构造函数
    public function __construct()
    {

    }
    /*
     * $timestamp 随机指定时间戳，默认当前时间戳
     * return 返回问候语
     * */
    public function getGreeting($timestamp=''){
        //当前时间
        $time = $this->is_timestamp($timestamp);
        //早上好开始时间
        $good_morning_start_time = strtotime(date('Y-m-d',$time));
        //下午好开始时间
        $good_afternoon_start_time = strtotime(date('Y-m-d 12:00:00',$time));
        //晚上好开始时间
        $good_evening_start_time = strtotime(date('Y-m-d 18:00:00',$time));
        if($time>=$good_morning_start_time && $time<$good_afternoon_start_time) return "早上好";
        if($time>=$good_afternoon_start_time && $time<$good_evening_start_time) return "中午好";
        return "晚上好";
    }

    //验证是否是时间戳
    public function is_timestamp($timestamp) {
        if(empty($timestamp) || strtotime(date('Y-m-d H:i:s',$timestamp)) != $timestamp)
            return time();
        return $timestamp;
    }
}