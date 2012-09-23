#!/usr/bin/php

<?php
function print_menu(array $choices, array $actions)
{
    foreach ($choices as $choice => $desc) {
        echo "($choice) $desc", "\n";
    }
    $choices = implode(",", array_keys($choices));
    echo "What is your choice ? [$choices] ";
    $res = fopen("php://stdin", "r+");
    while ( ($choice = fgets($res)) ) {
        $choice = trim($choice);
        if (! isset($actions[$choice]))
            echo "Error !";
        else {
            call_user_func($actions[$choice]);
        }
    }
    fclose($res);
}

function quit_program()
{
    echo "\n", "Thanks for using dev-box.", "\n";
    exit;
}

function generate_po()
{

}

function generate_and_deploy()
{
    generate_po();
}

print_menu(
    /* Labels */
    array(
        "G" => "Generate PO files.",
        "D" => "Generate & Deploy PO & MO files",
        "Q" => "Quit"),
    /* Actions */
    array(
        "G" => "generate_po",
        "D" => "generate_and_deploy",
        "Q" => "quit_program"));

?>
