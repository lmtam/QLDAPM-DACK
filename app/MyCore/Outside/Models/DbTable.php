<?php

namespace App\MyCore\Outside\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\MyCore\Inside\Helpers\ApiFile;

class DbTable extends Model {

	const CREATED_AT = 'created_date';
	const UPDATED_AT = 'modified_date';

    protected $table = null;
    protected $fillable = array();

    public $searchs = array();
    public $sorts = array();
    public $filters = array();
    public $params = array();
    public $user    = null;

    public function __construct($options = array()) {
        parent::__construct($options);
    }

    /**
     * Lấy danh sách column trong table
     *
     * @return multitype:
     *
     */
    public function getColumnsInTable() {
        $columns = array();
        $adapter = $this->adapter;
        $columnObjects = DB::select("DESCRIBE {$this->table}");
        foreach ($columnObjects as $columnObject) {
            $columns[] = $columnObject->Field;
        }
        return $columns;
    }

    /**
     * Lọc lại data theo column
     *
     * @param unknown $data
     * @param unknown $object
     * @return multitype:unknown
     *
     */
    public function filterColumns($data, &$object) {
        $dataFormat = array();

        $columns = $this->getColumnsInTable();

        foreach ($data as $column => $value) {
            if (in_array($column, $columns)) {
                $object->$column = $value;
                $dataFormat[$column] = $value;
            }
        }
        return $dataFormat;
    }

    /**
     * Enter description here ...
     * @param unknown $id
     *
     */
    public function remove($id) {
        /**
         * Lưu trong object
         */
        $object = $this->findOrNew($id);
        $object->is_deleted = !$object->is_deleted;
        return $object->save();
    }

    /**
     * Enter description here ...
     * @param unknown $ids
     *
     */
    public function removeMulti($ids) {
        foreach ($ids as $id) {
            /**
             * Lưu trong object
             */
            $object = $this->findOrNew($id);
            $object->is_deleted = !$object->is_deleted;
            $object->save();
        }
    }

    /**
     * Enter description here ...
     * @param unknown $select
     * @return unknown
     *
     */
    public function generateSelect($select) {
        if (count ($this->params)) {
            if (isset($this->params['search_type'])
                && isset($this->params['search_keyword'])
                && strlen($this->params['search_type'])
                && strlen($this->params['search_keyword'])) {
                if ($this->params['search_type'] === 'ALL') {
                    /**
                     * search all
                     */
                    if (count ($this->searchs)) {
                        $conditions = array();
                        $select->orWhere(function($query) {
                            foreach ($this->searchs as $search) {
                                $query->where($search, 'like', "%{$this->params['search_keyword']}%");
                            }
                        });
                    }
                } else {
                    $select->where($this->searchs[$this->params['search_type']], 'like', "%{$this->params['search_keyword']}%");
                }
            }
            foreach ($this->params as $paramKey => $paramValue) {
                if (in_array($paramKey, array_keys($this->sorts))) {
                    /**
                     * sort
                     */
                    if ($paramValue === 'ASC') {
                        $select->orderBy($this->sorts[$paramKey], 'ASC');
                    } else {
                        $select->orderBy($this->sorts[$paramKey], 'DESC');
                    }
                } elseif (in_array($paramKey, array_keys($this->filters))) {
                    /**
                     * filter
                     */
                    $select->where($this->filters[$paramKey], $paramValue);
                }
            }
        }
        return $select;
    }


    /**
     * Enter description here ...
     * @param unknown $data
     *
     */
    public function saveImage($data) {
        $url = 'http://' . $_SERVER['HTTP_HOST']. '/save.php';
        return ApiFile::save($url, $data);
    }
}