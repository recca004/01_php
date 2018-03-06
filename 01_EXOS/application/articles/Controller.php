<?php
namespace application\articles;

include_once  SITE_PATH . '/application/articles/ModelPosts.php';
use includes\commons\ControllerCommon;
use application\articles\ModelPosts;
//use includes\Db;
/**
 * Page article
 */
class Controller extends ControllerCommon{



    protected function _setDatas(){
      $modelPosts=new ModelPosts();
        switch ($this->_action){
            case 'detail':
                //$modelPosts->article($this->_router);
                $this->_datas = $modelPosts->article($this->_router);
                $this->_view  = 'articles/article_detail';
                break;
            case 'show':

                $this->_view = 'articles/article_form';
                $this->_datas=$modelPosts->show($this->_router);
                
                break;
            case 'insert':
                //$this->_datas=$datas=$modelPosts->insert();
                $datas=$modelPosts->insert();
                if (empty($datas)){ $this->_view  = 'articles/articles';
                                    $this->_datas=$modelPosts->articles();
                }  else {
                                    $this->_view  = 'articles/article_form';
                                    $this->_datas=$datas;
                }
                $modelPosts->insert();
                 break;
            case 'del':
                $this->_datas=$modelPosts->del($this->_router);
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';

                break;
            case 'update':
               // $datas=$modelPosts->update($this->_router);
                $this->_datas=$modelPosts->update($this->_router);
                
                if (empty($datas)){ $this->_view  = 'articles/article_form';
                                    $this->_datas=$modelPosts->articles();
                               //$this->_datas = $datas;
                                  }else{
                $this->_datas=$modelPosts->update($this->_router);
                $this->_view  = 'articles/articles';
        }
               echo 'HEllo' ;
                break;
                
            default :
                $modelPosts->articles();
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';

                break;
        }

    }


}
