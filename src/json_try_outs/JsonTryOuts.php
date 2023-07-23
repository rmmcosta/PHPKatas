<?php

namespace subclasses\json_try_outs;

class JsonTryOuts
{
    public static function jsonDeserializeDump(string $json): object|null
    {
        var_dump("json: ",$json,"json deserialize: ", json_decode($json), "json deserialize associative: ", json_decode($json, true));
        return json_decode($json);
    }

    public static function jsonSerializeDump(object $object): string
    {
        var_dump(json_encode($object));
        return json_encode($object);
    }

    public static function jsonSerializeWithoutCertainThings(object $object): string
    {
        return "";
    }
}