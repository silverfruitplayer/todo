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
        }
    }
}

function newElement() {
    $hideEmptyTxt;
    $li = '<li>' . htmlspecialchars($_POST["myInput"]) . '</li>';
    if ($_POST["myInput"] === ''){
        echo '<div id="emptytext">Please write something</div>';
        return;
    } else {
        echo $li;
    }
    // Additional logic...
}

function clearElement() {
    // Clear input logic...
}

function editElement() {
    // Edit element logic...
}

function checkEdits() {
    // Check edits logic...
}
?>
