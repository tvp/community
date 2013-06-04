<?php

class DashboardController extends Controller
{
    public function actionIndex()
    {
        $groups = Group::model()->findAll();
        $posts = Post::model()->with('group')->with('author')->findAll(array('order'=>'created desc'));
        $this->render('index', compact('groups', 'posts'));
    }

    public function actionRead($id)
    {
        if(isset($_POST['message'])) {
            $post = new Post();
            $post->user_id = Yii::app()->user->id;
            $post->created = date('Y-m-d H:i:s');
            $post->message = $_POST['message'];
            $post->group_id = $id;
            $post->save(true);
            $this->redirect(array('read', 'id'=>$id));
        }

        $groups = Group::model()->findAll();
        $group  = Group::model()->findByPk($id);
        $posts = Post::model()->with('author')->findAll(array('condition'=>"group_id=".$id,'order'=>'created desc'));

        $this->render('read', compact('groups', 'group', 'posts'));
    }
}