<?php
namespace application\articles;

include_once SITE_PATH . '/application/articles/ModelPosts.php';

use application\articles\ModelPosts;
use includes\commons\ControllerCommon;
use includes\Db;
/**
 * Page article 
 */
class Controller extends ControllerCommon{
    
    protected function _setDatas(){
        
        $modelPosts = new ModelPosts();
        
        switch ($this->_action){
            case 'detail':
                $this->_datas = $modelPosts->article( $this->_router );
                $this->_view  = 'articles/article_detail';
                break;
            case 'show':
                $this->_datas = $modelPosts->show( $this->_router );
                $this->_view = 'articles/article_form';
                 break;
             
            case 'insert':
                $datas = $modelPosts->insert();
                if( empty( $datas ) )
                {
                    /* header pour rediriger sur la page des articles, quand l'ajout s'est déroulé correctement
                     * afin d'éviter de rajouter le même article en cas de rechargement de la page
                     */
                    header('location:'.SITE_URL.'/articles');
                }
                else
                {
                    $this->_view  = 'articles/article_form';
                    $this->_datas = $datas;
                }
                break;
                 
            case 'delete':
                $modelPosts->delete( $this->_router );
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';
                 break;
             
            case 'update':
                $datas = $modelPosts->update( $this->_router );
                if( empty( $datas ) )
                {
                    header('location:'.SITE_URL.'/articles');
                }
                else
                {
                    $this->_view  = 'articles/article_form';
                    $this->_datas = $datas;
                }
                break;
                
            default :
                $this->_datas = $modelPosts->articles();
                $this->_view  = 'articles/articles';
                break;
        }
    }


}