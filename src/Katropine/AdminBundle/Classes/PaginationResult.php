<?php
namespace Katropine\AdminBundle\Classes;
/**
 * Description of PaginationResult
 *
 * @author Kristian Beres <kristian@funkweb.no>
 * @since Jul 14, 2014
 */
class PaginationResult {
    
    public $first = 1;
    public $prev = 0;
    public $start = 1;
    public $end = 1;
    public $page = 1;
    public $last = 1;
    public $total = 0;
    public $iend = 1;
    public $istart = 1;
    public $next = 0;
    public $maxrows = 10;
    
    protected $url;
    protected $params = array();
    
    protected $urlFirst;
    protected $urlPrev;
    protected $urlIterated;
    protected $urlNext;
    protected $urllast;
    
    public function __construct() {}
    
    public function toString(){
        
        $paramsStr[] = "first: ".$this->first;
        $paramsStr[] = "prev: ".$this->prev;
        $paramsStr[] = "start: ".$this->start;
        $paramsStr[] = "end: ".$this->end;
        $paramsStr[] = "page: ".$this->page;
        $paramsStr[] = "last: ".$this->last;
        $paramsStr[] = "total: ".$this->total;
        $paramsStr[] = "next: ".$this->next;
        $paramsStr[] = "istart: ".$this->next;
        $paramsStr[] = "iend: ".$this->next;
        return implode(",", $paramsStr);
    }
    
    /**
    *
    * @param key
    * @param value
    */
    public function setParam($key, $value){
        $this->params[$key] = $value;
        return $this;
    }
    
    public function getUrlFirst() {
        return $this->urlFirst;
    }

    public function getUrlPrev() {
        return $this->urlPrev;
    }
    /**
     * 
     * @param int $i
     * @return string
     */
    public function getUrlIterated($i) {
        return preg_replace('/\s+/', '', sprintf($this->urlIterated, $i));
    }

    public function getUrlNext() {
        return $this->urlNext;
    }

    public function getUrllast() {
        return $this->urllast;
    }
    /**
     * 
     * @param string $urlFirst should contain on %s
     * @return \Katropine\AdminBundle\Classes\PaginationResult
     */
    public function setUrlFirst($urlFirst) {
        $this->urlFirst = $urlFirst;
        return $this;
    }

    public function setUrlPrev($urlPrev) {
        $this->urlPrev = $urlPrev;
        return $this;
    }

    public function setUrlIterated($urlIterated) {
        // remove any whitespaces
        $this->urlIterated = $urlIterated;
        return $this;
    }

    public function setUrlNext($urlNext) {
        $this->urlNext = $urlNext;
        return $this;
    }

    public function setUrllast($urllast) {
        $this->urllast = $urllast;
        return $this;
    }


}
