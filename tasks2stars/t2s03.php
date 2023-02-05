<?php

// Найдите все анаграммы в векторе слов. Функция должна возвращать вектор векторов, где каждый подвектор - это набор
// слов, которые являются анаграммой друг к другу. Слова без анаграмм не должны попадать в результат. Если анаграмм
// во входящем векторе нет - возвращается подвектор со строкой "anagrams not found!"

//Примеры:
//[["veer","ever"],["lake","kale"],["item","mite"]]  == solution(["veer","lake","item","kale","mite","ever","rev"])
//[["meat","team","mate","mate"]]  == solution(["meat","mat","team","mate","eat","mate"])
//[["anagrams not found!"]]  == solution(["there","is","no","anagrams","foo","bar"])
//[["guohc","guohc","cough"],["osls","osls"],["nitwer","trnwie"],["distribution","oriintdusbti"],["water","water"],["nuaegalg","gelugaan"]]  == solution(["guohc","guohc","cough","morning","adigrne","osls","sneeze","knowledge","nitwer","distribution","water","ewvi","event","oriintdusbti","trnwie","water","nuaegalg","osls","gelugaan","question"])


function solution(array $words)
{
    $sortArray = [];
    foreach ($words as $key => $word) {
        $chars = str_split($word); //разбить на символы
        sort($chars); //и отсортировать их
        $chars = implode('', $chars); //слить обратно в строку

        $sortArray[$chars][] = $word;
    }

    $res = [];
    foreach ($sortArray as $item) {
        if (count($item) > 1) {
            $res[] = $item;
        }
    }

    if (empty($res)) {
        return "anagrams not found!";
    }
    return $res;
}

print_r(solution(["veer","lake","item","kale","mite","ever","rev"]));