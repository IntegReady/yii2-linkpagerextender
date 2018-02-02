<?php

namespace integready\pagerextends;

use Yii;
use yii\base\Behavior;
use yii\base\Widget;
use yii\web\Cookie;

/**
 * Class AlertBehavior
 * @property \yii\grid\GridView $owner
 */
class PagerBehavior extends Behavior
{
    /**
     * @var int
     */
    protected $defaultPageSize = 10;

    /**
     * @return array
     */
    public function events()
    {
        return [
            Widget::EVENT_INIT => 'pager',
        ];
    }

    /**
     * Magic - setting for the correct operation of the "pager".
     */
    public function pager()
    {
        $this->defaultPageSize = Yii::$app->request->cookies->getValue('defaultPageSize', $this->defaultPageSize);

        $perPage     = $this->owner->getId() . '_' . 'per-page';
        $page        = $this->owner->getId() . '_' . 'page';
        $getPegeSize = Yii::$app->request->get($perPage);

        if (isset($getPegeSize)) {
            $this->owner->dataProvider->getPagination()->pageSize = intval($getPegeSize);
            $this->setDefaultPageSizeInCookie($getPegeSize);
        } else {
            $this->owner->dataProvider->getPagination()->pageSize = $this->defaultPageSize;
        }

        $this->owner->dataProvider->getPagination()->pageSizeParam = $perPage;
        $this->owner->dataProvider->getPagination()->pageParam     = $page;

        if (!empty($this->owner->filterSelector)) {
            $this->owner->filterSelector .= ', select[name=\'' . $this->owner->dataProvider->getPagination()->pageSizeParam . '\']';
        } else {
            $this->owner->filterSelector = 'select[name=\'' . $this->owner->dataProvider->getPagination()->pageSizeParam . '\']';
        }
    }

    /**
     * Save default page size for user
     * @param null|int $getPegeSize
     *
     * @return bool
     */
    protected function setDefaultPageSizeInCookie($getPegeSize = null)
    {
        if (isset($getPegeSize)) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new Cookie([
                'name'  => 'defaultPageSize',
                'value' => intval($getPegeSize),
            ]));
            $this->defaultPageSize = intval($getPegeSize);
        }

        return false;
    }
}
