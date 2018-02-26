<?php

namespace application\articles;

include_once SITE_PATH .'application/articles/ModelPosts';

use application\articles\ModelPosts;
use includes\commons\ControllerCommon;
use includes\Db;

class Controller extends ControllerCommon {

    protected function _setDatas() {
        
        $modelPosts = new ModelPosts();

        switch ($this->_action) {
            case 'detail':
                $this->datas = $modelPosts->article();
                $this->_view = 'articles/article_detail';
                break;
            case 'show':
                $this->datas = $modelPosts->show( $this->_router);
                $this->_view = 'articles/article_form';
                break;
            case 'insert':
                $datas = $modelPosts->insert();
                if (empty($datas)) {
                    $this->_view = 'articles/articles';
                    $this->_datas = $modelPosts->articles;
                } else {
                    $this->_view = 'articles/article_form';
                    $this->_datas = $datas;
                }
                break;
                
            case 'delete':
                $datas = $modelPosts->update( $this->_router );
                $this->_datas = $modelPosts->articles();
                $this->_view = 'articles/articles';
                break;
            
            case 'update':
                $modelPosts->update( $this->_router );
                 if (empty($datas)) {
                    $this->_view = 'articles/articles';
                    $this->_datas = $modelPosts->articles;
                } else {
                    $this->_view = 'articles/article_form';
                    $this->_datas = $datas;
                }
                break;


            default :
                $modelPosts->articles();
                $this->_datas = $modelPosts->articles();
                $this->_view = 'articles/article_detail';
                break;
        }
    }

    

}
