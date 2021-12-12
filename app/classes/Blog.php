<?php
namespace App\Classes;
class Blog
{
    private $title;
    private $author;
    private $description;
    private $imageName;
    private $imageUrl;
    private $directory;
    private $file;
    private $link;
    private $sql;
    private $queryResult;
    private $row;
    private $data = [];
    private $i;

    public function __construct($data = null, $file = null)
    {
        if ($data)
        {
            $this->title = $data['title'];
            $this->author = $data['author'];
            $this->description = $data['description'];
        }
        if ($file)
        {
            $this->file = $file;
        }
    }

    protected function getImageUrl()
    {
        $this->imageName = $this->file['image']['name'];
        $this->directory = '../assets/images/'. $this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'the_blog');
        if ($this->link)
        {
            if(empty($this->file['image']['name']))
            {
                $this->imageUrl = '';
            }
            else
            {
                $this->imageUrl = $this->getImageUrl();
            }
            $this->sql = "INSERT INTO blogs (title, author, description, image) VALUES ('$this->title', '$this->author',  '$this->description', '$this->imageUrl')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Blog Info Created Successfully!';
            }
            else
            {
                die('Query Problem.'.mysqli_error($this->link));
            }
        }
    }

    public function getAllBlogInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'the_blog');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM blogs";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id'] = $this->row['id'];
                    $this->data[$this->i]['title'] = $this->row['title'];
                    $this->data[$this->i]['author'] = $this->row['author'];
                    $this->data[$this->i]['image'] = $this->row['image'];
                    $this->i++;
                }
                return $this->data;
            }
            else
            {
                die('Query Problem.'.mysqli_error($this->link));
            }
        }
    }

    public function getBlogInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'the_blog');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM blogs WHERE id = '$id'";
            if(mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                return mysqli_fetch_assoc($this->queryResult);
            }
            else
            {
                die('Query Problem.'.mysqli_error($this->link));
            }

        }
    }

    public function updateBlogInfo($blogInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'the_blog');
        if ($this->link)
        {
            if (empty($this->file['image']['name']))
            {
                $this->imageUrl = $blogInfo['image'];
            }
            else
            {
                if (file_exists($blogInfo['image']))
                {
                    unlink($blogInfo['image']);
                }
                $this->imageUrl = $this->getImageUrl();
            }
            $this->sql = "UPDATE blogs SET title = '$this->title', author= '$this->author',  description = '$this->description', image = '$this->imageUrl' WHERE id = '$blogInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Blog Info Update Successfully!';
                header('Location: action.php?status=manage');
            }
            else
            {
                die('Query Problem.'.mysqli_error($this->link));
            }
        }
    }

    public function deleteBlogInfo($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'the_blog');
        if ($this->link)
        {
            $this->row = $this->getBlogInfoById($id);
            if (file_exists($this->row['image']))
            {
                unlink($this->row['image']);
            }
            $this->sql = "DELETE FROM blogs WHERE id = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Blog Info Deleted Successfully!';
                header('Location: action.php?status=manage');
            }
            else
            {
                die("Query Problem.".mysqli_error($this->link));
            }
        }
    }
}