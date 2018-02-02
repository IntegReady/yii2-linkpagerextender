<?php

namespace integready\pagerextends;

use yii\helpers\Html;
use yii\widgets\LinkPager as YiiLinkPager;

/**
 * Class LinkPager
 */
class LinkPager extends YiiLinkPager
{
    /**
     * @var string
     * {pageButtons} - Pagination buttons
     * {pageSize} - Select the number of records to display
     */
    public $template = '{pageButtons} {pageSize}';

    /**
     * @var array
     */
    public $pageSizeList = [10, 50, 1000, 5000];

    /**
     * @var array
     */
    public $pageSizeOptions = [
        'class' => 'form-control',
        'style' => [
            'display' => 'inline-block',
            'width' => 'auto',
            'margin-top' => '0px',
            'float' => 'right',
        ],
    ];

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }

        return $this->renderPageContent();
    }

    /**
     * @inheritdoc
     */
    protected function renderPageContent()
    {
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) {
            $name = $matches[1];
            if ('pageSize' == $name) {
                return $this->renderPageSize();
            } else if ('pageButtons' == $name) {
                return $this->renderPageButtons();
            }
            return '';
        }, $this->template);
    }

    /**
     * @inheritdoc
     */
    protected function renderPageSize()
    {
        $pageSizeList = [];
        foreach ($this->pageSizeList as $value) {
            $pageSizeList[$value] = $value;
        }
        return Html::dropDownList($this->pagination->pageSizeParam, $this->pagination->getPageSize(), $pageSizeList, $this->pageSizeOptions);
    }
}
