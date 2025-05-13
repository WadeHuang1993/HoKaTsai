<?php


namespace App\Libraries;


use Carbon\Carbon;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

class MongoDB
{
    /**
     * 將 Mongo 的 _id 戳記轉換出日期
     * @param string $id 編號
     * @param string $datetimeFormat 日期格式如 "Y-m-d"
     * @param string $timezone 時區
     * @return false|string
     */
    public static function mongoIdToDateTime(string $id, string $datetimeFormat, $timezone = 'Asia/Taipei')
    {
        $objectId = new ObjectId($id);
        $timestamp = $objectId->getTimestamp();
        $carbon = Carbon::createFromTimestamp($timestamp, $timezone);
        return $carbon->format($datetimeFormat);
    }

    /**
     * 透過指定日期時間，取得 Mongo ObjectId
     *
     * @param string $timeString 時間字串，如 2019-01-01 12:52:14 或 2019-01-01 ，只要是時間字串即可
     * @return ObjectId 返回 Mongo _id 格式
     * @throws \Exception
     */
    public static function getObjectIdFromTimeString(string $timeString): ObjectId
    {
        $timestamp = strtotime($timeString);
        try {
            return new ObjectId(dechex($timestamp) . str_repeat("0", 16));
        }
        catch (\Exception $exception){
            $title = "透過指定日期時間 '{$timeString}'，取得 Mongo ObjectId 的日期超出，因此無法轉換。";
            throw new \Exception($title);
        }
    }

    /**
     * 用來比對 MongoDB 的欄位如 created_at/updated_at 型態是 ISODate
     * @param string $timeString 日期時間格式，例如 "2020-12-12 00:00:00" 或是僅有日期
     * @return UTCDateTime
     * @throws \Exception
     */
    public static function getDatetimeFromTimeString(string $timeString)
    {
        return new UTCDateTime(new \DateTime($timeString));
    }

    /**
     * 將 MongoDB 紀錄的時間格式，轉換如 "2020-01-01 00:52:31"
     * @param string $format
     * @param UTCDateTime $UTCDateTime
     * @param string $timezone
     * @return string
     */
    public static function getDatetimeFromUTCDateTime(string $format, UTCDateTime $UTCDateTime, $timezone = 'Asia/Taipei'): string
    {
        $timestamp = $UTCDateTime->toDateTime()->getTimestamp();
        $carbon = Carbon::createFromTimestamp($timestamp, $timezone);
        return $carbon->format($format);
    }
}
