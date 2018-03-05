<?php

namespace application\articles;

use includes\Db;

class ModelPosts {

    public function articles() {
        $datas = array();

        $db = Db::connect();

        $results = $db->query('SELECT * FROM articles');

        if (!$db->errno && $results->num_rows > 0) {
            $datas['articles'] = $results;
        }


        $this->_datas = $datas;
    }

    public function article($id) {

       /* $id = $this->_router;*/
        $datas = array();

        $db = Db::connect();

        $results = $db->query('SELECT * FROM articles WHERE IdArticle = \'' . $db->real_escape_string($id) . '\'');

        if (!$db->errno && $results->num_rows > 0) {
            $datas['article'] = $results;
        }

        $this->_view = 'articles/article_detail';

        $this->_datas = $datas;
        return $datas;
    }

    public function show($id) {
$datass=[];

        if (!empty($id) && is_numeric($id)) {
            $this->_article($id);
            {

               /* $datas['article']->fetch_array();*/
                $datas['formUrl'] = SITE_URL . '/articles/update/' . $id;
            }
        } else {
            $datas['formUrl'] = SITE_URL . '/articles/insert/';
        }
        return $datas;
    }

    public function insert($id) {
        $datas = $_POST;



        if (empty($datas['TitleArticle'])) {
            $datas['error']['titleempty'] = true;
        }
        if (empty($datas['IntroArticle'])) {
            $datas['error']['introempty'] = true;
        }
        if (empty($datas['ContentArticle'])) {
            $datas['error']['contentempty'] = true;
        }
        if
        (isset($datas ['error'])) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return $datas;
        }


        $db = Db::connect();


        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);


        $query = 'INSERT INTO articles VALUES(NULL, \'' . $TitleArticle . '\', \'' . $IntroArticle . '\', \'' . $ContentArticle . '\')';
        $db->query($query);

        if ($db->errno) {
            die('Erreur lors du INSERT');
        }

        $this->_view = 'articles/articles';
        $this->_articles();

//        $this->_view  = 'articles/article_form';
    }

    public function del($idArticle) {

        $db = Db::connect();
        $id = $db->real_escape_string($this->_router);
        $query = 'DELETE FROM articles WHERE IdArticle =' . $id;
        $db->query($query);

        // if( $db->errno){
        //        $this->_view  = 'articles/article_form';
        //        $this->_datas= $datas;
        //        return;
        // }
        $this->_view = 'articles/articles';
        $this->_articles();
    }

    public function update($id) {

        $datas = $_POST;

        if (empty($id) && !is_numeric($id)) {


           
            return $datas;
        }

        if (empty($datas['TitleArticle'])) {
            $datas['error']['titleempty'] = true;
        }
        if (empty($datas['IntroArticle'])) {
            $datas['error']['introempty'] = true;
        }
        if (empty($datas['ContentArticle'])) {
            $datas['error']['contentempty'] = true;
        }
        if (isset($datas ['error'])) {
            
            return $datas;
        }
    
        $db = Db::connect();

        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);


        $query = 'UPDATE articles SET '
                . 'TitleArticle = \'' . $TitleArticle . '\' ,'
                . 'IntroArticle = \'' . $IntroArticle . '\','
                . 'ContentArticle = \'' . $ContentArticle . '\' '
                . 'WHERE IdArticle = ' . $this->_router;

        $db->query($query);
    }

}
