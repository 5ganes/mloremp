<?
$pageResult = $groups->getById($pageId);
$pageRow = $conn->fetchArray($pageResult);

$pageParentId = $pageRow['parentId'];
$pageDate = $pageRow['onDate'];
$pageContents = $pageRow['contents'];
$lan=$_GET['lan'];

if ($pageLinkType == "Normal Group")
{
  if($lan=="en")
  {
      include ("includes/showsubgroupsen.php");
  }
  else
  {
      include ("includes/showsubgroups.php");
  }
}
else if ($pageLinkType == "Contents Page")
{
  if($lan=="en")
  {
      include ("includes/showcontentpageen.php");
  }
  else
  {

      include ("includes/showcontentpage.php");
  }
}
else if ($pageLinkType == "Gallery")
{
  if($lan=="en")
  {
      include ("includes/showgalleryen.php");
  }
  else
  {
      include ("includes/showgallery.php");
  }
}
else if ($pageLinkType == "Video Gallery")
{
  if($lan=="en")
  {
      include ("includes/showvideogalleryen.php");
  }
  else
  {
     include ("includes/showvideogallery.php");
  }
}
else if ($pageLinkType == "List")
{
  if($lan=="en")
  {
      include ("includes/showlistpageen.php");
  }
  else
  {
     include ("includes/showlistpage.php");
  }
}
elseif ($pageLinkType == "GallerySub")
{
  if($lan=="en")
  {
      include ("includes/showgallerysingleen.php");
  }
  else
  {
      include ("includes/showgallerysingle.php");
  }
}
elseif ($pageLinkType == "ListSub")
{
  if($lan=="en")
  {
      include ("includes/showlistsingleen.php");
  }
  else
  {
    include ("includes/showlistsingle.php");
  }
}
?>