<?php

/**
 * 分页 
 *
 * @author lelike
 * @package pages
 * @example 分页
 * @static pages
 * 
 */
class pages {

    /**
     * 分页
     * @param string $sql
     * @param int $pagesize defaukt 10
     * @param array $param 定义绑定的参数 array(KEY=>VALUE)
     * 页面使用
     * $this->widget('CLinkPager', array(
     * 'pages' => $pages,
     * 'nextPageLabel'=>'下一页',
     * 'prevPageLabel'=>'上一页',
     * 'lastPageLabel'=>'尾页',
     * 'firstPageLabel'=>'首页',
     * ));
     * 还可以自定义CSS样式
     */
    public static function init($sql, $pagesize=9, $param=array()) {
        $criteria = new CDbCriteria();
        $result = Yii::app()->db->createCommand($sql)->query($param);
        //var_dump($result);exit();
        $pages = new CPagination($result->rowCount);
        $pages->pageSize = $pagesize;
        $pages->applyLimit($criteria);
        $result = Yii::app()->db->createCommand($sql . "  LIMIT :offset,:limit");
        $result->bindValue(':offset', $pages->currentPage * $pages->pageSize);
        $result->bindValue(':limit', $pages->pageSize);
      if(count($param)>0){
        foreach ($param as $k => $v) {
            $result->bindValue($k, $v);
        }}
        $posts = $result->queryAll();
        $arr = array();
        $arr['posts'] = $posts;
        $arr['pages'] = $pages;
        return $arr;
    }

}

?>
