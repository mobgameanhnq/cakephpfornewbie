<?php 

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Paginator');

    public function index() {
    	$this->Paginator->settings = array(
	        'limit' => 10,
	        'fields' => ['id', 'title', 'created', 'slug']
	    );
	    $l_post = $this->Paginator->paginate('Post');

    	$this->loadModel('User');
	    $l_user = $this->User->find('all');

        $this->set('posts', [
        	'post_data' => $l_post,
        	'user_data' => $l_user
        ]);
    }

    public function listpost() {
    	$this->Paginator->settings = array(
	        'limit' => 10,
	        'fields' => ['id', 'title', 'created', 'slug', 'body']
	    );
	    $l_post = $this->Paginator->paginate('Post');

    	$this->loadModel('User');
	    $l_user = $this->User->find('all');

        $this->set('posts', [
        	'post_data' => $l_post,
        	'user_data' => $l_user
        ]);
    }

    public function getlastestpost() {
    	$this->autoRender = false;

    	$l_post = $this->Post->find( 'all', [
    		'limit' => 10,
    		'order' => ['created' => 'desc'],
    		'fields' => ['id', 'title', 'slug']
    	]);

    	echo json_encode($l_post);
    }

    public function view($id) {
    	if( !empty($id) ) {
	    	if( is_numeric($id) ) {
		        $post = $this->Post->findById($id);
	    	} else {
		        $post = $this->Post->findBySlug($id);
	    	}

	        if (!$post) {
	            throw new NotFoundException(__('Invalid post'));
	        }

	        // tăng view
	        $this->Post->updateAll( ['hit' => $post['Post']['hit'] + 1 ], ['id' => $post['Post']['id'] ] );
	    } else {
	    	throw new NotFoundException(__('Invalid post'));
	    }

    	$this->loadModel('User');
	    $l_user = $this->User->find('all');
        
        $this->set('data', [
        	'post' => $post['Post'],
        	'user_data' => $l_user
        ]);
    }

    public function add() {
	    if ($this->request->is('post')) {
	        //Added this line
	        $this->request->data['Post']['user_id'] = $this->Auth->user('id');

	        if ($this->Post->save($this->request->data)) {
	            $this->Flash->success(__('Your post has been saved.'));

	            return $this->redirect( array('controller' => 'Posts', 'action' => 'index') );
	        }

			
	    }
	}

    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ( $this->Post->save($this->request->data) ) {
	            $this->Flash->success(__('Your post has been updated.'));
	            return $this->redirect( array('controller' => 'Posts', 'action' => 'index') );
	        }
	        
	        $this->Flash->error(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Flash->success(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	    } else {
	        $this->Flash->error(
	            __('The post with id: %s could not be deleted.', h($id))
	        );
	    }

	    return $this->redirect( array('controller' => 'Posts', 'action' => 'index') );

	}

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'add') {
	        return true;
	    }

	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $postId = (int) $this->request->params['pass'][0];
	        if ($this->Post->isOwnedBy($postId, $user['id'])) {
	            return true;
	        }
	    }

	    return parent::isAuthorized($user);
	}
	
}