<?php
require_once '../vendor/autoload.php';
use App\Classes\Blog;

if(isset($_POST['btn']))
{
    $blog = new Blog($_POST, $_FILES);
    $message = $blog->save();
    include 'home.php';
}
else if (isset($_GET['status']))
{
    if ($_GET['status'] == 'manage')
    {
        $blog = new Blog();
        $blogs = $blog->getAllBlogInfo();
        include 'manage.php';
    }
    else if ($_GET['status'] == 'edit')
    {
        $id = $_GET['id'];
        $blog = new Blog();
        $blogInfo = $blog->getBlogInfoById($id);
        extract($blogInfo);
        include 'edit.php';
    }
    else if($_GET['status'] == 'delete')
    {
        $id = $_GET['id'];
        $blog = new Blog();
        $blog->deleteBlogInfo($id);
    }
}

else if ($_POST['updateBtn'])
{
    $id             = $_POST['id'];
    $blog       = new Blog($_POST, $_FILES);
    $blogInfo    = $blog->getBlogInfoById($id);
    $blog->updateBlogInfo($blogInfo);
}