<?php
namespace application\articles;

include_once SITE_PATH . '/application/articles/ModelPosts.php';

use application\articles\ModelPosts;
use includes\commons\ControllerCommon;

class Controller extends ControllerCommon
{
    
    protected function _setDatas()
    {
        $modelPosts = new ModelPosts();
        
        switch ( $this->_action )
        {
            case 'detail' : 
                $this->_datas = $modelPosts->article( $this->_router );
                $this->_view = 'articles/article_detail';
                break;
            
            case 'show' : 
                $this->_datas = $modelPosts->show( $this->_router );
                $this->_view = 'articles/article_form';
                break;
            
            case 'insert' : 
                
                $datas = $modelPosts->insert();
                
                if ( !empty( $datas['error']) )
                {
                    $datas['result'] = SAVE_ERROR;
                    $this->_view = 'articles/article_form';
                }
                else
                {
                    $datas = $modelPosts->articles();
                    $datas['result'] = SAVE_SUCCESS;
                    $this->_view = 'articles/articles';
                }
                
                $datas['formUrl'] = SITE_URL . '/articles/insert';
                
                $this->_datas = $datas;
                
                $this->displayResultMessage();
                
                break;
            
            case 'update' : 
                
                $datas = $modelPosts->update( $this->_router );
                
                if ( !empty( $datas['error']) )
                {
                    $datas['result'] = SAVE_ERROR;
                }
                else
                {
                    $datas = $modelPosts->article( $this->_router );
                    $datas['result'] = SAVE_SUCCESS;
                }
                
                $this->_view = 'articles/article_form';
                
                $this->_datas = $datas;
                $this->_datas['formUrl'] = SITE_URL . '/articles/update/' . $this->_router;
                
                $this->displayResultMessage();
                
                break;
            
            case 'delete' : 
                
                $datas = $modelPosts->delete( $this->_router );
                
                $this->_datas = $modelPosts->articles();
                
                if ( !empty( $datas['error'] ) )
                {
                    $this->_datas['error'] = $datas['error'];
                    $this->_datas['result'] = REMOVE_ERROR;
                }
                else
                {
                    $this->_datas['result'] = REMOVE_SUCCESS;
                }
                
                $this->_view = 'articles/articles';
                
                $this->displayResultMessage();
                
                break;

            default : 
                $this->_datas = $modelPosts->articles();
                $this->_view = 'articles/articles';
                break;
        }
        
        $this->_datas['backUrl'] = $modelPosts->backUrl( $this->_page, $this->_action, $this->_router );
        
    }
    
}
