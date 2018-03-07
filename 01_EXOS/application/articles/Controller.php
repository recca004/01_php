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
                $this->_datas = $modelPosts->article($this->_router);
                $this->_view  = 'articles/article_detail';
                break;
            case 'show':
                $this->_view = 'articles/article_form';
                $this->_datas=$modelPosts->show($this->_router);
                
                break;

            case 'del':
                $this->_datas=$modelPosts->del($this->_router);
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';

                break;
            case 'insert':
                $this->_datas=$modelPosts->insert();
 
                if (empty($datas)){ 
                    header('location:'.SITE_URL.'/articles');
                    
                }  else {
                    $this->_view  = 'articles/article_form';
                }
                break;
            case 'update':
                $this->_datas=$modelPosts->update($this->_router);
                if (empty($datas)){ 
                    header('location:'.SITE_URL.'/articles');
                    
                }  else {
                    $this->_view  = 'articles/article_form';
                                    
                }
                break;
                
            default :
                $modelPosts->articles();
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';

                break;
        }

    }


}
