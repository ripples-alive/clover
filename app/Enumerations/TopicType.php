<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 上午12:12
 */

namespace Clover\Enumerations;

use Clover\Exceptions\EnumerationException;

class TopicType {

    const CONSULT = 1;

    const LECTURE = 2;

    const VIDEO = 3;

    private static $type_to_string_table = [
        self::CONSULT => 'consult',
        self::LECTURE => 'lecture',
        self::VIDEO => 'video',
    ];

    private static $string_to_type_table = [
        'consult' => self::CONSULT,
        'lecture' => self::LECTURE,
        'video' => self::VIDEO,
    ];

    public static function stringify($type)
    {
        if (!array_key_exists($type, self::$type_to_string_table)) {
            throw new EnumerationException('帖子类型错误');
        }

        return self::$type_to_string_table[$type];
    }

    public static function parse($type_string)
    {
        if (!array_key_exists($type_string, self::$string_to_type_table)) {
            throw new EnumerationException('帖子类型错误');
        }

        return self::$string_to_type_table[$type_string];
    }

} 