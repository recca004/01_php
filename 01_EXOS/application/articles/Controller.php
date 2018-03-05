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


        $modelPosts = new modelPosts;

        switch ($this->_action) {
            case 'detail':
                $this->_view = 'articles/articles_detail';
                $this->_datas = $modelPosts->article();
                break;
            case 'show':
                $modelPosts->show();
                $this->_datas = $modelPosts->show($this_router);
                $this->_view = 'articles/articles_form';

                $modelPosts->formUrl();
                break;
            
            case 'insert':
                $datas = $modelPosts->insert();
                break;
            case 'del':
                $modelPosts->del();
                $this->_datas = $modelPosts->articles();

                $this->_view = 'articles/articles';
                ;


            case 'update':
                $modelPosts->update();
                 $this->_view = 'articles/articles';
            $this->_datas = $datas;
                break;
            default :

                $this->_datas = $modelPosts->articles();

                $this->_view = 'articles/articles';
                break;
        }
    }

}
