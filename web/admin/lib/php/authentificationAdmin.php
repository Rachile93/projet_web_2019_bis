<?php

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['se_connecter'])) {
            if (!empty($_POST['email'])) {
                $email = htmlspecialchars($_POST['email']);
            }
            if (!empty($_POST['pwd'])) {
                $pwd = htmlspecialchars($_POST['pwd']);
            }
            $query = "select * from administrateur where mail = :email and passeword = :pwd";
            $resultset = $cnx->prepare($query);
            $resultset->bindParam(':email', $email, PDO::PARAM_STR);
            $resultset->bindParam(':pwd', $pwd, PDO::PARAM_STR);
            $resultset->execute();
            $data = $resultset->fetchAll();
            if (count($data) == 1) {
                header('location: http://localhost:8080/projet_web_2019/web/admin/admin.php?page=liste_articles');
            }
        }
    }
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
