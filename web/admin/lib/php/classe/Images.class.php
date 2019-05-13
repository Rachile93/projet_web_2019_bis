<?php

class Images {

    //put your code here
    private $cnx;

    public function __construct($cnx) {
        $this->cnx = $cnx;
    }

    public function selection_images($id_article) {

        $query = "select * from images where id_article=:id_article";
        $resultset = $this->cnx->prepare($query);
        $resultset->bindParam(':id_article',$id_article , PDO::PARAM_INT);
        $resultset->execute();
        $data_images = $resultset->fetchAll();
        return $data_images;
    }

}
