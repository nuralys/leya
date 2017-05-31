<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller', 'CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('App');

	public $components = array('DebugKit.Toolbar', 'Cookie', 'Session', 'Auth' => array(
            'loginRedirect' => '/admin/',
            'logoutRedirect' => '/',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        ));
	public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {

        parent::beforeFilter();

        // debug($this->request->params['prefix']);
        $admin = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') ? 'admin/' : false;
        if(!$admin) $this->Auth->allow();
        if($admin){
            $this->layout = 'default';
        }else{
            if($this->params['controller']=='pages' && $this->params['action']=='index'){
                $this->layout = 'index';
            }elseif($this->params['controller']=='projects' && $this->params['action']=='index'){
                $this->layout = 'projects';
                
                //projects inner pages
            }elseif($this->params['controller']=='projects' && $this->params['action']=='description'){
                $this->layout = 'one_project';
            }elseif($this->params['controller']=='projects' && $this->params['action']=='plan'){
                $this->layout = 'one_project';
            }elseif($this->params['controller']=='projects' && $this->params['action']=='location'){
                $this->layout = 'one_project';
            }elseif($this->params['controller']=='projects' && $this->params['action']=='gallery'){
                $this->layout = 'one_project';
                //projects inner pages end
            }elseif($this->params['controller']=='leaderships' && $this->params['action']=='index'){
                $this->layout = 'reviews';
            }elseif($this->params['controller']=='reviews' && $this->params['action']=='index'){
                $this->layout = 'reviews';
            }elseif($this->params['controller']=='constructions' && $this->params['action']=='index'){
                $this->layout = 'hodstr1';
            }elseif($this->params['controller']=='constructions' && $this->params['action']=='view'){
                $this->layout = 'hodstr';
            }elseif($this->params['controller']=='pages' && $this->params['action']=='page'){
                $this->layout = 'about';
            }elseif($this->params['controller']=='news' && $this->params['action']=='view'){
                $this->layout = 'about';
            }else{
               $this->layout = 'page';
            }
        }

        if(isset($this->params['language']) && $this->params['language'] == 'kz'){
            Configure::write('Config.language', 'kz');

        }elseif(isset($this->params['language']) && $this->params['language'] == 'en'){
            Configure::write('Config.language', 'en');
        }else{
            Configure::write('Config.language', 'ru');
        }
        
        $lang = ($this->params['language']) ? $this->params['language'] . '/' : '';
        $this->set(compact('admin', 'lang', 'services'));

    }

}
