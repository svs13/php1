<?php


function checkArrayValue(array $array, string $index) {

    if ( isset( $array[$index] ) ) {
        if ( is_string( $array[$index] ) ) {
            if ( '' !== $array[$index] ) {

                return true;
            }
        }
    }

    return false;
}