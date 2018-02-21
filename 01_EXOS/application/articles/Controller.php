<?php

class Controller extends ControllerCommon {

    protected function _setDatas() {

        switch ($this->_action) {
            case 'detail':
                $this->_article();
                break;
            case 'show':
                $this->_show();
                $this->_formUrl();
                break;
            case 'insert':
                $this->_insert();
                break;
            case 'delete':
                $this->_delete();
                break;
            case 'update':
                $this->_update();
                break;
            default :
                $this->_articles();
                break;
        }
    }

    private function _articles() {
        $datas = array();

        $db = Db::connect();

        $results = $db->query('SELECT * FROM articles');

        if (!$db->errno && $results->num_rows > 0) {
            $datas['articles'] = $results;
        }

        $this->_view = 'articles/articles';
        $this->_datas = $datas;
    }

    private function _article() {
        $id = $_GET['id'];
        $datas = array();

        $db = Db::connect();

        $results = $db->query('SELECT * FROM articles WHERE IdArticle = \'' . $db->real_escape_string($id) . '\'');

        if (!$db->errno && $results->num_rows > 0) {
            $datas['article'] = $results;
        }

        $this->_view = 'articles/article_detail';
        $this->_datas = $datas;
    }

    private function _insert() {
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
        if (isset($datas['error'])) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return false;
        }

        $db = Db::connect();

        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);

        $query = 'INSERT INTO articles VALUES( NULL, \'' . $TitleArticle . '\', \'' . $IntroArticle . '\', \'' . $ContentArticle . '\' )';

        $db->query($query);

        if ($db->errno) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return false;
        }



        $this->_articles();
        $this->_view = 'articles/articles';
    }

    private function _delete() {


        $db = Db::connect();

        $id = $db->real_escape_string($_GET['id']);
        $query = 'DELETE FROM articles WHERE IdArticle = ' . $id;
        $db->query($query);


        $this->_articles();
        $this->_view = 'articles/articles';
    }

    private function _update() {


        $datas = $_POST;

        if (empty($_GET['id']) OR ! is_numeric($_GET['id'])) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return;
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

        if (isset($datas['error'])) {
            $this->_view = 'articles/article_form';
            $this->_datas = $datas;
            return;
        }

        $db = Db::connect();

        $TitleArticle = $db->real_escape_string($datas['TitleArticle']);
        $IntroArticle = $db->real_escape_string($datas['IntroArticle']);
        $ContentArticle = $db->real_escape_string($datas['ContentArticle']);

        $query = ('UPDATE articles SET '
                . 'TitleArticle =\'' . $TitleArticle . '\', '
                . 'IntroArticle =\'' . $IntroArticle . '\', '
                . 'ContentArticle =\'' . $ContentArticle . '\' '
                . 'WHERE IdArticle = ' . $_GET['id']);
        $db->query($query);

        $this->_articles();
    }

    private function _show() {
        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $this->_article($_GET['id']);
        }
        $this->_view = 'articles/article_form';
    }

    public function _formUrl() {

        if (isset($_GET['id'])) {
          $this->_datas = $this->_datas['article']->fetch_array();
          $this->_datas['formUrl'] = SITE_URL . '/articles/update/' . $_GET['id'];
        } else {
            $this->_datas['formUrl'] =  SITE_URL . '/articles/insert';
        }
    }

}
