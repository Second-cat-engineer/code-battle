<?php

function solution($code)
{
    switch ($code) {
        case 100 <= $code && $code < 200:
            return "informational";
        case 200 <= $code && $code < 300:
            return "success";
        case 300 <= $code && $code < 400:
            return "redirection";
        case 400 <= $code && $code < 500:
            return "client error";
        case 500 <= $code && $code < 600:
            return "server error";
    }

    return "unrecognized";
}

echo solution(419);