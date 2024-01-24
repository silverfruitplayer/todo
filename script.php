<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "newElement":
                newElement();
                break;
            case "clearElement":
                clearElement();
                break;
            case "editElement":
                editElement();
                break;
            case "checkEdits":
                checkEdits();
                break;
        }
    }
}

function newElement() {
    if (isset($_POST["myInput"])) {
        $hideEmptyTxt;
        $li = '<li>' . htmlspecialchars($_POST["myInput"]) . '</li>';
        if ($_POST["myInput"] === ''){
            echo '<div id="emptytext">Please write something</div>';
            return;
        } else {
            echo $li;
        }
        saveNoteToFile($_POST["myInput"]);
    }
}

function clearElement() {
    echo "Cleared input successfully";
}

function editElement() {

    echo "Edited element successfully";
}

function checkEdits() {
    echo "Checked edits successfully";
}

function saveNoteToFile($note) {
    $file = 'notes.txt';
    $current = file_get_contents($file);
    $current .= $note . PHP_EOL;
    file_put_contents($file, $current);
}
?>
