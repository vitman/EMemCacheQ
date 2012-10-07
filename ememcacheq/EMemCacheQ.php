<?php

class EMemCacheQ {

    /**
     * @var array memcacheq server
     */
    private $_server = array();

    /**
     * @var memcacheq instance
     */
    private $_memcacheQ;

    public function init() {
        $this->_server=$this->server;
        $this->_memcacheQ = $this->connect();
    }

    /**
     * @return array memcacheq server
     */
    public function getServer() {
        return $this->_server;
    }

    /**
     * @param array memcacheq server
     */
    public function setServer($server) {
        if (is_array($server) && !empty($server['host']) && !empty($server['port'])) {
            $this->_server = $server;
            return this;
        } else {
            throw new CException(Yii::t('yii', 'CMemCacheQ server configuration must have "host", "port" and "queueName" values in array.'));
        }
    }

    /**
     * @return array memcacheq server instance
     */
    public function connect() {
        $inst = memcache_connect($this->_server['host'], $this->_server['port']);
        if ($inst !== false) {
            return $inst;
        } else {
            throw new CException(Yii::t('yii', 'Failed on connecting to memcacheQ server at ' . $this->_server['host'] . ':' . $this->_server['port']));
        }
    }

    public function get(){
        return memcache_get($this->_memcacheQ, $this->_server['nameQueue']);
    }

    /**
     * @param mixed value to add to queue
     */
    public function set($val){
        return memcache_set($this->_memcacheQ, $this->_server['nameQueue'], $val, 0, 0);
    }

}

?>
