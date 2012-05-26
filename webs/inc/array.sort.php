<?php
/**
* @package     BugFree
* @version     $Id: FunctionsMain.inc.php,v 1.32 2005/09/24 11:38:37 wwccss Exp $
*
*
* Sort an two-dimension array by some level two items use array_multisort() function.
*
* sysSortArray($Array,"Key1","SORT_ASC","SORT_RETULAR","Key2"……)
* @author                      Chunsheng Wang <wwccss@263.net>
* @param  array   $ArrayData   the array to sort.
* @param  string  $KeyName1    the first item to sort by.
* @param  string  $SortOrder1  the order to sort by("SORT_ASC" 正序|"SORT_DESC" 倒序)
* @param  string  $SortType1   the sort type("SORT_REGULAR"|"SORT_NUMERIC"|"SORT_STRING")
* @return array                sorted array.
* $flink=sortarray($flink,'sitenum',"SORT_ASC",'sitename','SORT_DESC'); 多键比较
*/

function sortarray($ArrayData,$KeyName1,$SortOrder1 = "SORT_ASC",$SortType1 = "SORT_REGULAR")
{
  if(!is_array($ArrayData))
  {
      return $ArrayData;
  }
  // Get args number.
  $ArgCount = func_num_args();
  // Get keys to sort by and put them to SortRule array.
  for($I = 1;$I < $ArgCount;$I ++)
  {
      $Arg = func_get_arg($I);
      if(!eregi("SORT",$Arg))
      {
          $KeyNameList[] = $Arg;
          $SortRule[]    = '$'.$Arg;
      }
      else
      {
          $SortRule[]    = $Arg;
      }
  }
  // Get the values according to the keys and put them to array.
  foreach($ArrayData AS $Key => $Info)
  {
      foreach($KeyNameList AS $KeyName)
      {
          ${$KeyName}[$Key] = $Info[$KeyName];
      }
  }
  // Create the eval string and eval it.
  $EvalString = 'array_multisort('.join(",",$SortRule).',$ArrayData);';
  eval ($EvalString);
  return $ArrayData;
}
?>