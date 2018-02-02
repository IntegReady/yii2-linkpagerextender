Link pager extender
============================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist integready/yii2-linkpagerextender "~1.0"
```

or add

```
"integready/yii2-linkpagerextender": "~1.0"
```

to the require section of your `composer.json` file.

### Example:

###### GridView id must be set.

* index.php `(View)`:
```php
<?php

use yii\grid\GridView;

?>
<?= GridView::widget([
    'id'            => 'books-grid',
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'as pager'  => 'integready\linkpagerextender\PagerBehavior',
    'pager'     => [
        'class' => 'integready\linkpagerextender\LinkPager',
        'template'      => '{pageButtons} {pageSize}',
        'pageSizeList'  => [10, 50, 1000, 5000],
    ],
    'columns'   => [
        // Columns list
    ],
]); ?>
```
