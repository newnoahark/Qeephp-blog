<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27 0027
 * Time: 下午 3:20
 * Name: "万文峰"
 */
class Helper_Paginator
{
//    设置每页的项目数
    public $_perPage;
    //设置获取页号的参数
    private $_instance;
//    设置页号
    private $_page;
//    为数据源设限
    private $_limit;
//    设置记录项目数
    private $_totaRows=0;
//    构造方法
    public function __construct($perPage,$instance)
    {
        $this->_instance = $instance;
        $this->_perPage = $perPage;
        $this->setInstance();
    }
//    创建限制数据集的起始位置
    private function getStart()
    {
        return ($this->_page*$this->_perPage)-$this->_perPage;
    }
    /*设置页号实例参数，如果数值为0，则设置为1*/
    private function setInstance()
    {
        $this->_page = (int)(!isset($_GET[$this->_instance])?1:$_GET[$this->_instance]);
        $this->_page = ($this->_page ==0 ? 1 : $this->_page);
    }
//    设置数值项目数量并分配到totalRow
    public function setTotal($_totalRows)
    {
        $this->_totaRows = $_totalRows;
    }
//    返回数据源的限制，调用get_start方法和传递物品PERP的页面数
    public function getLimit()
    {
        return $this->getStart().",$this->_perPage";
    }
//    创建html导航链接
    public function pageLink($path='?',$ext =null)
    {
//       相邻的
        $adjacents = "2";
//        前一个
        $prev = $this->_page - 1;
//        下一个
        $next = $this->_page + 1;
//        最后一页
        $lastpage = ceil($this->_totaRows/$this->_perPage);
//        最后一页的前一页
        $lpm1 = $lastpage - 1;
//        分页按钮
        $pagination = "";
//        判断最大页数是否大于1
        if($lastpage > 1)
        {
            $pagination .= "<ul class='pagination'>";
//            判断页码是否大于1 ，如果大于就上一页可用
            if ($this->_page > 1)
                $pagination.= "<li><a href='".$path."$this->_instance=$prev"."$ext'>上一页</a></li>";
            else
//                否则上一页不可用
                $pagination.= "<li class='disabled'><span>上一页</span></li>";
//            判断最大页数是否小于7
            if ($lastpage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $this->_page)
                        $pagination.= "<li ><span class='current'>$counter</span></li>";
                    else
                        $pagination.= "<li><a href='".$path."$this->_instance=$counter"."$ext'>$counter</a></li>";
                }
            }
//            判断最大页码数是否大于7
            elseif($lastpage > 5 + ($adjacents * 2))
            {
//                判断页码数是否小于5
                if($this->_page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $this->_page)
                            $pagination.= "<li><span class='current'>$counter</span></li>";
                        else
                            $pagination.= "<li><a href='".$path."$this->_instance=$counter"."$ext'>$counter</a></li>";
                    }
                    $pagination.= "<li><span>...</span></li>";
//                    最后一页的前一页
                    $pagination.= "<li><a href='".$path."$this->_instance=$lpm1"."$ext'>$lpm1</a></li>";
                    $pagination.= "<li><a href='".$path."$this->_instance=$lastpage"."$ext'>$lastpage</a></li>";
                }
//                最大页码减去相邻4个大于1 并且页码大于相邻的4个
                elseif($lastpage - ($adjacents * 2) > $this->_page && $this->_page > ($adjacents * 2))
                {
                    $pagination.= "<li><a href='".$path."$this->_instance=1"."$ext'>1</a></li>";
                    $pagination.= "<li><a href='".$path."$this->_instance=2"."$ext'>2</a></li>";
                    $pagination.= "<li><span>...</span></li>";

                    for ($counter = $this->_page - $adjacents; $counter <= $this->_page + $adjacents; $counter++)
                    {
                        if ($counter == $this->_page)
                            $pagination.= "<li><span class='current'>$counter</span></li>";
                        else
                            $pagination.= "<li><a href='".$path."$this->_instance=$counter"."$ext'>$counter</a></li>";
                    }
                    $pagination.= "..";
                    $pagination.= "<li><a href='".$path."$this->_instance=$lpm1"."$ext'>$lpm1</a></li>";
                    $pagination.= "<li><a href='".$path."$this->_instance=$lastpage"."$ext'>$lastpage</a></li>";
                }
                else
                {
                    $pagination.= "<li><a href='".$path."$this->_instance=1"."$ext'>1</a></li>";
                    $pagination.= "<li><a href='".$path."$this->_instance=2"."$ext'>2</a></li>";
                    $pagination.= "<li><span>...</span></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $this->_page)
                            $pagination.= "<li><span class='current'>$counter</span></li>";
                        else
                            $pagination.= "<li><a href='".$path."$this->_instance=$counter"."$ext'>$counter</a></li>";
                    }
                }
            }
            if ($this->_page < $counter - 1)
                $pagination.= "<li><a href='".$path."$this->_instance=$next"."$ext'>下一页</a></li>";
            else
                $pagination.= "<li><span class='disabled'>下一页</span></li>";
            $pagination.= "</ul>\n";
        }
        return $pagination;
    }

}
