<?php

namespace App\Helpers;

use Collective\Html\HtmlBuilder;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Builder;

class Table extends Builder
{
    /**
     * @var Model $class
     */
    public $class;

    /**
     * Table constructor.
     * @param Repository $config
     * @param Factory $view
     * @param HtmlBuilder $html
     */
    public function __construct(Repository $config, Factory $view, HtmlBuilder $html)
    {
        parent::__construct($config, $view, $html);
    }


    /**
     * @param false $action
     */
    public function addColumns($action = true)
    {
        $columns = $this->class::getColumnsTable();
        foreach ($columns as $column) {
            $this->addColumn($column);
        }
        if($action){
            $this->addAction(['title' => __('global.action')]);
        }
    }

    /**
     * @param array $attributes
     */
    public function addParameters(array $attributes = [])
    {
        if(count($attributes) == 0){
            $this->parameters([
                'responsive' => true,
                'language' => [
                    'url' => 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                ],
            ]);
        }else{
            $this->parameters($attributes);
        }

    }

    /**
     * @param $url
     */
    public function setAjax($url)
    {
        $this->ajax([
            'url' => $url,
            'type' => 'GET',
            'data' => 'function(d) { d.key = "value"; }',
        ]);
    }

}
