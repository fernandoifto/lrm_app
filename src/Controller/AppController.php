<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $paginate = [
        'limit' => 10
    ];
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
           'authenticate'=>[
               'Form'=>[
                   'fields'=>['username'=>'email']
               ]
           ],
           'logoutRedirect' => [
                'prefix' => 'admin',
                'controller' => 'Agendamentos',
                'action' => 'index'
            ]
        ]);
        $this->_validViewOptions[] = 'pdfConfig';
    }
    
    public function beforeFilter(Event $event){
       $prefix = null;

       if(isset($this->request->params['prefix'])){
            $prefix = $this->request->params['prefix'];
            $this->Auth->allow(['login']);
       }
       if($prefix != 'admin'){
           $this->Auth->allow();
       }
        
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
       $prefix = null;

       if(isset($this->request->params['prefix'])){
            $prefix = $this->request->params['prefix'];
       }
       if($prefix == 'admin'){
            $this->viewBuilder()->theme('TwitterBootstrap');
            $this->set('project_name','LRM');     
       }
       $this->set('user_auth', $this->Auth->user());
    }
}
