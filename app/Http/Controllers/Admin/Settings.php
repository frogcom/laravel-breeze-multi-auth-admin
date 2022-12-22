<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class Settings {
    private static $m_Instance;

    private $m_ColumnName = [];
    private $m_Data = [];

    private function __construct()
    {
        $this->m_ColumnName = DB::select('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "page_settings" ORDER BY ORDINAL_POSITION');
    }

    public static function getInstance()
    {
        if (!self::$m_Instance) {
            self::$m_Instance = new self();
        }

        return self::$m_Instance;
    }

    public function setData() {
        unset($this->m_ColumnName[0]);
        foreach ($this->m_ColumnName as $column) {
            $newData = request($column->COLUMN_NAME);
            if ($column->COLUMN_NAME != null) {
                DB::table('page_settings')->where('id', 1)->update([$column->COLUMN_NAME => $newData]);
            }
        }
    }

    public function getData() {
        foreach ($this->m_ColumnName as $column) {
            $this->m_Data[] = DB::table('page_settings')->where('id', 1)->value($column->COLUMN_NAME);
        } 
        return $this->m_Data;
    }
}