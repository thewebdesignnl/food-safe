<?php
// members.php
include("inc/config.php");

// Handle GET request to fetch members
function getMembers() {
    global $pdo;
    $statement = $pdo->prepare("SELECT id, name, e_mail FROM members ORDER BY id ASC");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Handle POST request to create a new member
function createMember($data) {
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO members (name, e_mail) VALUES (:name, :e_mail)");
    $statement->bindParam(':name', $data['name']);
    $statement->bindParam(':e_mail', $data['e_mail']);
    return $statement->execute();
}

// Handle PUT request to update an existing member
function updateMember($id, $data) {
    global $pdo;
    $statement = $pdo->prepare("UPDATE members SET name = :name, e_mail = :e_mail WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $data['name']);
    $statement->bindParam(':e_mail', $data['e_mail']);
    return $statement->execute();
}

// Handle DELETE request to delete a member
function deleteMember($id) {
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM members WHERE id = :id");
    $statement->bindParam(':id', $id);
    return $statement->execute();
}
?>
