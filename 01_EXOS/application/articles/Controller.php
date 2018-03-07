<?php

namespace application\articles;

include_once SITE_PATH . '/application/articles/ModelPosts.php';

use application\articles\ModelPosts;
use includes\commons\ControllerCommon;
use includes\Db;

/**
 * Page article 
 */
class Controller extends ControllerCommon {

    protected function _setDatas() {


        $modelPosts = new ModelPosts;

        switch ($this->_action) {
            case 'detail':
                $this->_view = 'articles/articles_detail';
                $this->_datas = $modelPosts->article($this->_router);
                break;

            case 'show':

                $this->_datas = $modelPosts->show($this->_router);
                $this->_view = 'articles/article_form';
                break;

            case 'insert':
                $this->_datas = $modelPosts->insert();
                if (empty($this->_datas)) {
                    header('location:' . SITE_URL . '/ARTICLES');
                    //  $this->_view = 'articles/articles';
                    // $this->_datas = $modelPosts->articles();
                } else {
                    $this->_view = 'articles/article_form';
                }

                break;
                
            case 'del':
                $modelPosts->del();
                $this->_datas = $modelPosts->articles();

                $this->_view = 'articles/articles';


            case 'update':
                
                $modelPosts->update($this->_router);
                $this->_view = 'articles/articles';
                $this->_datas = $datas;
                
                if (empty($this->_datas)) {
                    header('location:' . SITE_URL . '/ARTICLES');
                    //  $this->_view = 'articles/articles';
                    // $this->_datas = $modelPosts->articles();
                } else {
                    $this->_view = 'articles/article_form';
                }
                
                break;
            default :

                $this->_datas = $modelPosts->articles();

                $this->_view = 'articles/articles';
                break;
        }
    }

}
