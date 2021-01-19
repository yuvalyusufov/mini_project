<?php
require 'Contact.php';

if (isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['phone']) &&
    isset($_POST['id'])
) {
    $contact = new Contact($_POST);
    $contact->save();
}

if (isset($_POST['contacts'])) {
    echo json_encode(Contact::getContacts());
}




?>