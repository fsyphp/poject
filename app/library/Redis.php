<?php
    class Redis{
                //1. 创建redis对象
            public static $rds;
            //初始化redis 
            public static function con(){
                $redis=new Redis;
                $redis->connect('127.0.0.1',6379);
                $redis->auth('689230');
                $redis->select(0);
                    if(!self::$rds){
                        self::$rds=$redis;
                    }
                    return self::$rds;
            }
    }