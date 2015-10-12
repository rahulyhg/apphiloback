<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Blog_Model extends CI_Model
{
public function create($title,$json,$content,$url,$image)
{
$query=$this->db->query("INSERT INTO `webapp_blog`( `title`, `json`, `content`, `image`) VALUES (".$this->db->escape($title).",".$this->db->escape($json).",".$this->db->escape($content).",".$this->db->escape($image).")");
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeEdit($id)
{
$query=$this->db->query("SELECT * FROM `webapp_blog` WHERE `id`=(".$this->db->escape($id).")")->row();
return $query;
}
function getSingleBlog($id){
    $query=$this->db->query("SELECT `id`, `title`, `json`, `content`,`timestamp` FROM `webapp_blog` WHERE `id`=(".$this->db->escape($id).")")->row();
$query->blogimage=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `image` FROM `webapp_blogimages` WHERE `status`=1 AND `blog`=(".$this->db->escape($id).")")->result();
   
$query->blogvideo=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `video` FROM `webapp_blogvideo` WHERE `status`=1 AND `blog`=(".$this->db->escape($id).")")->result();
return $query;
}
public function edit($id,$title,$json,$content,$timestamp,$url,$image)
{
$query=$this->db->query("UPDATE `webapp_blog` 
 SET `title` = ".$this->db->escape($title).", `json` = ".$this->db->escape($json).",`content` = ".$this->db->escape($content).",`timestamp` = ".$this->db->escape($timestamp).",`image` = ".$this->db->escape($image)."
 WHERE id = (".$this->db->escape($id).")");
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_blog` WHERE `id`=(".$this->db->escape($id).")");
return $query;
}
    public function getImageById($id){
    $query=$this->db->query("SELECT `image` FROM `webapp_blog` WHERE `id`=(".$this->db->escape($id).")")->row();
		return $query;
    }
      public function clearBlogImage($id){
           $query=$this->db->query("UPDATE `webapp_blog` 
             SET `image` = ''
             WHERE id = (".$this->db->escape($id).")");
           return $query;
    }
}
?>
